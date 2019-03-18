@extends ('layouts.app')

@section('content')
    <form action="{{ route('admin.edit.main.product', $mainProduct['id']) }}" method="POST">
        @csrf
        title:<input type="text" name="title" value="{{ $mainProduct['title'] }}">
        <select name="brand" id="">
            @foreach($brands as $brand)
                <option {{ $mainProduct['brand']['id'] === $brand->getId() ? 'selected="selected"' : '' }} value="{{ $brand->getId() }}">{{ $brand->getTitle() }}</option>
            @endforeach
        </select>
        price:<input type="text" name="price" value="{{ $mainProduct['price'] }}">
        description:<input type="text" name="description" value="{{ $mainProduct['description'] }}">
        <select name="type" id="">
            @foreach($types as $type)
                <option {{ $mainProduct['type']['id'] === $type->getId() ? 'selected="selected"' : '' }} value="{{ $type->getId() }}">{{ $type->getSingle() }}</option>
            @endforeach
        </select>
        <input id="lol" {{ $mainProduct['is_active'] ? 'checked="checked"' : '' }} type="checkbox" value="isActive">
        <br>
        <a href="#" id="addBlock">ADD</a>
        <a href="#" id="deleteBlock">DELETE</a>
        <div id="image-block" style="display: grid;">
            @if($mainProduct['images'])
                @foreach($mainProduct['images'] as $image)
                    <input class="width" id="" name="image[]" type="text" value="{{ $image['url'] }}">
                @endforeach
            @else
                <input class="width" type="text" name="image[]" value="">
            @endif
        </div>
        <input type="submit" name="save" value="Сохранить">
    </form>
@endsection

<style>
    .width {
        width: 20%;
    }
</style>

<script type="text/javascript">

    window.onload = function () {

        document.getElementById('addBlock').onclick = function () {
            event.preventDefault();
            const form = document.getElementById('image-block');
            const input = document.createElement('input');
            input.setAttribute('type', 'text');
            input.setAttribute('name', `image[]`);
            input.setAttribute('class', 'width');
            form.appendChild(input);
        };

        document.getElementById('deleteBlock').onclick = function () {
            event.preventDefault();
            const form = document.getElementById('image-block');
            let deletedBlock = form.lastChild;
            if (deletedBlock && deletedBlock.getAttribute('name') === 'image[]') {
                form.removeChild(deletedBlock);
            }
        };
    }

</script>