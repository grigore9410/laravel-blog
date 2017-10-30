@extends('main')

@section('title', '| Delete Blog Post')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-sm-6">
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">NO</a>
                <a href="{{ route('posts.index', $post->id) }}" class="btn btn-default btn-sm">YES!</a>
            </div>
        </div>
    </div>
@endsection