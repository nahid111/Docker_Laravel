@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-sm-12">
                <a href="{{ url('/posts') }}" class="btn btn-danger pull-right">Cancel</a>
                <h3>Create New Post</h3>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <form action="{{ url('/posts') }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea class="form-control" id="article-ckeditor" name="body" placeholder="Body Text"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="" id="cover_image" name="cover_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>




    </div>
@endsection



@section('pageScripts')
    <script type="text/javascript" src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('article-ckeditor');
    </script>
@endsection
