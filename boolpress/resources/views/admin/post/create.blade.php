@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('post.store') }}">
@method('POST')
@csrf
<div class="container w-70">
    <a href="{{ route('post.index') }}"><button type="button" class="btn btn-primary">Indietro</button></a>
    <h2>Title</h2>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="title">
    </div>
    <h2>Text</h2>
    <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <textarea class="form-control" aria-label="With textarea" name="content"></textarea>
      </div>
      <button type="submit" class="btn btn-success">Confirm</button>
</div>
</form>
@endsection