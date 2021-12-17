<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Specialty;
use App\Models\Gender;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;

use Notification;

use App\Notifications\SendEmailNotification;
//use App\Notifications\SendEmailNotify;

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
    
                $appointments = Appointment::latest()->get();
    
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
    
                $doctor = Doctor::find($id);
    
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


        public function updateDoctor(Request $request, $id)
        {
        
            $doctor = Doctor::find($id);

            
    
             if(isset($request->name) ? $doctor->name = $request->name : $doctor->name= $doctor->name);
             if(isset($request->email)? $doctor->email = $request->email : $doctor->email= $doctor->email);
             if(isset($request->gender)? $doctor->gender = $request->gender : $doctor->gender= $doctor->gender);
             if(isset($request->phone)? $doctor->phone = $request->phone : $doctor->phone= $doctor->phone);
             
             if(isset($request->room_no)? $doctor->room_no = $request->room_no : $doctor->room_no= $doctor->room_no);
             
             if(isset($request->specialty)? $doctor->specialty_id = $request->specialty : $doctor->specialty_id= $doctor->specialty_id);
             
               // dd($doctor);
            

             if( $request->hasFile('image') && $request->file('image')->isValid()) 
             {
              $image = $request->file('image');
      
              $filename = $request->file('image')->getClientOriginalName();
              $path = $request->file('image')->store('public/doctors/images');
     
              $avatar = substr($path, 22); 
             $doctor->image = $avatar;

             }else{

                $doctor->image = $doctor->image;
             }
    
             //dd($doctor);
             
             $doctor->update();
    
             if($doctor->update()){
                return redirect()->back()->with('message', "Doctor's details Updated successfully");
            }
            else{
                return redirect()->back()->with('message', "Failed to update Doctor's details!");
            }
            
            
        }



    public function viewMail($id)
    {
        $appointment = Appointment::find($id);
        return view('admin.emailview', compact('appointment'));

    } 


    public function sendMail(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        $details = [

            'greeting' => $request->greeting,

            'body' => $request->body,

            'actiontext' => $request->actiontext,

            'actionurl' =>  $request->actionurl,

            'endpart' => $request->endpart,

        ];

        Notification::send( $appointment, new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Email Notification Sent Successsfully!');

    } 


   
}
