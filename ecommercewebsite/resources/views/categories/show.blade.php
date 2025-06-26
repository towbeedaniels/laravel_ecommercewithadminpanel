@extends('app')

@section('content')
    <h1>Category Details</h1>
    <p><strong>Name:</strong> {{ $category->name }}</p>
    <p><strong>Description:</strong> {{ $category->description }}</p>
    <p><strong>Parent:</strong> {{ $category->parent_id ? $category->parent->name : '-' }}</p>
    <a href="{{ route('categories.edit', $category) }}">Edit</a> |
    <a href="{{ route('categories.index') }}">Back to Categories</a>
@endsection 