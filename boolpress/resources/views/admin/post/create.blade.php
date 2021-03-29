@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
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
    <form>
        <div class="form-group">
          <label for="immagine">Carica l'immagine</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
        </div>
      </form>
    <h2>Text</h2>
    <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <textarea class="form-control" aria-label="With textarea" name="content"></textarea>
      </div>
      <button type="submit" class="btn btn-success">Confirm</button>
    @foreach ($tags as $element)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $element -> id }}" name="tags[]" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                {{ $element-> name }}
                </label>
            </div>
    @endforeach
</div>
</form>
@endsection