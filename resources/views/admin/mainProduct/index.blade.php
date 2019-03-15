@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="container col-md-3">
                <form method="get" action="{{ route('admin.show.main.products') }}">
                <p>brand</p>
                <ul>
                    @foreach($brands as $brand)
                        <label><input class="filter"
                                      {{ array_key_exists('brand', $request) ? (in_array(strval($brand['id']), $request['brand']) || $request['brand'] == $brand['id'] ? ('checked=checked') : '') : ''}} name="brand[]"
                                      type="checkbox" value="{{ $brand['id'] }}">{{ $brand['title'] }}
                        </label><br>
                    @endforeach
                </ul>
                <p>types</p>
                <ul>
                    @foreach($types as $type)
                        <label><input class="filter"
                                      {{ array_key_exists('type', $request) ? (in_array(strval($type['id']), $request['type']) || $request['type'] == $type['id'] ? ('checked=checked') : '') : ''}} name="type[]"
                                      type="checkbox" value="{{ $type['id'] }}">{{ $type['multiple'] }}
                        </label><br>
                    @endforeach
                </ul>
                    <label><input class="form-control" value="{{ array_key_exists('min_price', $request) ? (($request['min_price']) ? $request['min_price'] : '0') : '0' }}" type="text" name="min_price"> Мин цена</label><br>
                    <label><input class="form-control" value="{{ array_key_exists('max_price', $request) ? (($request['max_price']) ? $request['max_price'] : $maxPrice) : $maxPrice }}" type="text" name="max_price"> Макс цена</label><br>
                <input class="btn btn-dark" id="assert" type="submit" value="Применить">
                </form>
            </div>
            <div id="cont" class="container col-md-9">
                @if(!$products)
                    <h1>ПО ВАШЕМУ ЗАПРОСУ НИЧЕГО НЕ НАЙДЕНО</h1>
                @else
                    <a onclick="sorter(this)" id="expensive" class="sort" href="#">дорогие</a>
                    <a onclick="sorter(this)" id="cheap" class="sort" href="#">дешевые</a>
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
                                <th>{{ $product['title'] }}</th>
                                <th>{{ $product['price'] }}</th>
                                <th>{{ $product['brand_id'] }}</th>
                                <th>{{ $product['type_id'] }}</th>
                                <th><a href="{{ route('admin.edit.main.product', $product['id']) }}">Edit</a></th>
                                <th><a onclick="deleteProduct(this)" value="{{ $product['id'] }}" id="delete"
                                       href="{{ route('admin.delete.main.product', $product['id']) }}">Delete</a></th>
                            </tr>
                        @endforeach
                    </table>
                @endif
                {{ $links }}
                <a href="{{ route('admin.create.main.product') }}"><input class="btn btn-primary" type="button"
                                                                          value="Создать"></a>
            </div>
        </div>
    </div>
@endsection


<script type="text/javascript">
    var url = document.URL;

    function answer(element) {
        if (confirm('you sure?')) {
            window.location.href = element.getAttribute('link');
        }
    }

    function deleteProduct(element) {
        event.preventDefault();
        let productId = element.getAttribute('value');
        if (productId) {
            if (confirm('you sure?')) {
                $.ajax({
                    url: element.getAttribute('href'),
                    context: document.body,
                    beforeSend: function () {
                        element.closest('tr');
                    },
                    success: function () {
                        element.closest('tr').remove();
                    }
                });
            }
        }
    }

    function sorter(element) {
        event.preventDefault();
        let getParam = element.getAttribute('class');
        let paramString = url.split('?')[1];
        let addedString = getParam + '=' + element.getAttribute('id');
        if (paramString) {
            let params = paramString.split('&');
            for (var i = 0; i < params.length; i++) {
                if (params[i].includes(getParam)) {
                    return window.location.href = url.replace(params[i], addedString);
                }
            }
            console.log(params);
            return window.location.href = url + '&' + addedString;
        }
        return window.location.href = url + '?' + addedString;
    }

</script>