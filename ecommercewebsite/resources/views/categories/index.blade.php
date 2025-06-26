@extends('app')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}">Create New Category</a>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Parent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->parent_id ? $category->parent->name : '-' }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category) }}">View</a> |
                        <a href="{{ route('categories.edit', $category) }}">Edit</a> |
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection 