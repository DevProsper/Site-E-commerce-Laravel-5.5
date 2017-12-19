@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Mes commandes</h1>
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-heading">La commande du {{date('d/m/Y', strtotime($order->created_at))}}</div>
                        <div class="panel-body">
                            <!-- @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif -->
                            <ul class="list-group">
                                @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <strong>{{$item['item']->title}}</strong> x {{$item['quantity']}}
                                    <span class="badge">{{$item['price']}} $</span> 
                                </li>
                                @endforeach
                            </ul>
                            <span class="badge">Prix totale de la commande :{{$order->cart->totalP}} $</span>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
