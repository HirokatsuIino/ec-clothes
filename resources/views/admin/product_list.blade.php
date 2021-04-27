@extends('layouts.admin')

@section('content')
    <style>
        .acd-check{
            display: none;
        }
        .acd-label{
            /*background: #333333;*/
            color: #333333;
            display: block;
            margin-bottom: 1px;
            padding: 10px;
            text-align: right;
        }
        .acd-content{
            border-top: 1px solid #333;
            height: 0;
            opacity: 0;
            padding: 0 10px;
            transition: .5s;
            visibility: hidden;

        }
        .acd-check:checked + .acd-label + .acd-content{
            height: 40px;
            opacity: 1;
            padding: 10px;
            visibility: visible;
            margin-bottom: 100px;
        }
    </style>


    <div class="container">
        <a href="{{ url('/admin/product_add') }}">新規登録</a>
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
{{--                            <table class="list-group-item">--}}
{{--                                <tr>--}}
{{--                                    <th>画像</th>--}}
{{--                                    <th>名前</th>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td><img style="width: 30px; height: 40px;" src="{{ asset($product->image) }}" class="card-img"/></td>--}}
{{--                                    <td><a href="{{ url('admin/product_list/' . $product->id) }}">--}}
{{--                                            {{ $product->name }}--}}
{{--                                        </a></td>--}}
{{--                                </tr>--}}
{{--                            </table>--}}
                            <li class="list-group-item">
                                <img style="width: 30px; height: 40px;" src="{{ asset($product->image) }}" class="card-img"/>
                                <a href="{{ url('admin/product_detail/' . $product->id) }}">
                                    {{ $product->name }}
                                </a>
                                <br>
                                値段：{{ $product->price }}円
                                <br>
                                概要：{{ $product->description }}
                                <br>
                                登録日：{{ $product->created_at }}
                                <br>

{{--                                <input id="acd-check1" class="acd-check" type="checkbox">--}}
{{--                                <label class="acd-label" for="acd-check1">商品詳細</label>--}}
{{--                                <div class="acd-content">--}}
{{--                                    値段：{{ $product->price }}円--}}
{{--                                    <br>--}}
{{--                                    概要：{{ $product->description }}--}}
{{--                                    <br>--}}
{{--                                    登録日：{{ $product->created_at }}--}}
{{--                                    <br>--}}
{{--                                </div>--}}


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
