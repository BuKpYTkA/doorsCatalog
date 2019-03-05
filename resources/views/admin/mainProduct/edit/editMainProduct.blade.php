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
        <input id="lol" {{ $mainProduct->isActive() ? 'checked="checked"' : '' }} type="checkbox" value="isActive">
        <div id="image-block" style="display: grid;">
            <a href="#" id="addBlock">ADD</a>
            <a href="#" id="deleteBlock">DELETE</a>
            @if($mainProduct->getImages())
                @foreach($mainProduct->getImages() as $image)
                    <input class="width" id="" name="image-{{ $image->getId() }}" type="text" value="{{ $image->getUrl() }}">
                @endforeach
            @else
                <input class="width" type="text" name="image" value="">
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
        let counter = 1;

        document.getElementById('addBlock').onclick = function () {
            const form = document.getElementById('image-block');
            const input = document.createElement('input');
            input.setAttribute('type', 'text');
            input.setAttribute('name', `image${counter}`);
            input.setAttribute('class', 'width');
            form.appendChild(input);
            counter++;
        };

        document.getElementById('deleteBlock').onclick = function () {
            const form = document.getElementById('image-block');
            const deletedBlock = document.getElementsByName(`image${counter-1}`);
            Array.prototype.forEach.call(deletedBlock, function (block) {
                form.removeChild(block);
            });
            if (counter > 0) {
                counter--;
            }
        };
    }

</script>