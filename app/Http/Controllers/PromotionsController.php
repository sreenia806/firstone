<?php

namespace App\Http\Controllers;

use App\Model\Employee;
use App\Model\Promotion;
use App\Model\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PromotionsController extends Controller
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
        $designations = Designation::all();
        return view('promotions.index', compact('data', 'designations'));
    }

    public function getEmployeePromotions($id) {
        $employee = Employee::find($id);
        $promotions = Promotion::where('employee_id', $id)->get();;

        foreach ($promotions as $promotion) {
            $promotion->designation_name = $promotion->designation->name;
        };

        return response()->json(array(
            'employee' => $employee,
            'promotions' => $promotions,
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

        $promotions = Promotion::create($data);


        return Redirect::route('promotions.index');

    }


    public function updatePromotion(Request $request, $promotionId)
    { print_r($request->all());
        $promotion = Promotion::findOrFail($promotionId);
        $promotion->update($request->all());


        return Redirect::route('promotions.index');
    }
}