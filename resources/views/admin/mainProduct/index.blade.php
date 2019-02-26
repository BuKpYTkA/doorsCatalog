

@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($products as $product)
            <p>{{ $product->getTitle() }}  <a href="{{ route('admin.edit.main.product', $product->getId()) }}">Edit</a>
                <a href="{{ route('admin.delete.main.product', $product->getId()) }}">Delete</a>
            </p>
        @endforeach
        {{ $links }}
            <a href="{{ route('admin.create.main.product') }}"><input type="button" value="Создать"></a>
            @foreach($paginationValues as $value)
            <br>
            <a href="?per_page={{ $value }}">{{ $value }}</a>
            @endforeach
            <br>
        @foreach($products as $product)
            {{ $product->getTitle() }}
                <br>
            @foreach($product->getImages() as $image)
                {{ $image->getGoogleUrl() }}
                    <br>
                @endforeach
            @endforeach
    </div>
@endsection
