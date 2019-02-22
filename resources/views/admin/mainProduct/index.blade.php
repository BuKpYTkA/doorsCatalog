@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($products as $product)
            <p>{{ $product->getTitle() }}  <a href="{{ route('admin.edit.main.product', $product->getId()) }}">Edit</a>
                <a href="{{ route('admin.delete.main.product', $product->getId()) }}">Delete</a>
            </p>
        @endforeach
        {{ $products->links() }}
            <a href="{{ route('admin.create.main.product') }}"><input type="button" value="Создать"></a>
    </div>
@endsection
