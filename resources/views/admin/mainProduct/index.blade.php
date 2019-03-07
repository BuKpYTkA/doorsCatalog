@extends('layouts.app')

@section('content')
    <div id="cont" class="container">
        @if(!$products->all())
            <h1>ПО ВАШЕМУ ЗАПРОСУ НИЧЕГО НЕ НАЙДЕНО</h1>
        @else
            <a class="sort" id="expensive" href="#">дорогие</a>
            <a class="sort" id="cheap" href="#">дешевые</a>
            <table>
                <tr>
                    <th>Title</th>
                    <th>price</th>
                    <th>brand id</th>
                    <th>type id</th>
                    <th>edit</th>
                    <th>delete</th>
                    <th>images</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <th>{{ $product->getTitle() }}</th>
                        <th>{{ $product->getPrice() }}</th>
                        <th>{{ $product->getBrandId() }}</th>
                        <th>{{ $product->getTypeId() }}</th>
                        <th><a href="{{ route('admin.edit.main.product', $product->getId()) }}">Edit</a></th>
                        <th><a onclick="deleteProduct(this)" value="{{ $product->getId() }}" id="delete" link="{{ route('admin.delete.main.product', $product->getId()) }}" href="#">Delete</a></th>
                    </tr>
                @endforeach
            </table>
        @endif
        {{ $links }}
        <a href="{{ route('admin.create.main.product') }}"><input class="btn btn-primary" type="button" value="Создать"></a>
    </div>
@endsection


<script type="text/javascript">
    var url = document.URL;

    function answer (element) {
        if (confirm('you sure?')) {
            window.location.href = element.getAttribute('link');
        }
    }

    function deleteProduct(element) {
        let productId = element.getAttribute('value');
        if (productId) {
            if (confirm('you sure?')) {
                $.ajax({
                    url: element.getAttribute('link'),
                    context: document.body,
                    beforeSend: function() {
                        element.innerHTML = 'WAIT'
                    },
                    success: function () {
                        element.closest('tr').remove();
                    }
                });
            }
        }
    }

    function paramFinder(element) {
        let paramString = url.split('?')[1];
        if (paramString) {
            let params = paramString.split('&');
            for (var i = 0; i < params.length; i++) {
                if (params[i].includes(element.getAttribute('class'))) {
                    return url.replace(params[i], element.getAttribute('class')+'='+element.getAttribute('id'));

                }
            }
        }
        return url+'?sort='+element.getAttribute('id');
    }

    window.onload = function () {


        document.getElementById('cheap').onclick = function () {
            window.location.href = paramFinder(this);
        };

        document.getElementById('expensive').onclick = function () {
            window.location.href = paramFinder(this);
        };


    }

</script>