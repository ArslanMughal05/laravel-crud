<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;  

class mycontroller extends Controller
{
    //

    function insert(Request $req)
    {
        $name =  $req->get('pname'); 
        $price =  $req->get('pprice'); 
        $pimage =   $req->file('image') ->getClientOriginalName();
        //moving upload file
        $req->image->move(public_path('images'), $pimage);

        $pro = new product();
        $pro->PName = $name;
        $pro->PPrice = $price;
        $pro->PImage = $pimage;
        $pro->save();

        return redirect('/');

    }

    function readdata()
    {
        $pdata = product::all();
        return view('insertRead' , ['data'=>$pdata]);
    }

}
