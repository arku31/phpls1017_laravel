@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Post list</div>
                <div class="btns">
                    <a href="/posts/create" class="btn btn-primary">Create</a>
                    <a href="/posts/edit/{{$post->id}}" class="btn btn-primary">Edit</a>
                </div>
                <div class="panel-body">
                    <ul>
                            <li>{{$post->id}}</li>
                            <li>{{$post->title}}</li>
                            <li>{{$post->content}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
