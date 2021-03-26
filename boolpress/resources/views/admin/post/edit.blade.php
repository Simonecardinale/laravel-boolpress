@extends('layouts.app')

@section('content')
<div class="container w-70">
    <a href="{{ route('post.index') }}"><button type="button" class="btn btn-primary">Indietro</button></a>
    <h2>Title</h2>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="{{ $item->title }}">
    </div>
    <h2>Text</h2>
    <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <textarea class="form-control" aria-label="With textarea">{{ $item ->content }}</textarea>
      </div>
</div>
@endsection