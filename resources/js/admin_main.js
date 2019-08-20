// import 'bootstrap';
import axios from 'axios';

let url = document.URL;
const background = document.createElement('div');
background.setAttribute('style', 'height:100%;width:100%;background-color:rgba(53,53,53,0.49);position:absolute;top:0');
background.setAttribute('id', 'bg');

let brands = [];
let types = [];
let sort = null;
let minPrice = null;
let maxPrice = null;

let funcIsFinished;

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

function getBrandFilter() {
    brands = [];
    $(':checkbox').each(function () {
        if (this.getAttribute('checked')) {
            if (this.getAttribute('name') === 'brand[]') {
                brands.push(this.getAttribute('value'));
            }
        }
    });
    return brands;
}

function setValues() {
    sort = getSorting();
    types = getTypeFilter();
    brands = getBrandFilter();
    maxPrice = getMaxPrice();
    minPrice = getMinPrice();
}

function updateTable() {
    document.body.appendChild(background);
    setValues();
    getProducts(brands, types, sort, minPrice, maxPrice);
    let stop = setInterval(function () {
        if (funcIsFinished) {
            document.body.removeChild(background);
            clearInterval(stop);
        }
    }, 100);
}

function getTypeFilter() {
    types = [];
    $(':checkbox').each(function () {
        if (this.getAttribute('checked')) {
            if (this.getAttribute('name') === 'type[]') {
                types.push(Number(this.getAttribute('value')));
            }
        }
    });
    return types;
}

function getMinPrice() {
    return $('#min_price').val();
}

function getMaxPrice() {
    return $('#max_price').val();
}


function getSorting() {
    return $('select').find('option:selected').data('type');
}

/**
 *
 * @param brands
 * @param types
 * @param sort
 * @param minPrice
 * @param maxPrice
 */
function getProducts(brands = [], types = [], sort = null, minPrice = null, maxPrice = null) {
    funcIsFinished = false;
    return axios.post('main_products/axio', {
        brand: brands,
        type: types,
        sort: sort,
        min_price: minPrice,
        max_price: maxPrice
    })
        .then((response) => {
            makeTable(response.data);
            funcIsFinished = true;
        });
}

/**
 *
 * @param data
 */
function makeTable(data) {
    $('#product-list').find('tr:gt(0)').remove();
    data.forEach(function (item) {
        $('#product-list').append('<tr>' +
            '<th>' + item['title'] + '</th>' +
            '<th>' + item['price'] + '</th>' +
            '<th>' + item['brand']['title'] + '</th>' +
            '<th>' + item['type']['multiple'] + '</th>' +
            '<th><a href="main_products/edit/' + item['id'] + '">Edit</a></th>' +
            '<th><a data-type="' + item['id'] + '" href="main_products/delete" class="delete-product">Delete</a></th>' +
            '</tr>');
    });
}

$(document).on('click', '.delete-product', function () {
    funcIsFinished = false;
    event.preventDefault();
    setValues();
    const productId = this.getAttribute('data-type');
    if (productId && confirm('you sure?')) {
        axios.post('main_products/delete', {productId: productId})
            .then(
                (response) => {
                    makeTable(response.data);
                    funcIsFinished = true;
                },
                () => {
                    alert('There are some errors');
                })
            .catch(
                () => {
                    alert('There are some errors');
                });
    }
});

$('#assert').on('click', function () {
    event.preventDefault();
    document.body.appendChild(background);
    updateTable();
});

$('.filter').change(function () {
    if (this.getAttribute('checked')) {
        this.removeAttribute('checked');
    }
    else {
        this.setAttribute('checked', 'checked');
    }
    updateTable();
});

$('select').on('change', function () {
    document.body.appendChild(background);
    updateTable();
});
