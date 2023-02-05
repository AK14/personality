@extends('components.layout')
@section('title', 'Products')
@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<h3 class="text-muted">Add new product</h3>

<form action="{{  route('products.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="productTitle">Product title</label>
        <input type="text" name="title" class="form-control" id="productTitle" aria-describedby="titleHelp" placeholder="Enter product title">
        <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="productPrice">Price</label>
        <input type="number" name="price" class="form-control" id="productPrice" placeholder="US price">
    </div>

    <input type="submit" value="Create" class="btn btn-primary">
</form>

@endsection