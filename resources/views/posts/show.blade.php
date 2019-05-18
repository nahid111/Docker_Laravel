@extends('layouts.app')


@section('content')
    <div class="container">


        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ url('/posts') }}" class="btn btn-default">Go back</a>
                    </div>
                </div>
            @endif
        @endif

        <div class="row">
            <div class="col-sm-12">
                <h1>{{ $post->title }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                Created on: {{ $post->created_at }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <img style="width: 100%" src="/storage/cover_images/{{ $post->cover_image }}" alt="">
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-12">
                {!! $post->body !!}
                <hr>
            </div>
        </div>

        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <div class="row">
                    <div class="col-sm-12">
                        &nbsp; &nbsp; <a class="btn btn-primary" href="/posts/{{ $post->id }}/edit">Edit</a>

                        <form method="POST" action="/posts/{{$post->id}}" accept-charset="UTF-8" class="pull-left">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Delete this post?');">
                        </form>

                    </div>
                </div>
            @endif
        @endif




    </div>
@endsection

