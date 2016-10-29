<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            return view();
        }
        
        if($req->method() == 'POST'){
            
        }
    }
}
