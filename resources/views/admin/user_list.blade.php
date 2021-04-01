@extends('layouts.admin')

@section('content')
    <a href="{{ url('admin/add') }}">新規登録</a>
    <div class="container">
        <div class="card">
            <div class="card-header">ユーザー一覧</div>
            <div class="card-body">

                <ul class="list-group">
                    @foreach ($user_list as $user)
                        <li class="list-group-item">
                            <a href="{{ url('admin/user/' . $user->id) }}">
                                {{ $user->name }}
                            </a>
                            {{ $user->created_at }}
                        </li>
                    @endforeach
                </ul>

                <div class="mt-3">
                    {{ $user_list->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
