@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">管理側TOP</div>
        <div class="card-body">
            <div>
                <a href="{{ url('admin/user_list') }}" class="btn btn-primary">ユーザー一覧</a>
                <a href="{{ url('admin/admin_list') }}" class="btn btn-primary">管理者一覧</a>
            </div>
        </div>
    </div>
</div>
@endsection
