<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Time;

class AppointmentController extends Controller
{

    public function index()
    {
        $appointments = Appointment::with('times')->where('user_id', auth()->user()->id)->get();
        return view('admin.appointment.index', compact('appointments'));
    }


    public function create()
    {
        return view('admin.appointment.create');
    }


    public function store(StoreAppointmentRequest $request)
    {
        $this->insert($request);
        session()->flash('info', __('added...'));
        return redirect()->route('appointments.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $time = Time::with('appointment')->find($id);
        return view('admin.appointment.edit', compact('time'));
    }


    public function update(StoreAppointmentRequest $request, $id)
    {
        $time = Time::with('appointment')->find($id);
        $time->appointment->update([
            'date' => $request->date
        ]);
        $data = $request->except('date');
        $time->update($data);
        session()->flash('success', __('updated..'));
        return redirect()->route('appointments.index');
    }


    public function destroy($id)
    {
        $this->del($id);
        session()->flash('success', __('deleted'));
        return redirect()->route('appointments.index');
    }

    public function del($id)
    {
        $time = Time::with('appointment')->find($id);
        $time->appointment->delete();
        $time->delete();
    }

    public function insert($request)
    {
        $appoint = Appointment::create([
            'user_id' => auth()->user()->id,
            'date' => $request->date,
        ]);
        Time::create([
            'appointment_id' => $appoint->id,
            'from' => $request->from,
            'to' => $request->to,
        ]);
    }
}
