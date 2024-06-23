<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ConfirmRequest;


class ConfirmController extends Controller
{
    public function index()
    {
        return view('confirm');
    }

    public function confirm(ConfirmRequest $request)
    {
        $contact = $request;

        // $contact = ([
        //     'first_name'=>$request->first_name,
        //     'last_name'=>$request->last_name,
        //     'gender'=>$request->gender,
        //     'email'=>$request->email,
        //     'tell_1'=>$request->tell_1,
        //     'tell_2'=>$request->tell_2,
        //     'tell_3'=>$request->tell_3,
        //     'address'=>$request->address,
        //     'building'=>$request->building,
        //     'detail'=>$request->detail,
        //     'category_id'=>$request->category_id,
        // ]);



        // return view('confirm',[
        //     'contact'=>$contacts,
        // ]);
        $category_id = $request->category_id;
        $category = Category::whereId($category_id)->first();
        // $category = Contact::with('category')->where('category_id','=',$category_id)->first();
        $content = Category::whereId($category_id)->first();
        // dd($category->category_id);
        return view('confirm',compact('contact','category','content'));
    }
    //
}
