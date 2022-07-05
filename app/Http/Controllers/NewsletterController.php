<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{

    public function newsletter(Request $request)
    {
        $newsletter_data = [
            'email' => $request['email'],
        ];
      
        $newsletter = Newsletter::create($newsletter_data);

        return response()->json(['message'=>'Newsletter Send'], 200);
    }

}
