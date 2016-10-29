<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use JavaScript;

class MenuController extends Controller
{
    /**
     * CREATE aimed for admin to manage menus in week
     * update info, dish,... for user>order
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $req){
        if($req->method() == 'GET'){
            $stores = Store::with('dishes')->get();

            JavaScript::put([
                'stores' => $stores
            ]);
            
//            return view('menus.create')->with(compact('stores'));
            return view('menus.create');
        }
        
        if($req->method() == 'POST'){
            
        }
    }
}
