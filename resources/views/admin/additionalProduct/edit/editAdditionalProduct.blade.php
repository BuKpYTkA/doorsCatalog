@extends ('layouts.app')

@section('content')
    <form action="{{ route('admin.edit.additional.product', $additionalProduct->getId()) }}" method="POST">
        @csrf
        title:<input type="text" name="title" value="{{ $additionalProduct->getTitle() }}">
        price:<input type="text" name="price" value="{{ $additionalProduct->getPrice() }}">
        <select name="type" id="">
            @foreach($types as $type)
                <option {{ $additionalProduct->getTypeId() === $type->getId() ? 'selected="selected"' : '' }} value="{{ $type->getId() }}">{{ $type->getSingle() }}</option>
            @endforeach
        </select>
        <input type="checkbox" {{ $additionalProduct->isActive() ? 'checked' : '' }} name="isActive">
        <input type="submit" name="save" value="Сохранить">
    </form>
@endsection