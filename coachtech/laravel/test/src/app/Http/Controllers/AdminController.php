<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->paginate(7);

        return view('admin',compact('contacts','categories'));

    }

    public function csv(Request $request)
    {
        $contacts = Contact::with('category')->paginate(7);

        $head = ['id','category_id','first_name','last_name','gender','email','tell','address','building','detail','created_at','updated_at'];

        $temps = [];
        array_push($temps,$head);

        foreach($contacts as $contact){
            $temp = [
                $contact->id,
                $contact->category_id,
                $contact->first_name,
                $contact->last_name,
                $contact->gender,
                $contact->email,
                $contact->tell,
                $contact->address,
                $contact->building,
                $contact->detail,
                $contact->created_at,
                $contact->updated_at
            ];
            array_push($temps,$temp);
        }

        $f = fopen('csv','r+b');
        foreach($temps as $temp){
            fputcsv($f,$temp);
        }

        rewind($f);
        $csv = str_replace(PHP_EOL,"\r\n",stream_get_contents($f));
        $csv = mb_convert_encoding($csv,'SJIS-win','UTF-8');
        $now = new Carbon();
        $filename = "ユーザー一覧(全件:" . $now->format('Y年m月d日'). ").csv";
        $headers = array(
            'Content-Type'=>'text/csv','Content-Disposition'=>'attachment; filename'.$filename,
        );

        $categories = Category::all();

        return Response::make($csv,200,$headers);

    }
    //
}

