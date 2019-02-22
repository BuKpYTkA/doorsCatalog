@extends ('layouts.app')

@section('content')
    <form action="{{ route('admin.edit.main.product', $mainProduct->getId()) }}" method="POST">
        @csrf
        title:<input type="text" name="title" value="{{ $mainProduct->getTitle() }}">
        brand:<input type="text" name="brand" value="{{ $mainProduct->getBrand() }}">
        price:<input type="text" name="price" value="{{ $mainProduct->getPrice() }}">
        description:<input type="text" name="description" value="{{ $mainProduct->getDescription() }}">
        <select name="type" id="">
            <option {{ $mainProduct->getType() === 'Двери' ? 'selected=selected' : '' }} value="Двери">Двери</option>
            <option {{ $mainProduct->getType() === 'Ручка' ? 'selected=selected' : '' }} value="Ручка">Ручка</option>
            <option {{ $mainProduct->getType() === 'Фурнитура' ? 'selected=selected' : '' }} value="Фурнитура">Фурнитура</option>
        </select>
        @foreach($images as $image)
            <input type="text" value="{{ $image->getUrl() }}">
        @endforeach
        @if(!$images)
            <input type="text" name="image" value="">
        @endif
        <input type="submit" name="save" value="Сохранить">
    </form>
@endsection