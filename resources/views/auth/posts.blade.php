@extends('layouts.app')
@section('content')

    <div class="container">
        <h3 class="my-5">Հայտարարություններ</h3>
        <div class="add-post">
            <form action="{{ route('posts.add') }}" method="POST">
                @csrf
                <textarea name="content" id="editor" cols="30" rows="10"></textarea>
                <button class="btn btn-success my-2">Add</button>
            </form>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="posts-all">
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" >
                        <h4>{{ $post['user']['name'] }}</h4>
                        @if($post['user']['id']==Auth::id() || Auth::user()['role_id']==1)
                            <a style="color: black" href="/posts/delete/{{ $post['id'] }}">
                                <i class="fa fa-close"></i>
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        {!! $post->content !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
