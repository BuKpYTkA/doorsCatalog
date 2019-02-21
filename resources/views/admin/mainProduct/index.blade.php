@extends('layouts.app')

@section('content')
    <div class="container">


        @foreach($products as $product)
            <p>{{ $product->getTitle() }}</p>
        @endforeach
        {{ $products->links() }}
    </div>
@endsection