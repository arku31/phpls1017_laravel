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
                    <ul>
                        @foreach($posts as $post)
                            <li>{{$post->id}} : {{$post->title}} ||| Author: {{$post->user->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
