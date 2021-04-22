@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    Title: {{$post -> title}} <br>
                    Description: {{$post -> description}} <br>
                    Created at: {{$post -> created_at}}<br>
                    Image: {{$post -> img}} <br>
                    <img src="{{ asset('/storage/img/'.$post->img) }}">
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
