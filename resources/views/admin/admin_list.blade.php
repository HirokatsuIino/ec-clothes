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
                <form action="{{url('/admin/admin_list')}}" method="GET">
                    <p>管理者名：<input type="text" name="keyword" value="{{$keyword}}"></p>
                    <p><input type="submit" value="検索"></p>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">管理者一覧</div>
            <div class="card-body">

                @if ($admin_list->count())
                    <ul class="list-group">
                        @foreach ($admin_list as $admin)
                            <li class="list-group-item">
                                <a href="{{ url('admin/admin_list/' . $admin->id) }}">
                                    {{ $admin->name }}
                                </a>
                                {{ $admin->created_at }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>見つかりませんでした。</p>
                @endif

                <div class="mt-3">
                    {{ $admin_list->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection


{{--@extends('layouts.admin')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">管理者一覧</div>--}}
{{--            <div class="card-body">--}}

{{--                <ul class="list-group">--}}
{{--                    @foreach ($admin_list as $admin)--}}
{{--                        <li class="list-group-item">--}}
{{--                            <a href="{{ url('admin/admin_detail/' . $admin->id) }}">--}}
{{--                                {{ $admin->name }}--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}

{{--                <div class="mt-3">--}}
{{--                    {{ $admin_list->links() }}--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
