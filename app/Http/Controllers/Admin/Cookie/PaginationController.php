<?php

namespace App\Http\Controllers\Admin\Cookie;

use App\Services\PaginationValues\PaginationValues;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class PaginationController extends Controller
{

    /**
     * Handle the incoming request.
     * @param  \Illuminate\Http\Request $request
     * @param string $val
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, string $val)
    {
        foreach (PaginationValues::PAGINATION_VALUES as $value) {
            if ($val === md5($value)) {
                $val = $value;
                break;
            }
        }
        $smsh = explode('?', $request->session()->get('_previous')['url']);
        Cookie::queue(Cookie::make(md5($smsh['0'].'pagination'), $val));
        return redirect($smsh['0'].'?page=1');
    }

}
