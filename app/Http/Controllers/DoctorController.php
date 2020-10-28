<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Role;
use App\User;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = User::with('role')->where('role_id', '!=', 3)->get();
        return view('admin.doctors.index', compact('doctors'));
    }


    public function create()
    {
        $roles = Role::where('name', '!=', 'patient')->get();
        return view('admin.doctors.create', compact('roles'));
    }


    public function store(StoreDoctorRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        if ($request->hasFile('image')) {
            // helper function that store the image by role
            $data['image'] = storeMyImage($request->file('image'), $data['role_id']);
        }
        User::create($data);
        session()->flash('info', __('saved'));
        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show";
    }


    public function edit($id)
    {
        $doctor = User::find($id);
        $roles = Role::where('name', '!=', 'patient')->get();
        return view('admin.doctors.edit', compact('doctor', 'roles'));
    }


    public function update(StoreDoctorRequest $request, $id)
    {
        $doctor = User::find($id);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        if ($request->hasFile('image')) {
            deleteImg($doctor->image);
            $data['image'] = storeMyImage($request->file('image'), $data['role_id']);
        }
        $doctor->update($data);
        session()->flash('info', __('updated...'));
        return redirect()->route('doctors.index');
    }

    public function destroy($id)
    {
        if ($id == auth()->user()->id) {
            abort(404);
        }

        $doctor = User::find($id);
        if (isset($doctor->image)) {
            deleteImg($doctor->image);
        }
        $doctor->delete();
        session()->flash('info', __('deleted'));
        return redirect()->route('doctors.index');
    }
}
