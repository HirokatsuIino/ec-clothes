@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ url('admin/add') }}">新規登録</a>
    </div>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">検索</div>
            <div class="card-body">
                <form action="{{url('/admin/product_list')}}" method="GET">
                    <p>商品名：<input type="text" name="keyword" value="{{$keyword}}"></p>
                    <p><input type="submit" value="検索"></p>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">商品一覧</div>
            <div class="card-body">

                @if ($product_list->count())
                    <ul class="list-group">
                        @foreach ($product_list as $product)
                            <li class="list-group-item">
                                <img style="width: 30px; height: 40px;" src="{{ asset($product->image) }}" class="card-img"/>
                                <a href="{{ url('admin/product_list/' . $product->id) }}">
                                    {{ $product->name }}
                                </a>
                                {{ $product->price }}円
                                {{ $product->created_at }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>見つかりませんでした。</p>
                @endif

                <div class="mt-3">
                    {{ $product_list->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
