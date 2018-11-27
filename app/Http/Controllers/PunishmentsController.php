<?php

namespace App\Http\Controllers;

use App\Model\Employee;
use App\Model\Punishment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PunishmentsController extends Controller
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
        return view('punishments.index', compact('data'));
    }

    public function getEmployeePunishments($id) {
        $employee = Employee::find($id);
        $punishments = Punishment::where('employee_id', $id)->get();;

        return response()->json(array(
            'employee' => $employee,
            'punishments' => $punishments
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

        $punishments = Punishment::create($data);


        return Redirect::route('punishments.index');

    }


    public function updatePunishment(Request $request, $punishmentId)
    { print_r($request->all());
        $punishment = Punishment::findOrFail($punishmentId);
        $punishment->update($request->all());

        return Redirect::route('punishments.index');
    }
}