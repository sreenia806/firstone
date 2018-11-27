<?php

namespace App\Http\Controllers;

use App\Model\Employee;
use App\Model\Rank;
use App\Model\Designation;
use App\Model\Nativeunit;
use Auth;
use App\Model\Induction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InductionsController extends Controller
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
        $data =  Induction::all();

        return view('inductions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inductions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_number' => 'required|max:100',
            'do_number' => 'required|max:50',
            'induction_date' => 'required:date_format:"Y-m-d"'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();

        $Induction = Induction::create($data);

        return Redirect::route('inductions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $Induction = Induction::find($id);
        $fieldsToShow = [
            'file_number',
            'do_number',
            'induction_date'

        ];

        return view('inductions.show', compact('Induction', 'fieldsToShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $induction = Induction::find($id);
        $ranks = Rank::all();
        $designations = Designation::all();
        $nativeunits = Nativeunit::all();

        return view('Inductions.edit',
            compact('induction', 'ranks', 'designations','nativeunits'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $induction = Induction::findOrFail($id);
        $induction->update($request->all());

        return Redirect::route('inductions.show', ['id' => $id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createEmployee(Request $request, $inductionId) {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'employee_number' => 'required:number'
        ]);

        $data = $request->all();
        $employee = Employee::create($data);

        $induction = Induction::find($inductionId);
        $induction->employees()->save($employee);

        return response()->json([
            'status' => 'success',
            'employees' => $induction->employees()->get()
        ]);
    }
}
