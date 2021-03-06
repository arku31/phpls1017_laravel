@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Post list</div>
                <div class="btns">
                    <a href="/posts/create" class="btn btn-primary">Create</a>
                </div>
                <div class="panel-body">
                    @foreach ($errors->all() as $error)
                        <li style="color: red">{{$error}}</li>
                    @endforeach
                    <form action="/posts/store" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="text" name="title" class="input-group">
                        <input type="text" name="content" class="input-group">
                        <input type="file" name="post_image">
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
