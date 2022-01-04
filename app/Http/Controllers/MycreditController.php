<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Mycredit;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MycreditController extends Controller
{
    public function index()
    {
        $contacts =  Contact::where('type_contact',1)->get();

        return Inertia::render('Mycredit')->with([
            'contacts' => $contacts
        ]);
    }

    public function delete(Request $request)
    {
        
        Mycredit::find($request->id)->delete();

        return Redirect::back();
    }


public function store(Request $request,$id)
{
    $credit             = new Mycredit;
    $credit->title      = $request->title;
    $credit->price      = $request->price;
    $credit->contact_id = $id;
    $credit->save();

    return Redirect::back();

}
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'tel' => ['required','string'],
        ]);

        $contact               = new Contact;
        $contact->name         = $request->name;
        $contact->email        = $request->email;
        $contact->tel          = $request->tel;
        $contact->type_contact = 1;
        $contact->user_id      = Auth::user()->id;
        $contact->save();

        return Redirect::route('my_credit')->with('success','Your Contact Add successufly');


    }

    public function show($id)
    {
        $credits  = Mycredit::where('contact_id',$id)->with('contact')->paginate(5);

        $total_credit  = Mycredit::where('contact_id',$id)->sum('price');

        $contacts =  Contact::where('type_contact',1)->get();

        return Inertia::render('ShowCredit')->with([
            'contacts' => $contacts,
            'credits' => $credits,
            'cuurent_contact' => $id,
            'total_credit' => $total_credit
        ]);

       

        
    }
}
