<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('contact',compact('categories'));
    }

    public function store(Request $request)
    {
        if($request->input('back') == 'back')
        {
            return redirect('/')->withInput();
        }else{
        $contact = new Contact;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->gender = $request->gender;
        $contact->email = $request->email;
        $contact->tell = $request->tell_1.$request->tell_2.$request->tell_3;
        $contact->address = $request->address;
        $contact->building = $request->building;
        $contact->detail = $request->detail;
        $contact->category_id = $request->category_id;
        $contact->save();
        }
        return redirect('/thanks');
    }


    //
}
