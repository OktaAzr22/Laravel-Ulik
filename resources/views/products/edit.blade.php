@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf @method('PUT')
        <input name="name" value="{{ $product->name }}"><br>
        <textarea name="description">{{ $product->description }}</textarea><br>
        <input name="price" value="{{ $product->price }}"><br>
        <button type="submit">Update</button>
    </form>
@endsection
