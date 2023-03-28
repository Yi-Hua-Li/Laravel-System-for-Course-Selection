@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @guest
                    <h1 style="text-align: center;height: 25vh;">歡迎您使用選課系統</h1>
                    <h1 style="text-align: center;height: 25vh;">請先登入後再進行操作!</h1>
                @else
                    @foreach (App\Post::orderBy('created_at','DESC')->get() as $post)
                        <div class="card">
                            <div class="card-header">
                                #{{ $post->id }}
                                {{ $post->title }} @ {{ $post->created_at }}
                                <a href="{{ route( 'posts.edit',[$post->id]) }}">(編輯)</a>
                            </div>
                            <div class="card-body">
                                {!!  nl2br($post->content) !!}
                            </div>
                        </div>
                    @endforeach
                @endguest
            </div>
        </div>
    </div>
@endsection

