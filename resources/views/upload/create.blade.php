@extends('layout.app')

@section('content')

<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">

    @csrf

<div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control">
</div>

 <div class="form-group">
    <label for="content">Content</label>
</div>

<textarea name="content" rows="10" class="form-control"></textarea>

<div class="form-group">
    <input type="file" name="image" class="form-control">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-outline-primary">Add blog post</button>
</div>

</form>

@endsection

