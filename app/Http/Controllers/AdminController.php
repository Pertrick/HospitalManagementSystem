<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Specialty;
use App\Models\Gender;
use App\Models\Doctor;
use App\Models\Appointment;

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
         $path = $request->file('image')->store('public/doctors/images');

         $avatar = substr($path, 22); 

         $save = new Doctor();
      
         $save->name = $request->name;
         $save->email = $request->email;
         $save->gender = $request->gender;
         $save->phone = $request->phone;
         $save->room_no = $request->room_no;
         $save->specialty_id = $request->specialty;
            
         $save->image = $avatar;

         //dd($save);
         
         $save->save();

         if($save->save()){
            return redirect()->route('adddoctor')->with('message', "Doctor's details added successfully");
        }
        else{
            return redirect()->route('adddoctor')->with('message', "Failed to add Doctor's details!");
        }
        
        }
    }

        public function showAppointments(){
            
            if(Auth::id()){
                $sn = 1;
    
                $appointments = Appointment::all();
    
                return view('admin.showappointments', ['appointments' => $appointments, 'sn' => $sn]);
            }
    
            else{
                return redirect()->back();
            }
        }

    
        public function cancelAppointment($id)
        {
            
            if(Auth::id()){
                $sn = 1;
                $user_id = Auth::user()->id;
    
                $appointment = Appointment::find($id);
                $appointment->status = "Cancelled";

                $appointment->save();
    
                return redirect()->back()->with('message', 'Appointment cancelled Successfully!');;
            }
    
            else{
                return redirect()->back()->with('message', 'Failed to cancel Appointment!');
            }
    
        }

        public function approveAppointment($id)
        {
            
            if(Auth::id()){
                $sn = 1;
                $user_id = Auth::user()->id;
    
                $appointment = Appointment::find($id);
                $appointment->status = "Approved";

                $appointment->save();
    
                return redirect()->back()->with('message', 'Appointment approved Successfully!');;
            }
    
            else{
                return redirect()->back()->with('message', 'Failed to Approve Appointment!');
            }
    
        }


        public function showDoctors(){
            
            if(Auth::id()){
                $sn = 1;
    
                $doctors = Doctor::all();
    
                return view('admin.showdoctors', ['doctors' => $doctors, 'sn' => $sn]);
            }
    
            else{
                return redirect()->back();
            }
        }


        public function editDoctor($id)
        {
            
            if(Auth::id()){
                $sn = 1;
                $doctor_id= Appointment::find($id);
    
                $doctor = Doctor::where('id', $doctor_id)->get();
    
                return view('admin.editdoctor', ['doctor' => $doctor, 'sn' => $sn]);
            }
    
            else{
                return redirect()->back();
            }
    
        }
    
        public function deleteDoctor($id)
        {
            
            if(Auth::id()){
                $sn = 1;
               
    
                $appointment = Doctor::find($id);
                $appointment->delete();
    
                return redirect()->back()->with('message', "Doctor's Account Deleted Successfully!");;
            }
    
            else{
                return redirect()->back()->with('message', "Failed to delete doctor's Account!");
            }
    
        }


   
}
