<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Contact;

class ContactController extends Controller
{
    public function getList() {
    	$contact = DB::table('contacts')->orderBy('id','DESC')->get();
		return view('admin.contact.list',compact('contact'));	
	}

    public function getDelete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('admin.contact.list')->with(['flash_level'=>'success','flash_message'=>'Delete Order Complete Success!']);
    }
}
