@extends('layouts.dashboard')

@section('section-post')
<a href="{{ route('post.create') }}"><button type="button" class="btn btn-primary">Aggiungi post</button></a>
    @foreach ($posts as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->user_id }}</td>
            <td>{{ $item->content }}</td>
            <td><img style="width: 10rem;"  src="{{ asset('storage/' .$item->cover) }}" alt=""></td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
            <td><a href="{{ route('post.show', ['post' => $item -> id]) }}"><button type="button" class="btn btn-secondary">View</button></a></td>
            <td><a href="{{ route('post.edit', ['post' => $item -> id]) }}"><button type="button" class="btn btn-success">Edit</button></a></td>
            <td>
                <form action="{{ route('post.destroy', $item-> id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @csrf
        @endforeach
@endsection