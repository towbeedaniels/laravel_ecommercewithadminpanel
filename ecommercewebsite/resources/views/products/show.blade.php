@extends('app')

@section('content')
    <h1>Product Details</h1>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Price:</strong> {{ $product->price }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>
    <p><strong>Category:</strong> {{ $product->category->name ?? '-' }}</p>
    @if($product->image)
        <p><img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="200"></p>
    @endif
    <a href="{{ route('products.edit', $product) }}">Edit</a> |
    <a href="{{ route('products.index') }}">Back to Products</a>
@endsection 