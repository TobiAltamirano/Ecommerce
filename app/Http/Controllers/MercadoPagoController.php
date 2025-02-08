<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use Psy\Readline\Hoa\Console;

class MercadoPagoController extends Controller
{
    public function showForm(){

        $cartItems = Cart::all();

        // Verificar si el carrito está vacío
        if ($cartItems->isEmpty()) {
            return redirect('/cart')
            ->with('error', 'El carrito está vacío. Agrega productos antes de proceder al pago.');
        }

        // Preparamos los items que espera el SDK
        $items = [];
        $totalPrice = 0;

        foreach($cartItems as $cartItem) {
            $items[] = [
                'title' => $cartItem->service->title,
                'quantity' => 1,
                'currency_id'  => 'ARS',
                'unit_price'=> $cartItem->service->price,
            ];

            // Calcular el total sumando los precios de los servicios
            $totalPrice = $cartItems->sum(function ($cartItem) {
                return $cartItem->service->price; 
            });
        }
        
        // Inicializamos el SDK de MP configurando el token de acceso
        MercadoPagoConfig::setAccessToken(config('mercadopago.accessToken'));

        // Creamos la preferencia (Orden de cobro)
        $client = new PreferenceClient();
        $preference = $client->create([
            'items' => $items,
            // Configuramos las "back_urls"
            "back_urls" => [
                "success" => route('mp.processPurchase'),
                "pending" => route('mp.pending'),
                "failure" => route('mp.failure'),
            ]
        ]);

        return view('mp.mpForm', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'preference' => $preference,
            'mpPublicKey' => config('mercadopago.publicKey'),
        ]);
    }

    public function processPurchase(Request $request){

        // Verifica si la operación de Mercado Pago fue exitosa
        if ($request->input('status') === 'approved' || $request->input('collection_status') === 'approved') {
            // Obtén el ID del usuario actual
            $userId = Auth::id();
    
            // Obtén los elementos del carrito para el usuario actual con sus servicios relacionados
            $cartItems = Cart::where('user_id', $userId)->with('service')->get();
    
            // Crea un registro de compra para cada elemento en el carrito
            foreach ($cartItems as $cartItem) {
                // Guarda el registro en la tabla users_has_services (Purchase)
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

    public function success(){
        return view('mp.checkoutSuccess');
    }

    public function pending(){
        return view('mp.checkoutPending');
    }

    public function failure(){
        return view('mp.checkoutFailure');
    }
}
