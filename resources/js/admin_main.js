import 'bootstrap';
import axios from 'axios';

let url = document.URL;
const background = document.createElement('div');
background.setAttribute('style', 'height:100%;width:100%;background-color:rgba(53,53,53,0.49);position:absolute;top:0');
background.setAttribute('id', 'bg');

// $('select').on('change', function () {
//     let type = $(this).find('option:selected').data('type');
//     let paramString = url.split('?')[1];
//     let addedString = 'sort=' + type;
//     if (paramString) {
//         let params = paramString.split('&');
//         for (let i = 0; i < params.length; i++) {
//             if (params[i].includes('sort')) {
//                 return window.location.href = url.replace(params[i], addedString);
//             }
//         }
//         return window.location.href = url + '&' + addedString;
//     }
//     return window.location.href = url + '?' + addedString;
// });

$('select').on('change', function () {
    let sort = $(this).find('option:selected').data('type');
    let types = getTypeFilter();
    let brands = getBrandFilter();
    getProducts(brands, types, sort);
});

function getBrandFilter() {
    let brands = [];
    $(':checkbox').each(function () {
        if (this.getAttribute('checked')) {
            if (this.getAttribute('name') === 'brand[]') {
                brands.push(this.getAttribute('value'));
            }
        }
    });
    return brands;
}

function getTypeFilter() {
    let types = [];
    $(':checkbox').each(function () {
        if (this.getAttribute('checked')) {
            if (this.getAttribute('name') === 'type[]') {
                types.push(Number(this.getAttribute('value')));
            }
        }
    });
    return types;
}

$('.filter').change(function () {
    if (this.getAttribute('checked')) {
        this.removeAttribute('checked');
    }
    else {
        this.setAttribute('checked', 'checked');
    }
    let brands = getBrandFilter();
    let types = getTypeFilter();
    let sort = $('select').find('option:selected').data('type');
    getProducts(brands, types, sort);
});

/**
 *
 * @param brands
 * @param types
 * @param sort
 */
function getProducts(brands, types, sort) {
    axios.post('main_products/axio', {brand: brands, type: types, sort: sort})
        .then((response) => {
            makeTable(response.data);
        });
}

function makeTable(data) {
    document.body.appendChild(background);
    setTimeout(function () {
        $('#product-list').find('tr:gt(0)').remove();
        data.forEach(function (item) {
            $('#product-list').append('<tbody><tr>' +
                '<th>' + item['title'] + '</th>' +
                '<th>' + item['price'] + '</th>' +
                '<th>' + item['brand']['title'] + '</th>' +
                '<th>' + item['type']['multiple'] + '</th>' +
                '<th><a href="main_products/edit/' + item['id'] + '">Edit</a></th>' +
                '<th><a data-type="' + item['id'] + '" href="main_products/delete/' + item['id'] + '" class="delete-product">Delete</a></th>' +
                '</tbody></tr>');
        });
        document.body.removeChild(background);
    }, 1000);
}

$(document).on('click', '.delete-product', function () {
    event.preventDefault();
    const productId = this.getAttribute('data-type');
    if (productId && confirm('you sure?')) {
        axios.post(this.getAttribute('href'), {productId: productId})
            .then(
                (response) => {
                    console.log(response.data);
                        makeTable(response.data);
                },
                () => {
                    alert('There are some errors');
                }).catch(
            () => {
                alert('There are some errors');
            });
    }
});
