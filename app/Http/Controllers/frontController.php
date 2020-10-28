<?php

namespace App\Http\Controllers;


use App\{Appointment, Booking, Time, User};
use Illuminate\Http\Request;
use App\Mail\AppointmentMail;
class frontController extends Controller
{

    public function index()
    {
        date_default_timezone_set('Africa/Cairo');
        if (request('date')) {
            $doctors = $this->findDoctorByDate(request('date'));
            return view('welcome', compact('doctors'));
        }

        $doctors = Appointment::with('doctor')->where('date', date('Y-m-d'))->get();
        return view('welcome', compact('doctors'));
    }

    public function show($appointment_id, $doctor_id, $date)
    {
        $doctor = User::where('id', $doctor_id)->first();
        $time = Time::where('appointment_id', $appointment_id)->first();
        return view('appointment', compact('doctor', 'time', 'date'));
    }

    public function findDoctorByDate($date)
    {
        $doctors = Appointment::with('doctor')->where('date', $date)->get();
        return $doctors;
    }

    public function store(Request $request)
    {
        if ($this->check()) {
            session()->flash('error', __('no allowed'));
            return redirect()->route('front.index');
        }

        Booking::create([
            'user_id' => auth()->user()->id,
            'doctor_id' => $request->doctorId,
            'time' => $request->time,
            'date' => $request->date,
            'status' => 0,
        ]);
        Time::where('appointment_id', $request->appointmentId)
            ->where('from', $request->time)
            ->orWhere('to', $request->time)->update([
                'status' => 1
            ]);
        $doctor = User::where('id',$request->doctorId)->first();
        $data = [
            'name' => auth()->user()->name,
            'time' => $request->time,
            'date' => $request->date,
            'doctorname' => $doctor->name
        ];
        try {
            \Mail::to(auth()->user()->email)->send(new AppointmentMail($data));
        }catch (\Exception $e){

        }
        return redirect()->route('front.index');
    }

    public function check()
    {
        return Booking::orderBy('id', 'desc')
            ->where('user_id', auth()->user()->id)
            ->whereDate('created_at', date('Y-m-d'))
            ->exists();
    }

}
