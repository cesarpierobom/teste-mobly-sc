@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Teste Pratico BackEnd</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="m-1 btn btn-sm btn-primary" href="{{ route('requestNewPosts') }}">Importar Posts</a>
                                    <a class="m-1 btn btn-sm btn-primary" href="{{ route('requestNewComments') }}">Importar Comentarios</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a class="m-1 btn btn-sm btn-primary" href="{{ route('posts.index_api') }}" >Exibir Posts (API)</a>
                                    <a class="m-1 btn btn-sm btn-primary" href="{{ route('comments.index_api') }}" >Exibir Comentarios (API)</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a class="m-1 btn btn-sm btn-primary" href="{{ route('posts.index') }}" >Exibir Posts (VIEW)</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
