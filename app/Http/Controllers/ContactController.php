<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    //
    public function index()
    {
        $items = session()->get("items");
        session()->forget("items");
        if ($items) {
            return view('index', ['items' => $items]);
        } else {
            return view('index');
        }
    }

    public function post(ContactRequest $request)
    {
        $familyname = $request->familyname;
        $firstname = $request->firstname;
        $gender = $request->gender;
        $email = $request->email;
        $postcode = mb_convert_kana($request->postcode, "na");
        $address = $request->address;
        $building_name = $request->building_name;
        $opinion = $request->opinion;
        $items = [
            'familyname' => $familyname,
            'firstname' => $firstname,
            'gender' => $gender,
            'email' => $email,
            'postcode' => $postcode,
            'address' => $address,
            'building_name' => $building_name,
            'opinion' => $opinion,
        ];
        $request->session()->put("items", $items);
        return view('detail', ['items' => $items]);
    }
    public function get(ContactRequest $request)
    {
        $items = $request->session()->get("items");

        return view('index', ['items' => $items]);
    }

    public function create(ContactRequest $request)
    {
        $familyname = $request->familyname;
        $firstname = $request->firstname;
        $fullname = $familyname . $firstname;
        $gender = $request->gender;
        $email = $request->email;
        $postcode = mb_convert_kana($request->postcode,"na");
        $address = $request->address;
        $building_name = $request->building_name;
        $opinion = $request->opinion;
        $items = [
            'fullname' => $fullname,
            'gender' => $gender,
            'email' => $email,
            'postcode' => $postcode,
            'address' => $address,
            'building_name' => $building_name,
            'opinion' => $opinion,
        ];
        Contact::create($items);
        if (session()->has('items')) {
            session()->forget('items');
        }
        return view('thanks');
    }
    public function admin()
    {
        $search=session()->get("search");
        $contacts = Contact::Paginate(10);
        if($search){
            return view('admin', ['contacts' => $contacts,'search'=>$search]);
        }else{
            return view('admin', ['contacts' => $contacts]);
        }
    }
    public function show(Request $request)
    {
        $name = $request->name;
        $gender = $request->gender;
        $email = $request->email;
        $startdate = $request->startdate;
        $enddate = $request->enddate;

        $query = Contact::query();
            //nameが入力されている
        if ($name) {
            $query->where('fullname', 'LIKE BINARY', "%{$name}%");
        }
            //emailが入力されている
        if ($email) {
            $query->where('email', 'LIKE BINARY', "%{$email}%");
        }
            //startdateが入力されている
        if ($startdate) {
            $query->where('created_at', '>', $startdate);
        }
            //enddateが入力されている
        if ($enddate) {
            $query->where('created_at', '<', $enddate);
        }
                    //性別が「全て」以外
        if ($gender != "all") {
            $query->where('gender', $gender);
        }
        $contacts = $query->Paginate(10);

        $search = [
            'name' => $name,
            'gender' => $gender,
            'email' => $email,
            'startdate' => $startdate,
            'enddate' => $enddate,
        ];
        session()->put("search", $search);
        return view('admin', ['contacts' => $contacts,'search'=>$search]);
    }
    public function reset()
    {
        session()->forget("search");
        $contacts = Contact::Paginate(10);
        return view('admin', ['contacts' => $contacts]);
    }
    public function destroy(Request $request){
        Contact::find($request->id)->delete();
        return redirect('/admin');



    }
}
