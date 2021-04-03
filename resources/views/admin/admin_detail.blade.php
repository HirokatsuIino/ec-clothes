@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('admin/admin_list') }}">管理者一覧</a> &gt; 管理者詳細
            </div>
            <div class="card-body">

                <ul class="list-group">
                    <li class="list-group-item">名前: {{ $admin->name }}</li>
                    <li class="list-group-item">メール: {{ $admin->email }}</li>
                    <li class="list-group-item">作成日: {{ $admin->created_at->format('Y/m/d H:i:s') }}</li>
                    <li class="list-group-item">更新日: {{ $admin->updated_at->format('Y/m/d H:i:s') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
