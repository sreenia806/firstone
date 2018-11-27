<?php

namespace App\Http\Controllers;

use App\Model\Employee;
use App\Model\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class RewardsController extends Controller
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

        return view('rewards.index', compact('data', 'employeeId'));
    }

    public function getEmployeeRewards($id) {
        $employee = Employee::find($id);
        $rewards = Reward::where('employee_id', $id)->get();

        return response()->json(array(
            'employee' => $employee,
            'rewards' => $rewards
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

        $rewards = Reward::create($data);


        return Redirect::route('rewards.index', ['employeeId' => $request->get('employee_id')]);

    }


    public function updateReward(Request $request, $rewardId)
    {
        $reward = Reward::findOrFail($rewardId);
        $result = $reward->update($request->all());

        if ($result) {
            \Session::flash('message', 'Reward updated successfully!');
        } else {
            \Session::flash('message', 'Unable to update Reward');
            \Session::flash('alert-class', 'alert-danger');
        }

        return Redirect::route('rewards.index');
    }
}