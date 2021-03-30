@extends('layouts.app')

@section('title')
    購入履歴
@endsection

@section('content')
    <div class="container">
        <div class="cart__title">
            Shopping History
        </div>
        <div class="cart-wrapper">
            @if ($lists)
                @foreach ($lists as $item)
                    <div class="card mb-3">
                        <div class="row">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="product-cart-img"/>
                            <div class="card-body">
                                <div class="card-quantity col-2">
                                    {{ $item->quantity }}個
                                </div>
                                @if ($item->status == '0')
                                    <div class="card-quantity col-2">
                                        保留
                                    </div>
                                @elseif ($item->status == '1')
                                    <div class="card-quantity col-2">
                                        購入
                                    </div>
                                @else
                                    <div class="card-quantity col-2">
                                        その他
                                    </div>
                                @endif

                                <div class="card__total-price col-3 text-center">
                                    ￥{{ number_format($item->price * $item->quantity) }}
                                </div>
                                <div class="card-quantity col-6">
{{--                                    {{ date_format($item->order_day, 'Y-m-d') }}--}}
                                    {{ $item->order_day, 'Y-m-d' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="cart__empty">
                    購入履歴がありません。
                </div>
            @endif
        </div>
    </div>
@endsection
