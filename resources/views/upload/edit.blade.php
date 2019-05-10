@extends('layout.app')

@section('content')

<form action="{{route('update',['upload'=>$upload->id])}}" method="post">

    @csrf
    @method('PUT') 

    <div class="form-group">
        <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{$upload->title}}">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
    </div>

<textarea name="content" rows="10" class="form-control">{{$upload->content}}</textarea>

<div class="form-group">
    <button type="submit" class="btn btn-outline-primary">Edit</button>
</div>
</form>

@endsection
