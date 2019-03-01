@extends('layouts.app')

@section('content')
    <div class="container">
        <table>
            <tr>
                <th>Title</th>
                <th>price</th>
                <th>brand id</th>
                <th>type id</th>
                <th>edit</th>
                <th>delete</th>
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
        {{ $links }}
        <a href="{{ route('admin.create.main.product') }}"><input type="button" value="Создать"></a>
        @foreach($paginationValues as $value)
            <br>
            <a href="?per_page={{ $value }}">{{ $value }}</a>
        @endforeach
        <br>
        @foreach($products as $product)
            {{ $product->getTitle().'  '.$product->getPrice() }}
            <br>
        @endforeach
    </div>
@endsection

