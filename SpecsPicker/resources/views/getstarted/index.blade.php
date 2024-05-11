@extends("layouts.app")
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section("content")

<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col">
            <h5 class="d-inline-block mb-0">Find the required hardware specifications for a software</h5>
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <div class="col">
            <p class="d-inline-block">Powered by AI</p>
            <img src="{{ asset('/img/ailogo.png') }}" width="5%" class="d-inline-block">
            <a href="{{ route("home.index") }}" class="btn btn-primary d-inline-block ml-2">GET STARTED!</a>
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <div class="col">
            <img src="{{ asset('/img/getstarted.png') }}" width="60%">
        </div>
    </div>
</div>

@endsection
