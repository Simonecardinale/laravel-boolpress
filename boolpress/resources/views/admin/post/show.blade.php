@extends('layouts.dashboard')
@section('section-post')
<a href="{{ route('post.index') }}"><button type="button" class="btn btn-primary">Indietro</button></a>
<a href="{{ route('post.edit', ['post' => $item -> id]) }}"><button type="button" class="btn btn-success">Edit</button></a>
<tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->title }}</td>
    <td>{{ $item->user_id }}</td>
    <td>{{ $item->content }}</td>
    <td><img style="width: 10rem;" src="{{ asset('storage/' .$item->cover) }}" alt=""></td>
    <td>{{ $item->created_at }}</td>
    <td>{{ $item->updated_at }}</td>
</tr>
@endsection