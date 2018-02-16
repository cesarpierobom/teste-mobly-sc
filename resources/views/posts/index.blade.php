@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">Posts</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>BODY</th>
                                <th>COMMENTS</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->body}}</td>
                                <td><a href="{{ route('showCommentsByPostId',['id'=>$post->id]) }}">Comentários</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Nenhum post encontrado!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            <div>
        </div>
    </div>
</div>
@endsection