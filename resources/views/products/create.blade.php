@extends('layouts.app')

@section('content')
    <h1>Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <input name="name" placeholder="Name"><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input name="price" placeholder="Price"><br>
        <button type="submit">Save</button>
    </form>
@endsection
