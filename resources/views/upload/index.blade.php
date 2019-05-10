@extends('layout.app')

@section('content')

<div class="row">

@foreach ($uploads as $upload)

<div class="col-md-6">

    <div class="card">

        <div class="card-header">
            <a href="{{route('show',['upload'=>$upload->id])}}">{{$upload->title }}</a>
        </div>

        <div class="card-body">
        <a href="{{route('show',['upload'=>$upload->id])}}">
                <img src="{{($upload->image)}}" alt="{{$upload->title}}"  class="card-img-top"></a>
            
        <p class="lead">
            posted
            {{$upload->created_at->diffForHumans()}}
        </p>

    <a href="{{route('show',['upload'=>$upload->id])}}" class="btn btn-outline-primary">View Post</a>

        </div>


    </div>


</div>

@endforeach


</div>
@endsection
