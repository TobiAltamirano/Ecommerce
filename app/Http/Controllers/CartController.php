<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CartController extends Controller
{
    /**
     * Mostrar contenido del carrito.
     */
    public function cart()
    {
        $cartItems = Cart::all();

        return view('cart', ['cartItems' => $cartItems]);
    }

    public function addToCart(Request $request, $serviceId)
    {
        $userId = Auth::id();

        // Verificar si el producto ya está en el carrito
        $cartItem = Cart::where('user_id', $userId)->where('service_id', $serviceId)->first();

        if ($cartItem) {

            return redirect()->back()->with('error', 'Este producto ya está en tu carrito.');
        }

        // Si no está en el carrito, lo agregamos
        Cart::create([
            'user_id' => $userId,
            'service_id' => $serviceId,
        ]);

        return redirect()->back()->with('status.message', 'Producto agregado al carrito exitosamente.');
    }

    public function removeFromCart($cartItemId)
    {
        $userId = Auth::id();

        // Buscar el elemento en el carrito
        $cartItem = Cart::where('user_id', $userId)->find($cartItemId);

        if (!$cartItem) {
            return redirect()->back()->with('error', 'El elemento no se encuentra en tu carrito.');
        }

        // Eliminar el elemento del carrito
        $cartItem->delete();

        return redirect()->back()->with('status.message', 'Producto eliminado del carrito exitosamente.');
    }

    public function clearCart()
    {
        $userId = Auth::id();

        // Eliminar todos los elementos del carrito para el usuario actual
        Cart::where('user_id', $userId)->delete();

        return redirect()->back()->with('status.message', 'Carrito vaciado correctamente.');
    }

    /**
     * Obtener el total del carrito.
     */
    public function getTotal()
    {
        $userId = Auth::id();
        
        // Obtener todos los elementos del carrito para el usuario actual con sus servicios relacionados
        $cartItems = Cart::where('user_id', $userId)->with('service')->get();

        // Calcular el total sumando los precios de los servicios
        $total = $cartItems->sum(function ($cartItem) {
            return $cartItem->service->price;
        });

        return $total;
    }

}