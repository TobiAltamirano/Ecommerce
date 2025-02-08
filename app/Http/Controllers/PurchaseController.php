<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function usersList(){
        $users = User::all();

        return view('abmUsers', ['users' => $users]);
    }

    public function userDetails(int $id){

        $user = User::findOrFail($id);
        
        $purchases = Purchase::with('service')->where('user_id', $id)->get();
    
        return view('abm.details', [
            'user' => $user,
            'purchases' => $purchases
        ]);
    }

    public function userPurchases(){

        $user = Auth::user();

        $purchases = Purchase::with('service')->where('user_id', $user->id)->get();

        return view('profile.showPurchases', [
            'userPurchases' => $purchases
        ]);
    }

    public function processPurchase(Request $request)
    {
        // Verifica si la operación de Mercado Pago fue exitosa
        if ($request->input('status') === 'approved') {
            // Obtén el ID del usuario actual
            $userId = Auth::id();

            // Obtén los elementos del carrito para el usuario actual con sus servicios relacionados
            $cartItems = Cart::where('user_id', $userId)->with('service')->get();

            // Verifica si el carrito está vacío
            if ($cartItems->isEmpty()) {
                return redirect()->route('cart')->with('error', 'El carrito está vacío. Agrega productos antes de proceder al pago.');
            }

            // Crea un registro de compra para cada elemento en el carrito
            foreach ($cartItems as $cartItem) {
                // Guarda el registro en la tabla users_has_services -> purchase
                Purchase::create([
                    'user_id' => $userId,
                    'service_id' => $cartItem->service->id,
                ]);
            }

            // Elimina todos los elementos del carrito para el usuario actual
            Cart::where('user_id', $userId)->delete();

            // Redirige a la vista de éxito con un mensaje
            return redirect()->route('mp.success');
        } else {
            // Redirige a una vista de error si la operación no fue aprobada
            return redirect()->route('mp.failure');
        }
    }    
}