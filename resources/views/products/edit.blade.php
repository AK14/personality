@extends('components.layout')
@section('title', 'Products')
@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <h3 class="text-muted">Add new product</h3>

    <form action="{{  route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="productTitle">Product title</label>
            <input
                value="{{ $product->title }}"
                type="text"
                name="title"
                class="form-control"
                id="productTitle"
                aria-describedby="titleHelp"
                placeholder="Enter product title">
            <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="productPrice">Price</label>
            <input
                value="{{ number_format($product->price, 2) }}"
                type="number"
                name="price"
                class="form-control"
                id="productPrice"
                placeholder="US price">
        </div>

        <input type="submit" value="Update" class="btn btn-primary mt-2">
    </form>

@endsection