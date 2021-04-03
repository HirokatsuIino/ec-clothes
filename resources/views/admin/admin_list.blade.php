@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">管理者一覧</div>
            <div class="card-body">

                <ul class="list-group">
                    @foreach ($admin_list as $admin)
                        <li class="list-group-item">
                            <a href="{{ url('admin/admin_detail/' . $admin->id) }}">
                                {{ $admin->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-3">
                    {{ $admin_list->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
