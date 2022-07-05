<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function reclamation(Request $request)
    {
        $rec_data = [
            'sujet' => $request['sujet'],
            'contenu' => $request['contenu'],
        ];
      
        $rec = Reclamation::create($rec_data);

        return response()->json(['message'=>'Reclamation Send'], 200);
    }
}
