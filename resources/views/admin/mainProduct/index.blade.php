@extends('layouts.app')

@section('content')
    <div id="cont" class="container">
        @if(!$products->all())
            <h1>ПО ВАШЕМУ ЗАПРОСУ НИЧЕГО НЕ НАЙДЕНО</h1>
        @else
            <a href="?sort=expensive">дорогие</a>
            <a href="?sort=cheap">дешевые</a>
            <table>
                <tr>
                    <th>Title</th>
                    <th>price</th>
                    <th>brand id</th>
                    <th>type id</th>
                    <th>edit</th>
                    <th>delete</th>
                    <th>images</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <th>{{ $product->getTitle() }}</th>
                        <th>{{ $product->getPrice() }}</th>
                        <th>{{ $product->getBrandId() }}</th>
                        <th>{{ $product->getTypeId() }}</th>
                        <th><a href="{{ route('admin.edit.main.product', $product->getId()) }}">Edit</a></th>
                        <th><a href="{{ route('admin.delete.main.product', $product->getId()) }}">Delete</a></th>
                    </tr>
                @endforeach
            </table>
        @endif
        {{ $links }}
        <a href="{{ route('admin.create.main.product') }}"><input class="btn btn-primary" type="button" value="Создать"></a>
    </div>
@endsection
