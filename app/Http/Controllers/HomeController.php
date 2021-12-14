<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{

    public function index(){

        if(Auth::id())
        {
            return redirect()->route('redirectohome');
        }

        else{
            $doctors = Doctor::latest()->take(6)->get();

            return view('user.home', ['doctors' => $doctors]);
        }
    }
    
    public function redirectToHome()
    {
        $doctors = Doctor::latest()->take(6)->get();

        if(Auth::id()){
            if(Auth::user()->userRole== '1')
            {
                return view('user.home', ['doctors' => $doctors]);
            }else if(Auth::user()->userRole== '2'){
                return view('user.home', ['doctors' => $doctors]);
            }else{
                return view('admin.home');
            }

        }else{
            return redirect()->back();
        }

    }

    public function appointment(Request $request)
    {
        if(Auth::id()){

        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'email| required',
            'date' => 'required|date',
            'specialist' => 'required',
            'phone' => 'required',
            'message' => 'required',

        ]);

        $appointment = new Appointment;

        $appointment->full_name = $request->full_name;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->specialist = $request->specialist;
        $appointment->message = $request->message;
        $appointment->user_id = Auth::user()->id; //or Auth::id()
        $appointment->status = 'In Progress';

        //dd($appointment);

        $appointment->save();

        if($appointment->save()){
           return redirect()->back()->with('message', 'Appointment request successful. We will contact you soon!');;
        }

    }else{
        return redirect('login')->with('message', 'Login to make an appointment');
    }


    }

    public function showAllDoctors()
    {
        $doctors = Doctor::all();

        return view('user.showalldoctors', ['doctors' => $doctors]);


    }




    public function showAppointment()
    {
        
        if(Auth::id()){
            $sn = 1;
            $user_id = Auth::user()->id;

            $appointments = Appointment::where('user_id', $user_id)->get();

            return view('user.showappointment', ['appointments' => $appointments, 'sn' => $sn]);
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
            $appointment->delete();

            return redirect()->back()->with('message', 'Appointment cancelled Successfully!');;
        }

        else{
            return redirect()->back()->with('message', 'Failed to cancel Appointment!');
        }

    }
}
