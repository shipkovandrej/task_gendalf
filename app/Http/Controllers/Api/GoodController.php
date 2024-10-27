<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function index()
    {
        //$data = Good::with('category')->get();
        $data = Good::get();
        //$name = $data->category->name;
        //$data['category_id'] = $name;
//        foreach ($data as $elem){
//            $elem['category_id'] = $elem->category->name;
//        }

        return $data;
    }

}
