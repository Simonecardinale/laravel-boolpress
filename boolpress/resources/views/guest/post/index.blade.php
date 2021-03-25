@extends('layouts.app')
@section('content')
    <div class="class-container d-flex flex-wrap justify-content-around">
    @foreach ($posts as $item)
        <div class="card mt-3" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">{{ $item->content }}</p>
              <p>{{ $item->user->name }}</p>
              <p>{{ $item->user->email }}</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          @endforeach
        </div>
@endsection