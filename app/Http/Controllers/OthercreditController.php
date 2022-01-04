<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Contact;
use App\Models\Othercredit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OthercreditController extends Controller
{
    public function index()
    {
        $contacts =  Contact::where('type_contact',2)->get();

        return Inertia::render('OtherCredit')->with([
            'contacts' => $contacts
        ]);
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
        $contact->type_contact = 2;
        $contact->user_id      = Auth::user()->id;
        $contact->save();

        return Redirect::back()->with('success','Your Contact Add successufly');

    }

    public function show($id)
    {
        $credits        = Othercredit::where('contact_id',$id)->with('contact')->paginate(2);

        $total_credit   = Othercredit::where('contact_id',$id)->sum('price');

        $contacts       =  Contact::where('type_contact',2)->get();

        return Inertia::render('ShowOtherCredit')->with([
            'contacts' => $contacts,
            'credits' => $credits,
            'cuurent_contact' => $id,
            'total_credit' => $total_credit
        ]);
  
    }

    public function store(Request $request,$id)
{
    $credit             = new Othercredit;
    $credit->title      = $request->title;
    $credit->price      = $request->price;
    $credit->contact_id = $id;
    $credit->save();

    return Redirect::back();

}

    public function delete(Request $request)
    {
        
        Othercredit::find($request->id)->delete();

        return Redirect::back();
    }
}
