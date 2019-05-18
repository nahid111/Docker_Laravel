@extends('layouts.app')


@section('content')
    <div class="container">


        <div class="row">
            <div class="col-sm-12">
                <h1>Posts</h1>
                <hr>
            </div>
        </div>


        @if( count($posts) > 0 )
            @foreach($posts as $post)
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width: 100%" src="/storage/cover_images/{{ $post->cover_image }}" alt="">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h3>
                            <small>Created on: {{ $post->created_at }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--{{ $posts->links() }}--}}
        @else
            <div class="well text-center text-danger">No Post Found</div>
        @endif


    </div>
@endsection