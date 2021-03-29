@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('status'))    
        <h1>Messaggio inviato correttamente</h1>
        <p>{{ session('status') }}</p>
    @endif
</div>
@endsection