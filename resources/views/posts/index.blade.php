@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <a class="btn button btn-info" href="/posts/create">Create New</a>
                    <div class="card-body">


                        <table class="table">
                            <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> TITLE </th>
                                        <th> DESCRIPTION </th>
                                        <th>  </th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $post)
                                <tr>
                                        <td> {{ $post->id }} </td>
                                        <td> {{ $post->title }} </td>
                                        <td> {{ $post->description }} </td>
                                        <td> <a  href="/posts/{{$post->id}}" class="btn btn-success"> View </a> </td>
                                        <td> <a  href="/posts/{{$post->id}}/edit" class="btn btn-info"> Edit </a> </td>
                                        <td>
                                            <form action="{{route('posts.destroy', $post ->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
