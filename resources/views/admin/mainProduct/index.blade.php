@extends('layouts.app')

@section('style')
    <link href="{{ asset('css/admin/adminMainProducts.css') }}" rel="stylesheet">
@endsection

@section('script')
    <script src="{{ asset('js/admin/admin_main.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div id="filter-section" class="container col-md-3">
                <a id="clear-filter" href="{{ route('admin.show.main.products') }}">очистить фильтры</a>
                <form id="filter-form" method="get" action="{{ route('admin.show.main.products') }}">
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
                    <label><input class="form-control"
                                  value="{{ array_key_exists('min_price', $request) ? (($request['min_price']) ? $request['min_price'] : '0') : '0' }}"
                                  type="text" name="min_price"> Мин цена</label><br>
                    <label><input class="form-control"
                                  value="{{ array_key_exists('max_price', $request) ? (($request['max_price']) ? $request['max_price'] : $maxPrice) : $maxPrice }}"
                                  type="text" name="max_price"> Макс цена</label><br>
                    <input class="btn btn-dark" id="assert" type="submit" value="Применить">
                </form>
            </div>
            <div id="cont" class="container col-md-9">
                @if(!$products)
                    <h1>ПО ВАШЕМУ ЗАПРОСУ НИЧЕГО НЕ НАЙДЕНО</h1>
                @else
                    <label>сортировка
                    <select name="" id="">
                        <option {{ isset($request['sort']) ? $request['sort'] == 'expensive' ? 'selected' : '' : '' }} data-type="expensive"
                                class="sort">дорогие
                        </option>
                        <option {{ isset($request['sort']) ? $request['sort'] == 'cheap' ? 'selected' : '' : '' }} data-type="cheap" class="sort">
                            дешевые
                        </option>
                        <option {{ isset($request['sort']) ? $request['sort'] == 'title' ? 'selected' : '' : '' }} data-type="title" class="sort">
                            название
                        </option>
                        <option {{ isset($request['sort']) ? $request['sort'] == 'newest' ? 'selected' : '' : 'selected' }} data-type="newest" class="sort">
                            сначала новые
                        </option>
                        <option {{ isset($request['sort']) ? $request['sort'] == 'oldest' ? 'selected' : '' : ''}} data-type="oldest" class="sort">
                            сначала старые
                        </option>
                    </select></label>
                    <table id="product-list">
                        <tr>
                            <th>Title</th>
                            <th>price</th>
                            <th>brand</th>
                            <th>type</th>
                            <th>edit</th>
                            <th>delete</th>
                            <th>images</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <th>{{ $product['title'] }}</th>
                                <th>{{ $product['price'] }}</th>
                                <th>{{ $product['brand']['title'] }}</th>
                                <th>{{ $product['type']['multiple'] }}</th>
                                <th><a href="{{ route('admin.edit.main.product', $product['id']) }}">Edit</a></th>
                                <th><a class="delete-product" data-type="{{ $product['id'] }}"
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
