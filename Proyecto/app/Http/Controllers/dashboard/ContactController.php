<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Contact;
use App\Models\ContactImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rol.admin');
    }

    public function index()
    {
        $contacts = Contact::orderBy('created_at','desc')->paginate(4);

        return view("dashboard.contact.index",['contacts'=> $contacts]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //$contact = Contact::findOrFail($id);

        return view("dashboard.contact.show",["contact"=>$contact]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('status','Contact deleted successfully');
    }
}
