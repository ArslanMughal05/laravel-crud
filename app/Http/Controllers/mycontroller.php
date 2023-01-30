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

    function updateordelete(Request $req)
    {
        $id = $req->get('id');
        $name = $req->get('name');
        $price = $req->get('price');

        if($req->get('update') == 'Update')
        {
            return view('updateview', ['pid'=>$id, 'pname'=> $name, 'pprice' =>$price]);
        }
        else
        {
          $pro = product::find($id);
          $pro->delete();
        }

         return  redirect('/');
    }

    function update(Request $req)
    {
        $ID = $req->get('id');
        $Name = $req->get('name');
        $Price = $req->get('price');
        $pro = product::find($ID);
        $pro->PName = $Name;
        $pro->PPrice = $Price;
        $pro->save();
        return redirect('/');

    }

}
