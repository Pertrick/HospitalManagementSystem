<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Gender;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function addDoctor()
    {
        $specialties = Specialty::orderBy('specialty', 'asc')->get();
        $genders= Gender::orderBy('id', 'asc')->get();
        return view('admin.addDoctor')->with(['specialties'=>$specialties, 'genders' => $genders]);
    }


    public function saveDoctor(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required',
            'phone' => 'required',
            'room_no' => 'required',
            'specialty' => 'required',
            'gender' => 'required',
            
        ]);

        if( $request->hasFile('image') && $request->file('image')->isValid()) 
        {
         $image = $request->file('image');
 
         $filename = $request->file('image')->getClientOriginalName();
         $path = $request->file('image')->store('public/images');

         $avatar = substr($path, 14); 

         $save = new Doctor();
      
         $save->name = $request->name;
         $save->email = $request->email;
         $save->gender = $request->gender;
         $save->phone = $request->phone;
         $save->room_no = $request->room_no;
         $save->specialty = $request->specialty;
            
         $save->image = $avatar;

         //dd($save);
         
         $save->save();

         if($save->save()){
            return redirect()->route('adddoctor')->withSuccess("Doctor's details added successfully");
        }
        else{
            return redirect()->route('adddoctor')->withFail("Failed to add Doctor's details!");
        }
        
        }

        
    }



   
}
