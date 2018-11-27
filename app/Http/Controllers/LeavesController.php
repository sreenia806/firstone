<?php

namespace App\Http\Controllers;

use App\Model\Employee;
use App\Model\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class LeavesController extends Controller
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
    public function index(Request $request)
    {
        $employeeId = $request->get('employeeId');

        $data = Employee::all();
        return view('leaves.index', compact('data','employeeId'));
    }

    public function getEmployeeLeaves($id) {
        $employee = Employee::find($id);
        $leaves = Leave::where('employee_id', $id)->get();

        return response()->json(array(
            'employee' => $employee,
            'leaves' => $leaves
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

        $leaves = Leave::create($data);


        return Redirect::route('leaves.index');

    }


    public function updateLeave(Request $request, $leaveId)
    { print_r($request->all());
        $leave = Leave::findOrFail($leaveId);
        $leave->update($request->all());

        return Redirect::route('leaves.index', ['employeeId' => $request->get('employee_id')]);

    }
}