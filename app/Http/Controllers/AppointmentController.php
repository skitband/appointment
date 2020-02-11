<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Mail\SendgridMail;
use Illuminate\Support\Facades\Auth;
use Validator, DB, SendGrid, Mail;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        if($user->role == 'user'){
            return redirect()->intended('appointment');
        }
        $appointments = Appointment::all();
        return view('admin', compact('appointments'));
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
        $request->except(['submit', '_token', 'q']);
        // dd($request);

        $appointment = Appointment::find($request->detail_appointment_id);

        $appointment->status = $request->detail_appointment_status;
        $appointment->date_time_end = $request->detail_date_time_end;

        $appointment->save();

        // Send Mail for Launcher
        $data = array(
            'customer_name' => $request->detail_client_name,
            'service_name' => $request->detail_service_name,
            'staff_name' => $request->detail_staff_name,
            'date_time' => $request->detail_date_time,
            'note' => $request->detail_note,
            'status' => $request->detail_appointment_status,
        );

        \Mail::to($request->detail_client_email)->send(new SendgridMail($data));

        $message = array('message' => 'Success! Appointment Updated');
        return redirect()->back()->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
