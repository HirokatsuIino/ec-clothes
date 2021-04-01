@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action='{{ route('user_create') }}' method='post'>
            {{ csrf_field() }}
            ユーザー名：<input type='text' name='name'><br>
            メールアドレス：<input type='text' name='email'><br>
            パスワード：<input type='password' name='password'><br>
            <input type='submit' value='新規作成'>
        </form>
    </div>
@endsection
