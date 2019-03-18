import 'bootstrap';
import axios from 'axios';

let url = document.URL;

$('select').on('change', function() {
    let type = $(this).find('option:selected').data('type');
    let paramString = url.split('?')[1];
    let addedString = 'sort=' + type;
    axios.post('', {}).then((response) => {

    });
    if (paramString) {
        let params = paramString.split('&');
        for (let i = 0; i < params.length; i++) {
            if (params[i].includes('sort')) {
                return window.location.href = url.replace(params[i], addedString);
            }
        }
        return window.location.href = url + '&' + addedString;
    }
    return window.location.href = url + '?' + addedString;
});