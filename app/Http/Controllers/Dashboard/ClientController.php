<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $records = Client::all();
        return view('Dashboard.Client.index', compact('records'));
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect('clients')->with('success', 'Client deleted successfully.');
    }

    public function activate($id)
    {
        $client = Client::findOrFail($id);
        $client->is_active = true;
        $client->save();

        return redirect()->back()->with('success', 'Client activated successfully.');
    }

    public function deactivate($id)
    {
        $client = Client::findOrFail($id);
        $client->is_active = false;
        $client->save();

        return redirect()->back()->with('success', 'Client deactivated successfully.');
    }
}
