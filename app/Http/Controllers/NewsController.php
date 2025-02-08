<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    protected array $createRules = [
        'title' => 'required|min:2',
        'description' => 'required',
        'publication_date' => 'required',
    ];

    public function news() {
        $news = Notice::all();

        return view('news', ['news' => $news]);
    }

    public function abm() {
        $news = Notice::all();

        return view('abm', ['news' => $news]);
    }

    public function createForm()
    {
        return view('abm/create', [
            'ratings' => Rating::all(),
        ]);
    }

    public function createProcess(Request $request)
    {
        $request->validate(Notice::VALIDATION_RULES, Notice::VALIDATION_MESSAGES);

        $data = $request->except(['_token']);

        //Upload de la imagen de las noticias
        if($request->hasFile('file')){
            // Guardamos el archivo en la carpeta "img"
            $data['imagen_url'] = $request->file('file')->store('covers');
        }

        Notice::create($data);

        return redirect('/abm')
        -> with('status.message', 'la noticia ' . $data['title'] . ' se publicó con exito');
    }

    public function deleteNotice(int $id)
    {
        // Buscar la noticia por su ID
        $notice = Notice::findOrFail($id);

        // Eliminar la noticia
        $notice->delete();

        // Si tiene una imagen, la borramos.
        if($notice->imagen_url !== null) {
            Storage::delete($notice->imagen_url);
        }

        return redirect('/abm')
        ->with('success', 'La noticia ha sido eliminada');
    }

    public function deleteProcess(int $id)
    {
        return view('abm.deleteProcess', [
            'notice' => Notice::findOrFail($id),
        ]);
    }

    public function editNotice(int $id)
    {
        // Cargar la vista de edición y pasar la noticia como variable
        return view('abm.edit', [
            'notice' => Notice::findOrFail($id),
            'ratings' => Rating::all()
        ]);
    }

    public function updateNotice(int $id, Request $request)
    {
        // Validación de los datos, igual que la función createProcess
        $request->validate(Notice::VALIDATION_RULES, Notice::VALIDATION_MESSAGES);

        // Tomamos solo la información necesaria
        $data = $request->except(['_token', '_method']);
        
        // Buscar la noticia por su ID
        $notice = Notice::findOrFail($id);

        //Upload de la imagen de las noticias
        if($request->hasFile('file')){
            // Guardamos el archivo en la carpeta "img"
            $data['imagen_url'] = $request->file('file')->store('covers');
            $oldCover = $notice->imagen_url;
        }

        // Actualizar los datos de la noticia con los datos del formulario
        $notice->update($data);

        // Borramos la imagen anterior si es necesario
        if(isset($oldCover) && Storage::has($oldCover)) {
            Storage::delete($oldCover);
        }

        return redirect('/abm')
        ->with('success', 'La noticia ' . $data['title'] . ' ha sido actualizada con éxito.');
    }
}