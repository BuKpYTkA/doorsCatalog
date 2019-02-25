@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($products as $product)
            <p>{{ $product->getTitle() }}  <a href="{{ route('admin.edit.additional.product', $product->getId()) }}">Edit</a>
                <a href="{{ route('admin.delete.additional.product', $product->getId()) }}">Delete</a>
            </p>
        @endforeach
        {{ $products->links() }}
            <a href="{{ route('admin.create.additional.product') }}"><input type="button" value="Создать"></a>
            @foreach($paginationValues as $value)
                <br>
                <a href="{{ route('set.pag', md5($value)) }}">{{ $value }}</a>
            @endforeach
    </div>
@endsection
