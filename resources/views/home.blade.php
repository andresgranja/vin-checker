@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::check()) <!-- This check is optional here since the route is already protected -->
        <div id="app">
            <vin-decoder></vin-decoder>
        </div>
    @endif
</div>
@endsection
