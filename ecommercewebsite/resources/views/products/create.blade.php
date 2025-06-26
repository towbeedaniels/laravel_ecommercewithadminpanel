@extends('app')

@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')<div>{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description') }}</textarea>
            @error('description')<div>{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Price:</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}">
            @error('price')<div>{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Stock:</label>
            <input type="number" name="stock" value="{{ old('stock') }}">
            @error('stock')<div>{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Category:</label>
            <select name="category_id">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')<div>{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Image:</label>
            <input type="file" name="image">
            @error('image')<div>{{ $message }}</div>@enderror
        </div>
        <button type="submit">Create</button>
    </form>
    <a href="{{ route('products.index') }}">Back to Products</a>
@endsection 