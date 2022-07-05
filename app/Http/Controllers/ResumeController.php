<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Formation;
use App\Models\Summary;
use App\Models\Competence;
use Illuminate\Validation\Rules;

class ResumeController extends Controller
{
    public function getSummary() {

        $data = Summary::all();
        return $data;
    }


    public function summary(Request $request)
    {
        $sum_data = [
            'profil' => $request['profil'],
        ];
      
        $summ = Summary::create($sum_data);

        return response()->json(['message'=>'Summary Added'], 200);
    }

    public function getExperience() {

        $data = Experience::all();
        return $data;
    }

    public function experience(Request $request)
    {
        $exp_data = [
            
            'titre' => $request['titre'],
            'entreprise' => $request['entreprise'],
            'localisation' => $request['localisation'],
            'datedebut' => $request['datedebut'],
            'datefin' => $request['datefin'],
            'description' => $request['description'],
            'user_id' => $request['user_id']
        ];
      
        $exp = Experience::create($exp_data);

        return response()->json(['message'=>'Experience Added'], 200);
    }

    public function getEducation() {

        $data = Formation::all();
        return $data;
    }

    public function education(Request $request)
    {
        $educ_data = [
            'diplome' => $request['diplome'],
            'specialite' => $request['specialite'],
            'institut' => $request['institut'],
            'dated' => $request['dated'],
            'datef' => $request['datef'],
            'user_id' => $request['user_id']

        ];
        $educ = Formation::create($educ_data);

        return response()->json(['message'=>'Education Added'], 200);
    }

    public function getSkills() {

        $data = Competence::all();
        return $data;
    }

    public function skills(Request $request)
    {
        $skill_data = [
            'nom' => $request['nom'],
            'user_id' => $request['user_id']

        ];
      
        $skill = Competence::create($skill_data);

        return response()->json(['message'=>'Skills Added'], 200);
    }

    
}
