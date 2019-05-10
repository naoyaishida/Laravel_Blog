@extends('layout.app')

@section('content')

<div class="row">

    <div class="col-md-12">

        {{-- インデックスページ以外はアセットを使ってコネクション    --}}

            <img src="{{asset($upload->image)}}" class="card-img-top">

        <p class="lead">
            {{$upload->title}}
        </p>

        {{--
<a href="{{route('edit_blog_path',['blog'=>$blog->id])}}" class="btn btn-outline-info">Edit</a> --}}


        <a href="{{route('edit',['upload'=>$upload->id])}}"  class="btn btn-outline-info" >Edit</a>
        {{-- スラッシュいれないと戻れない --}}
        <a href="{{'/upload'}}" class="btn btn-outline-primary" >Back</a>

    <form action="{{route('delete',['upload'=>$upload->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
    </form>
    </div>

</div>

@endsection
