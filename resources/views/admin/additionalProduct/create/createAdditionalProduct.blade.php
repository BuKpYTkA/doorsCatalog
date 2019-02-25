@extends ('layouts.app')

@section('content')
    <form action="{{ route('admin.create.additional.product') }}" method="POST">
        @csrf
        title:<input type="text" name="title" value="">
        price:<input type="text" name="price" value="">
        <select name="type" id="">
        @foreach($types as $type)
                <option value="{{ $type->getId() }}">{{ $type->getSingle() }}</option>
            @endforeach
        </select>
        <label><input type="checkbox" name="isActive">Активность</label>
        <input type="submit" name="create" value="Создать">
    </form>
@endsection