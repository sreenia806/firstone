<?php

namespace App\Http\Controllers;

use App\Model\Employee;
use App\Model\Increment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class IncrementsController extends Controller
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
        return view('increments.index', compact('data'));
    }

    public function getEmployeeIncrements($id) {
        $employee = Employee::find($id);
        $increments = Increment::where('employee_id', $id)->get();

        return response()->json(array(
            'employee' => $employee,
            'increments' => $increments
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

        $increments = Increment::create($data);


        return Redirect::route('increments.index');

    }


    public function updateIncrement(Request $request, $incrementId)
    { print_r($request->all());
        $increment = Increment::findOrFail($incrementId);
        $increment->update($request->all());

        return Redirect::route('increments.index');
    }
}