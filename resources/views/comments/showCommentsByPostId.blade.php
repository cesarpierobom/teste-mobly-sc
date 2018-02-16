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
                                <th>POST</th>
                                <th>NOME</th>
                                <th>EMAIL</th>
                                <th>BODY</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($comments as $comment)
                            <tr>
                                <td>{{$comment->post_id}}</td>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->email}}</td>
                                <td>{{$comment->body}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Nenhum comentário encontrado!</td>
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