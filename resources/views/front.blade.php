@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="cards_here">
        </div>
    </div>
</div>
@endsection


@section('more_scripts')
<script src="{{ asset('js/frontend.js') }}"></script>
@endsection