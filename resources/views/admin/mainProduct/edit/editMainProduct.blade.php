@extends ('layouts.app')

@section('content')
    <form action="{{ route('admin.edit.main.product', $mainProduct->getId()) }}" method="POST">
        @csrf
        title:<input type="text" name="title" value="{{ $mainProduct->getTitle() }}">
        <select name="brand" id="">
            @foreach($brands as $brand)
                <option {{ $mainProduct->getBrandId() === $brand->getId() ? 'selected="selected"' : '' }} value="{{ $brand->getId() }}">{{ $brand->getTitle() }}</option>
                @endforeach
        </select>
        price:<input type="text" name="price" value="{{ $mainProduct->getPrice() }}">
        description:<input type="text" name="description" value="{{ $mainProduct->getDescription() }}">
        <select name="type" id="">
        @foreach($types as $type)
            <option {{ $mainProduct->getTypeId() === $type->getId() ? 'selected="selected"' : '' }} value="{{ $type->getId() }}">{{ $type->getSingle() }}</option>
        @endforeach
        </select>
        <input {{ $mainProduct->isActive() ? 'checked="checked"' : '' }} type="checkbox" value="isActive">
        @foreach($images as $image)
            <input type="text" value="{{ $image->getUrl() }}">
        @endforeach
        @if(!$images)
            <input type="text" name="image" value="">
        @endif
        <input type="submit" name="save" value="Сохранить">
    </form>
@endsection