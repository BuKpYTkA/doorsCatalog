<?php
/**
 * @var $products App\Entity\MainProduct\MainProduct[]
 */
?>

@extends('layouts.app')
@section('content');
    <div class="container">
        <table>
            <thead>
                <tr>id</tr>
                <tr>title</tr>
                <tr>description</tr>
                <tr>price</tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>{{ $product->getId() }}</tr>
                    <tr>{{ $product->getTitle() }}</tr>
                    <tr>{{ $product->getDescription() }}</tr>
                    <tr>{{ $product->getPrice() }}</tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection;