@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('guest.contatti.sent') }}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="nomeUtente">Nome</label>
          <input type="text" class="form-control" id="nomeUtente" aria-describedby="emailHelp" name="name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="exampleInputPassword1" name="mail">
        </div>
        <div class="form-group">
            <label for="messaggioUtente">Messaggio</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection