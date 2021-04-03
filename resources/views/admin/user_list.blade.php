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
                <form action="{{url('/admin/user_list')}}" method="GET">
                    <p>ユーザー名：<input type="text" name="keyword" value="{{$keyword}}"></p>
                    <p><input type="submit" value="検索"></p>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">ユーザー一覧</div>
            <div class="card-body">

                @if ($user_list->count())
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
                @else
                    <p>見つかりませんでした。</p>
                @endif

{{--                <div class="mt-3">--}}
{{--                    {{ $user_list->links() }}--}}
{{--                </div>--}}

            </div>
        </div>
    </div>
@endsection
