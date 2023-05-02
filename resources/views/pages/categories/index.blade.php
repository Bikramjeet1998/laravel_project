@extends('layouts.master')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mb-4 mt-4 text-center">List Of Categories</h1>
        {{-- form --}}
        <table class="table  table-hover table-bordered">
            {{-- <caption>List of users</caption> --}}
            <thead class="thead-dark fw-bold"></thead>
            <tr >
                <th>Name</th>
                <th>Image </th>
                <th>Status</th>
                <th>Description</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->image}}</td>
                <td>{{$category->status}}</td>
                <td>{{$category->description}}</td>
                <td>
                        {{-- <form action="{{route('categories.destroy', $category->id)}}" method="post"> --}}
                            <form method="Post" action="/categories/destroy/{{$category->id}}">
                            @csrf
                            @method('DELETE')
                    <a class="btn btn-primary" href="{{route('categories.show', $category->id)}}">Detail</a>
                    <a class="btn btn-primary" href="{{route('categories.edit', $category->id)}}">Edit</a>
                    {{-- <a class="btn btn-danger" href="{{route('categories.destroy', $category->id)}}">Delete</a> --}}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure to delete this?')">Delete</button>
                        </form>
                </td>
            </tr>
               @endforeach 
                </tbody>
        </table>
        {{-- /form --}}
    </div>
</main>
@endsection


