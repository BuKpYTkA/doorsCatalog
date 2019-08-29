<?php
/**
 * @var $products App\Entity\MainProduct\MainProduct[]
 */
?>

@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>price</th>
            <th>active</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th>{{ $product->id }}</th>
                <th>{{ $product->getTitle() }}</th>
                <th>{{ $product->getDescription() }}</th>
                <th>{{ $product->getPrice() }}</th>
                <th><input type="checkbox" {{ $product->isActive() ? 'checked' : '' }}></th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection;