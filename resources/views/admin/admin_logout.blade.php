@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">ログアウト</div>
            <div class="card-body">
                <div>
                    <a href="{{ url('admin/login') }}" class="btn btn-primary">ログイン</a>
                </div>
            </div>
        </div>
    </div>
@endsection
