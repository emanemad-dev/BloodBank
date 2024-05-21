<?php

namespace App\Http\Controllers\Front;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SendMessegeController extends Controller
{
    public function storeMessege(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'messege' => 'required|string',
        ]);

        $contact = Contact::create($request->all());

        return redirect()->back()->with('success', 'تم إرسال الرسالة بنجاح!');
    }

}
