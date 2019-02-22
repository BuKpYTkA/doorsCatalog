@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="{{ route('admin.show.main.products') }}">Main Products</a></p>
        <p><a href="{{ route('admin.show.additional.products') }}">Additional Products</a></p>
    </div>
@endsection
