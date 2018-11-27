<?php

namespace App\Http\Controllers;

use App\Model\Nativeunit;
use App\Model\Designation;
use App\Model\Rank;
use App\Model\Employee;
use App\Model\Address;
use App\Model\Unit;
use App\Model\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class EmployeesController extends Controller
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
        $q = trim($request->query('q'));

        if ($q) {
            $data = DB::table('employees')
                ->join('ranks', 'employees.rank_id', '=', 'ranks.id')
                ->where('first_name', 'LIKE', '%' . $q . '%')
                ->orWhere('last_name', 'LIKE', '%' . $q . '%')
                ->orWhere('employee_number', 'LIKE', '%' . $q . '%')
                ->orWhere('pao_id_number', 'LIKE', '%' . $q . '%')
                ->orWhere('ranks.name', 'LIKE', '%' . $q . '%')
                ->select('employees.*', 'ranks.name')
                ->get();

        } else {
            $data =  DB::table('employees')
                ->join('ranks', 'employees.rank_id', '=', 'ranks.id')
                ->select('employees.*', 'ranks.name')
                ->get();
        }

        return view('employees.index', compact('data'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'employee_number' => 'required:number'
        ]);

        $data = $request->all();
        $employee = Employee::create($data);

        return Redirect::route('employee.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        echo '<pre>';
//        print_r($employee->rank->name); exit;

        $fieldsToShow = [
            'first_name',
            'last_name',
            'employee_number',
            'pao_id_number',
            'rank_id',
            'date_of_appointment',
            'date_of_joining',
            'category',
            'gh_unit_id',
            'blood_group'
        ];

        return view('employees.show', compact('employee', 'fieldsToShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

        $designations = Designation::all('id', 'name');
        $ranks = Rank::all('id', 'name');
        $nativeunits = Nativeunit::all('id', 'name');
        $units = Unit::all('id', 'name');


        $categories = array(
            "CIVIL" => "",
            "ARMED RESERVE" => "",
            "TSSP" => "",
            "ADMIN STAFF" => "",
            "CLASS-IV" => "",
            "PTO" => "",
            "MEDICAL OFFICER" => "",
            "MEDICAL STAFF" => ""

        );

        foreach ($categories as $category => $value) {
            if ($category == $employee->category) {
                $categories[$category] = "selected";
            }
        }


        $bloodgroups = array(
            "A POSITIVE" => "",
            "A NEGATIVE" => "",
            "B POSITIVE" => "",
            "B NEGATIVE" => "",
            "AB POSITIVE" => "",
            "AB NEGATIVE" => "",
            "O POSITIVE" => "",
            "O NEGATIVE" => ""
        );

        foreach ($bloodgroups as $bloodgroup => $value) {
            if ($bloodgroup == $employee->blood_group) {
                $bloodgroups[$bloodgroup] = "selected";
            }
        }

        $castes = array(
            "OC" => "",
            "BC-A" => "",
            "BC-B" => "",
            "BC-C" => "",
            "BC-D" => "",
            "BC-E" => "",
            "SC" => "",
            "ST" => ""
        );

        foreach ($castes as $caste => $value) {
            if ($caste == $employee->caste) {
                $castes[$caste] = "selected";
            }
        }

        $promotiontypes = array(
            "REGULAR" => "",
            "O/S" => "",
            "ACCELERATED" => ""


        );

        foreach ($promotiontypes as $promotiontype => $value) {
            if ($promotiontype == $employee->promotiontype) {
                $promotiontypes[$promotiontype] = "selected";
            }
        }

        return view('employees.edit', compact('employee', 'designations', 'ranks', 'nativeunits', 'categories', 'units', 'bloodgroups', 'castes', 'promotiontypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
//        print_r($data);exit;

        $image = $request->file('avatar');

        if ($image) {
            $name = $id . '.' . $image->getClientOriginalExtension();
            $data['photo'] = $name;
            $destinationPath = public_path('images/avatars');
            $image->move($destinationPath, $name);
        }

        $employee = Employee::findOrFail($id);
        $employee->update($data);

        return Redirect::route('employees.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }

    public function saveAddress(Request $request, $id)
    {
        $data = $request->all();

        $employee = Employee::findOrFail($id);


        if (empty($data['present']['id'])) {
            $address = Address::create($data['present']);
            $employee->present_address_id = $address->id;
            $employee->save();
        } else {
            $address = Address::findOrFail($data['present']['id']);

            if ($address) {
                $address->address1 = $data['present']['address1'];
                $address->address2 = $data['present']['address2'];
                $address->city = $data['present']['city'];
                $address->state = $data['present']['state'];
                $address->pincode = $data['present']['pincode'];
                $address->save();
            }

        }


        if (empty($data['permanent']['id'])) {
            $address = Address::create($data['permanent']);
            $employee->permanent_address_id = $address->id;
            $employee->save();
        } else {
            $address = Address::findOrFail($data['permanent']['id']);

            if ($address) {
                $address->address1 = $data['permanent']['address1'];
                $address->address2 = $data['permanent']['address2'];
                $address->city = $data['permanent']['city'];
                $address->state = $data['permanent']['state'];
                $address->pincode = $data['permanent']['pincode'];

                $address->save();
            }
        }


        return Redirect::route('employees.edit', ['id' => $id]);


    }

    public function doPromotion()
    {
        $employees = Employee::get();
        $designations = Designation::get();

        return view('hrms.promotion.add_promotion', compact('emps', 'roles'));
    }

    public function getPromotionData(Request $request)
    {
        $result = Employee::with('userrole.role')->where('id', $request->employee_id)->first();
        if ($result) {
            $result = ['salary' => $result->salary, 'designation' => $result->userrole->role->name];
        }

        return json_encode(['status' => 'success', 'data' => $result]);
    }

    public function processPromotion(Request $request)
    {

        $newDesignation = Role::where('id', $request->new_designation)->first();
        $process = Employee::where('id', $request->emp_id)->first();
        $process->save();

        \DB::table('user_roles')->where('user_id', $process->user_id)->update(['role_id' => $request->new_designation]);

        $promotion = new Promotion();
        $promotion->emp_id = $request->emp_id;
        $promotion->old_designation = $request->old_designation;
        $promotion->new_designation = $newDesignation->name;
        $promotion->old_salary = $request->old_salary;
        $promotion->new_salary = $request->new_salary;
        $promotion->date_of_promotion = date_format(date_create($request->date_of_promotion), 'Y-m-d');
        $promotion->save();

        \Session::flash('flash_message', 'Employee successfully Promoted!');

        return redirect()->back();
    }

    public function showPromotion()
    {
        $promotions = Promotion::with('employee')->paginate(10);

        return view('hrms.promotion.show_promotion', compact('promotions'));
    }

}
