<?php

use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;

/** @var CartItems[]|Collection $cartItems */
/** @var int|float $totalPrice */
/** @var Preference $preference */
/** @var string $mpPublicKey */

?>

@extends('layouts.main')

@section('title', 'Realizar Pago - Mercado Pago')

@section('content')

<section class="mp-form">
    <h1 class="h1-home">Confirmación de compra</h1>

    <p class="p-profile"><span class="span-checkout">¡Atención!</span><br>Estás a punto de realizar el pago de los siguientes productos:</p>

    <div class="return-panel-container">
        <a href="<?= url("/cart");?>" class="return-panel">Volver al Carrito</a>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-striped text-control">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $cartItem)
                <tr>
                    <td>{{ $cartItem->service->title }}</td>
                    <td>${{ $cartItem->service->price }} ARS</td>
                    <td>${{ $cartItem->service->price * 1 }}ARS</td>
                </tr>
                @endforeach

                <tr>
                    <td><b>Total:</b></td>
                    <td><b></b></td>
                    <td>$<b>{{$totalPrice}}</b> ARS</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="checkout"></div>

</section>

<!-- SDK MercadoPago.js -->
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>

    // Inicializamos el objeto de Mercado Pago, pasándole la clave pública como parámetro
    console.log("Public Key:", '<?= $mpPublicKey ?>');
    const mp = new MercadoPago("<?= $mpPublicKey ?>");
    // Agregamos el botón de cobro
    mp.bricks().create('wallet', 'checkout', {
        initialization: {
            preferenceId: '<?= $preference->id;?>',
        }
    });
</script>
@endsection