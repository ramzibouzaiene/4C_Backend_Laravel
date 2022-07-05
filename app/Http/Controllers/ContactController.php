<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $contact_data = [
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'email' => $request['email'],
            'sujet' => $request['sujet'],
            'message' => $request['message'],
        ];
      
        $contact = Contact::create($contact_data);

        return response()->json(['message'=>'Contact Send'], 200);
    }
}
