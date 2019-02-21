@extends ('layouts.app')

@section('content')
    <p>{{ $mainProduct->getTitle() }}</p>
    <p>{{ $mainProduct->getPrice() }}</p>
    <p>{{ $mainProduct->getBrand() }}</p>
@endsection