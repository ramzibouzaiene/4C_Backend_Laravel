<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;


class ProfileController extends Controller
{
    public function change_password(Request $request){
        
        $validator = Validator::make($request->all(), [
            'old_password'=>'required',
            'password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:password'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validations fails',
                'errors'=>$validator->errors()
            ],422);
        }

        $user=$request->user();
        if(Hash::check($request->old_password,$user->password)){
            $user->update([
                'password'=>Hash::make($request->password)
            ]);
            return response()->json([
                'message'=>'Password successfully updated',
            ],200);
        }else{
            return response()->json([
                'message'=>'Old password does not matched',
            ],400);
        }
    
    }
    


    public function updateProfile(Request $request, $id){

    $user=User::find($id);
    
      $validator = Validator::make($request->all(), [
         'name' => 'nullable',
         'lastname' => 'nullable',
         'tel' => 'nullable',
         'adresse' => 'nullable',
         'date_nes' => 'nullable',
         'linkedin' => 'nullable',
         'facebook' => 'nullable',
         'instagram' => 'nullable',
         'github' => 'nullable',
         'grade' => 'nullable',
         'specialite' => 'nullable',
         'statut' => 'nullable',
         
      ]);

      if ($validator->fails()) {
            return response()->json([
                'message'=>'Validations fails',
                'errors'=>$validator->errors()
            ],422);
        }

        $user->update([
            'name'=>@$request->name,
            'lastname'=>@$request->lastname,
            'tel'=>@$request->tel,
            'adresse'=>@$request->adresse,
            'date_nes'=>@$request->date_nes,
            'linkedin'=>@$request->linkedin,
            'facebook'=>@$request->facebook,
            'instagram'=>@$request->instagram,
            'grade'=>@$request->grade,
            'specialite'=>@$request->specialite,
            'statut'=>@$request->statut,
        ]);
        $user->save();

        return response()->json([
            'message'=>'Profile successfully updated',
        ],200);
   }

   public function updateAvatar(Request $request, $id){

    $user=User::find($id);

    $validator = Validator::make($request->all(), [
            'avatar'=>'nullable|image|mimes:jpg,bmp,png'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validations fails',
                'errors'=>$validator->errors()
            ],422);
        } 

        $user=$request->user();

        if($request->hasFile('avatar')){
            if($user->avatar){
                $old_path=public_path().'/storage/users/'.$user->avatar;
                if(File::exists($old_path)){
                    File::delete($old_path);
                }
            }

            $image_name='avatar-'.time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('/storage/users'),$image_name);
        }else{
            $image_name=$user->avatar;
        }


        $user->update([
            'avatar'=>$image_name
        ]);

        return response()->json([
            'message'=>'Profile photo successfully updated',
        ],200);
    
   }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
