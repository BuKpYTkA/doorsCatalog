<?php
/**
 * @var $products App\Entity\MainProduct\MainProduct[]
 */
?>

@extends('layouts.app')
@section('content');
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th>{{ $product->getId() }}</th>
                <th>{{ $product->getTitle() }}</th>
                <th>{{ $product->getDescription() }}</th>
                <th>{{ $product->getPrice() }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection;