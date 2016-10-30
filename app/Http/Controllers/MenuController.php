<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use JavaScript;
use App\Menu;
use App\Dish;

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
//            return view('menus.create');
            return view('menus.create-02');
        }
        
        if($req->method() == 'POST'){
            $menuInfo = $req->get('menu');

            $menu = new Menu([
                'date' => $menuInfo['date']
            ]);
            $menu->save();

            $dishCollection = collect($menuInfo['dishes']);
            $dishIds = $dishCollection->pluck('id');
            $attachInfo = $menu->dishes()->attach($dishIds->toArray());

            return $attachInfo;
        }
    }
}
