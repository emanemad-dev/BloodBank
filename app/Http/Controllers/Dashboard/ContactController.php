<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $records = Contact::all();
        return view('Dashboard.Contact.index', compact('records'));
    }

    public function destroy($id)
    {
        $record = Contact::findOrFail($id);
        $record->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
