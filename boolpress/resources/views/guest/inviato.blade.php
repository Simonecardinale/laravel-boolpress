@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('status'))    
        <h1>Messaggio inviato correttamente</h1>
        <p>{{ session('status') }}</p>
    @endif
    <a href="{{ route('index') }}"><button type="button" class="btn btn-primary">Home</button></a>
</div>
@endsection