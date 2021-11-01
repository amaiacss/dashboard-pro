<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\StaffSalary;
use Brian2694\Toastr\Facades\Toastr;

class PayrollController extends Controller
{
    // view page salary
    public function salary()
    {

        $users = DB::table('users')
                    ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
                    ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                    ->get(); 
        $userList = DB::table('users')->get();
        $permission_lists = DB::table('permission_lists')->get();
        return view('payroll.employeesalary',compact('users','userList','permission_lists'));
    }

    // save record
     public function saveRecord(Request $request)
     {
        // $request->validate([
        //     'leave_type'   => 'required|string|max:255',
        //     'from_date'    => 'required|string|max:255',
        //     'to_date'      => 'required|string|max:255',
        //     'leave_reason' => 'required|string|max:255',
        // ]);

        DB::beginTransaction();
        try {

            $salary = new StaffSalary;
            $salary->name              = $request->name;
            $salary->rec_id            = $request->rec_id;
            $salary->salary            = $request->salary;
            $salary->basic             = $request->basic;
            $salary->da                = $request->da;
            $salary->conveyance        = $request->conveyance;
            $salary->allowance         = $request->allowance;
            $salary->medical_allowance = $request->medical_allowance;
            $salary->tds               = $request->tds;
            $salary->esi               = $request->esi;
            $salary->pf                = $request->pf;
            $salary->leave             = $request->leave;
            $salary->prof_tax          = $request->prof_tax;
            $salary->labour_welfare    = $request->labour_welfare;
            $salary->save();
    
            DB::commit();
            Toastr::success('Create new Salary successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Salary fail :)','Error');
            return redirect()->back();
        }
     }

    // salary view detail
    public function salaryView()
    {
        return view('payroll.salaryview');
    }

    // payroll Items
    public function payrollItems()
    {
        return view('payroll.payrollitems');
    }
}
