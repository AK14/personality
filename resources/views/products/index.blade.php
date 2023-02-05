@extends('components.layout')
@section('title', 'Products')
@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<h3 class="text-muted">Products</h3>

    @if(auth()->user()->is_admin)
        <a href="{{ route('products.create') }}" class="mb-4 inline-flex items-center px-4 py-2 btn btn-dark ">
            Add new product
        </a>
    @endif

    @if($products)
        <div class="row mp-2 border border-bottom-0 text-center">
            <div class="col text-uppercase h-3">title</div>
            <div class="col text-uppercase h-3 ">USD price </div>
            <div class="col text-uppercase h-3"> EUR price </div>
            @if(auth()->user()->is_admin)
                <div class="col text-uppercase h-3">  </div>
            @endif
        </div>
    @endif
    @forelse($products as $product)
        <div class="row mp-2 border text-center">
            <div class="col">{{ $product->title }}</div>
            <div class="col">{{ $product->price }} </div>
            <div class="col">{{ $product->getPriceEurAttribute() }} </div>
            <div class="col">
                @if(auth()->user()->is_admin)
                    <a class="btn btn-success" href=" {{ route('products.edit', $product) }}"> Edit </a> <br>
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                @endif
            </div>
        </div>
    @empty
        no products found
    @endforelse

    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}

@endsection