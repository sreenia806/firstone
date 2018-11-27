<?php

namespace App\Http\Controllers;

use App\Model\Employee;
use App\Model\Outside_training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class Outside_trainingsController extends Controller
{
    /**
     * Constructor
     *
     * @return void
     */
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
        $data = Employee::all();
        return view('outside_trainings.index', compact('data'));
    }

    public function getEmployeeOutside_trainings($id) {
        $employee = Employee::find($id);
        $outside_trainings = Outside_training::where('employee_id', $id)->get();;

        return response()->json(array(
            'employee' => $employee,
            'outside_trainings' => $outside_trainings
        ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $outside_trainings = Outside_training::create($data);


        return Redirect::route('outside_trainings.index');

    }


    public function updateOutside_training(Request $request, $outside_trainingId)
    { print_r($request->all());
        $outside_training = Outside_training::findOrFail($outside_trainingId);
        $outside_training->update($request->all());

        return Redirect::route('outside_trainings.index');
    }
}