@extends ('layouts.app')

@section('content')
    <form action="{{ route('admin.edit.additional.product', $mainProduct->getId()) }}" method="POST">
        @csrf
        title:<input type="text" name="title" value="{{ $mainProduct->getTitle() }}">
        price:<input type="text" name="price" value="{{ $mainProduct->getPrice() }}">
        <select name="type" id="">
            <option {{ $mainProduct->getType() === 'Двери' ? 'selected=selected' : '' }} value="Двери">Двери</option>
            <option {{ $mainProduct->getType() === 'Ручка' ? 'selected=selected' : '' }} value="Ручка">Ручка</option>
            <option {{ $mainProduct->getType() === 'Фурнитура' ? 'selected=selected' : '' }} value="Фурнитура">Фурнитура</option>
        </select>
        <input type="checkbox" {{ $mainProduct->isActive() ? 'checked' : '' }} name="isActive">
        <input type="submit" name="save" value="Сохранить">
    </form>
@endsection