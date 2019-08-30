<?php

namespace App\Http\Controllers;

use App\Category;

class ParserController extends Controller
{
    public function getCatalog(){
        $strs=\App::make('App\Parser\Onliner')->catalog();

    }
public function getAll(){
        $all=Category::all();
        return view('category',compact('all'));

}
public function getOne($id=null){
    $obj=Category::find($id);
    $strs=\App::make('App\Parser\Onliner')->getParse($obj->slug,$id);
    echo $strs;

}
}
