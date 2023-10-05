<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentFormRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AjaxController extends Controller
{

    public function contactsave(ContentFormRequest $request)
    {
        $data = $request->all();
        $data['ip'] = $request->ip();
        Contact::create($data);
        Mail::to('nurcantmr12@gmail.com')->send(new ContactMail($data));
        return back()->with(['message'=>'sent Successfully!']);
    }
}
