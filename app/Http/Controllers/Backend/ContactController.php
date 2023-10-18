<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $messages = Contact::all();
        return view('backend.pages.contact.index',compact('messages'));
    }
}
