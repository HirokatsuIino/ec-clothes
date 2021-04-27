@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('admin/product_list') }}">商品一覧</a> &gt; 商品詳細
            </div>
            <div class="card-body">

                <ul class="list-group">
                    <img style="width: 40%; height: 40%;" src="{{ asset($product->image) }}" class="card-img"/>
                    <li class="list-group-item">名前: {{ $product->name }}</li>
                    <li class="list-group-item">価格: {{ $product->price }}</li>
                    <li class="list-group-item">作成日: {{ $product->created_at->format('Y/m/d H:i:s') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
