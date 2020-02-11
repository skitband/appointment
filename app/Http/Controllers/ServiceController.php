<?php

namespace App\Http\Controllers;

use App\Service;
use App\Employee;
use App\Appointment;
use Illuminate\Http\Request;
use Validator;

class ServiceController extends Controller
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
        $services = Service::all();
        $staffs = Employee::all();

        return view('appointment', [
            'services' => $services,
            'staffs' => $staffs,
            'appointments' => [],

        ]);
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
        // dd($request);
        $request->except(['submit', '_token', 'q']);

        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|max:250',
            'customer_email'=> 'required|email|max:255',
            'date_time'     => 'required',
            'staff_name'    => 'required',
            'service_name'  => 'required'
        ]);

        $errors = array('errors' => $validator->messages());

        if($validator->fails()) {
            return redirect()->back()->with($errors);
        }

        $appointment = new Appointment;
        $service = Service::find($request->service_id)->first();

        $appointment->service_name = $service->service_name;
        $appointment->staff_name = $request->staff_name;
        $appointment->date_time = $request->date_time;
        // $selected_date_time = date("Y-m-d H:i", strtotime($request->date_time));
        // $appointment->date_time_end = date('Y-m-d H:i',strtotime($selected_date_time) + (60 * $service->service_duration_mm));
        $appointment->duration = $service->service_duration_mm;
        $appointment->customer_name = $request->customer_name;
        $appointment->customer_email = $request->customer_email;
        $appointment->status = 'pending';

        $appointment->save();

        $message = array('message' => 'Success! Appointment Submitted');
        return redirect()->back()->with($message);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
