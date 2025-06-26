@extends('app')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
            @error('name')<div>{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
            @error('description')<div>{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Price:</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}">
            @error('price')<div>{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Stock:</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
            @error('stock')<div>{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Category:</label>
            <select name="category_id">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')<div>{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Image:</label>
            <input type="file" name="image">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100">
            @endif
            @error('image')<div>{{ $message }}</div>@enderror
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('products.index') }}">Back to Products</a>
@endsection 