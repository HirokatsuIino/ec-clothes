@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action='{{ route('product_create') }}' method='post'>
            {{ csrf_field() }}
            商品名：<input type='text' name='name'><br>
            商品概要：<input type='text' name='description'><br>
            値段：<input type='number' name='price'><br>
            <input type='submit' value='新規作成'>
        </form>
    </div>
@endsection
