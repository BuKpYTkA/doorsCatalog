@extends ('layouts.app')

@section('content')
    <form action="{{ route('admin.create.main.product') }}" method="POST" id="form">
        @csrf
        title:<input type="text" name="title" value="">
        <select name="brand" id="">
            <option disabled selected value>Выберите бренд</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->getId() }}">{{ $brand->getTitle() }}</option>
            @endforeach
        </select>
        price:<input type="text" name="price" value="">
        description:<input type="text" name="description" value="">
        <select name="type" id="">
            @foreach($types as $type)
                <option value="{{ $type->getId() }}">{{ $type->getSingle() }}</option>
            @endforeach
        </select>
        <label><input type="checkbox" name="isActive">Активность</label>
        <div id="image-block" style="display: grid;">
            images:<input class="width" type="text" name="image" value="">
        </div>
        <a onclick="addInput()">ADD</a>
        <input type="submit" name="create" value="Создать">
    </form>
@endsection

<style>
    .width {
        width: 20%;
    }
</style>

<script>
    let counter = 1;

    function addInput() {
        const form = document.getElementById('image-block');
        const input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('name', `image${counter}`);
        input.setAttribute('class', 'width');
        form.appendChild(input);
        counter++;
    }
</script>