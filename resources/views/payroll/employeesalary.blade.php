
@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-dashboard"></i>
                            <span> Dashboard</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('home') }}">Admin Dashboard</a></li>
                            <li><a href="{{ route('em/dashboard') }}">Employee Dashboard</a></li>
                        </ul>
                    </li>
                    @if (Auth::user()->role_name=='Admin')
                        <li class="menu-title"> <span>Authentication</span> </li>
                        <li class="submenu">
                            <a href="#">
                                <i class="la la-user-secret"></i> <span> User Controller</span> <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a href="{{ route('userManagement') }}">All User</a></li>
                                <li><a href="{{ route('activity/log') }}">Activity Log</a></li>
                                <li><a href="{{ route('activity/login/logout') }}">Activity User</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="menu-title">
                        <span>Employees</span>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-user"></i>
                            <span> Employees</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">All Employees</a></li>
                            <li><a href="{{ route('form/holidays/new') }}">Holidays</a></li>
                            <li><a href="{{ route('form/leaves/new') }}">Leaves (Admin) 
                                <span class="badge badge-pill bg-primary float-right">1</span></a>
                            </li>
                            <li><a href="{{route('form/leavesemployee/new')}}">Leaves (Employee)</a></li>
                            <li><a href="{{ route('form/leavesettings/page') }}">Leave Settings</a></li>
                            <li><a href="{{ route('attendance/page') }}">Attendance (Admin)</a></li>
                            <li><a href="{{ route('attendance/employee/page') }}">Attendance (Employee)</a></li>
                            <li><a href="departments.html">Departments</a></li>
                            <li><a href="designations.html">Designations</a></li>
                            <li><a href="timesheet.html">Timesheet</a></li>
                            <li><a href="shift-scheduling.html">Shift & Schedule</a></li>
                            <li><a href="overtime.html">Overtime</a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>HR</span> </li>
                    <li class="submenu">
                        <a href="#" class="noti-dot">
                            <i class="la la-user"></i>
                            <span> Payroll</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a class="active" href="{{ route('form/salary/page') }}"> Employee Salary </a></li>
                            <li><a href="{{ route('form/salary/view') }}"> Payslip </a></li>
                            <li><a href="{{ route('form/payroll/items') }}"> Payroll Items </a></li>
                        </ul>
                    </li>
                    <li> <a href="policies.html">
                        <i class="la la-file-pdf-o"></i>
                        <span>Policies</span></a>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-pie-chart"></i>
                        <span> Reports </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="expense-reports.html"> Expense Report </a></li>
                            <li><a href="invoice-reports.html"> Invoice Report </a></li>
                            <li><a href="payments-reports.html"> Payments Report </a></li>
                            <li><a href="project-reports.html"> Project Report </a></li>
                            <li><a href="task-reports.html"> Task Report </a></li>
                            <li><a href="user-reports.html"> User Report </a></li>
                            <li><a href="employee-reports.html"> Employee Report </a></li>
                            <li><a href="payslip-reports.html"> Payslip Report </a></li>
                            <li><a href="attendance-reports.html"> Attendance Report </a></li>
                            <li><a href="leave-reports.html"> Leave Report </a></li>
                            <li><a href="daily-reports.html"> Daily Report </a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Performance</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-graduation-cap"></i>
                        <span> Performance </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="performance-indicator.html"> Performance Indicator </a></li>
                            <li><a href="performance.html"> Performance Review </a></li>
                            <li><a href="performance-appraisal.html"> Performance Appraisal </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-edit"></i>
                        <span> Training </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="training.html"> Training List </a></li>
                            <li><a href="trainers.html"> Trainers</a></li>
                            <li><a href="training-type.html"> Training Type </a></li>
                        </ul>
                    </li>
                    <li><a href="promotion.html"><i class="la la-bullhorn"></i> <span>Promotion</span></a></li>
                    <li><a href="resignation.html"><i class="la la-external-link-square"></i> <span>Resignation</span></a></li>
                    <li><a href="termination.html"><i class="la la-times-circle"></i> <span>Termination</span></a></li>
                    <li class="menu-title"> <span>Administration</span> </li>
                    <li> <a href="assets.html"><i class="la la-object-ungroup">
                        </i> <span>Assets</span></a>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-briefcase"></i>
                        <span> Jobs </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="user-dashboard.html"> User Dasboard </a></li>
                            <li><a href="jobs-dashboard.html"> Jobs Dasboard </a></li>
                            <li><a href="jobs.html"> Manage Jobs </a></li>
                            <li><a href="manage-resumes.html"> Manage Resumes </a></li>
                            <li><a href="shortlist-candidates.html"> Shortlist Candidates </a></li>
                            <li><a href="interview-questions.html"> Interview Questions </a></li>
                            <li><a href="offer_approvals.html"> Offer Approvals </a></li>
                            <li><a href="experiance-level.html"> Experience Level </a></li>
                            <li><a href="candidates.html"> Candidates List </a></li>
                            <li><a href="schedule-timing.html"> Schedule timing </a></li>
                            <li><a href="apptitude-result.html"> Aptitude Results </a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="profile.html"> Employee Profile </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Employee Salary <span id="year"></span></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Salary</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
                    </div>
                </div>
            </div>

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Employee Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                    <div class="form-group form-focus select-focus">
                        <select class="select floating"> 
                            <option value=""> -- Select -- </option>
                            <option value="">Employee</option>
                            <option value="1">Manager</option>
                        </select>
                        <label class="focus-label">Role</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
                    <div class="form-group form-focus select-focus">
                        <select class="select floating"> 
                            <option> -- Select -- </option>
                            <option> Pending </option>
                            <option> Approved </option>
                            <option> Rejected </option>
                        </select>
                        <label class="focus-label">Leave Status</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                    <a href="#" class="btn btn-success btn-block"> Search </a>  
                </div>     
            </div>
            <!-- /Search Filter -->  
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Employee ID</th>
                                    <th>Email</th>
                                    <th>Join Date</th>
                                    <th>Role</th>
                                    <th>Salary</th>
                                    <th>Payslip</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="{{URL::to('assets/img/profiles/avatar-02.jpg')}}"></a>
                                            <a href="profile.html">John Doe <span>Web Designer</span></a>
                                        </h2>
                                    </td>
                                    <td>FT-0001</td>
                                    <td>johndoe@example.com</td>
                                    <td>1 Jan 2013</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Web Designer </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Software Engineer</a>
                                                <a class="dropdown-item" href="#">Software Tester</a>
                                                <a class="dropdown-item" href="#">Frontend Developer</a>
                                                <a class="dropdown-item" href="#">UI/UX Developer</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$59698</td>
                                    <td><a class="btn btn-sm btn-primary" href="{{ route('form/salary/view') }}">Generate Slip</a></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img src="{{URL::to('assets/img/profiles/avatar-09.jpg')}}" alt=""></a>
                                            <a href="profile.html">Richard Miles <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>FT-0002</td>
                                    <td>richardmiles@example.com</td>
                                    <td>1 Jan 2013</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Web Developer </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Software Engineer</a>
                                                <a class="dropdown-item" href="#">Software Tester</a>
                                                <a class="dropdown-item" href="#">Frontend Developer</a>
                                                <a class="dropdown-item" href="#">UI/UX Developer</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$72000</td>
                                    <td><a class="btn btn-sm btn-primary" href="{{ route('form/salary/view') }}">Generate Slip</a></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img src="{{URL::to('assets/img/profiles/avatar-10.jpg')}}" alt=""></a>
                                            <a href="profile.html">John Smith <span>Android Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>FT-0003</td>
                                    <td>johnsmith@example.com</td>
                                    <td>1 Jan 2013</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Android Developer </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Software Engineer</a>
                                                <a class="dropdown-item" href="#">Software Tester</a>
                                                <a class="dropdown-item" href="#">Frontend Developer</a>
                                                <a class="dropdown-item" href="#">UI/UX Developer</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$48200</td>
                                    <td><a class="btn btn-sm btn-primary" href="{{ route('form/salary/view') }}">Generate Slip</a></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->

        <!-- Add Salary Modal -->
        <div id="add_salary" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Staff Salary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/salary/save') }}" method="POST">
                            @csrf
                            <div class="row"> 
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Select Staff</label>
                                        <select class="select select2s-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" id="name" name="name">
                                            <option value="">-- Select --</option>
                                            @foreach ($userList as $key=>$user )
                                                <option value="{{ $user->name }}" data-employee_id={{ $user->rec_id }}>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input class="form-control" type="hidden" name="rec_id" id="employee_id" readonly>
                                <div class="col-sm-6"> 
                                    <label>Net Salary</label>
                                    <input class="form-control" type="text" name="salary" id="salary" placeholder="Enter net salary">
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6"> 
                                    <h4 class="text-primary">Earnings</h4>
                                    <div class="form-group">
                                        <label>Basic</label>
                                        <input class="form-control" type="text" name="basic" id="basic" placeholder="Enter basic">
                                    </div>
                                    <div class="form-group">
                                        <label>DA(40%)</label>
                                        <input class="form-control" type="text"  name="da" id="da" placeholder="Enter DA(40%)">
                                    </div>
                                    <div class="form-group">
                                        <label>HRA(15%)</label>
                                        <input class="form-control" type="text"  name="hra" id="hra" placeholder="Enter HRA(15%)">
                                    </div>
                                    <div class="form-group">
                                        <label>Conveyance</label>
                                        <input class="form-control" type="text"  name="conveyance" id="conveyance" placeholder="Enter conveyance">
                                    </div>
                                    <div class="form-group">
                                        <label>Allowance</label>
                                        <input class="form-control" type="text"  name="allowance" id="allowance" placeholder="Enter allowance">
                                    </div>
                                    <div class="form-group">
                                        <label>Medical  Allowance</label>
                                        <input class="form-control" type="text" name="medical_allowance" id="medical_allowance" placeholder="Enter medical  allowance">
                                    </div>
                                </div>
                                <div class="col-sm-6">  
                                    <h4 class="text-primary">Deductions</h4>
                                    <div class="form-group">
                                        <label>TDS</label>
                                        <input class="form-control" type="text" name="tds" id="tds" placeholder="Enter TDS">
                                    </div> 
                                    <div class="form-group">
                                        <label>ESI</label>
                                        <input class="form-control" type="text" name="esi" id="esi" placeholder="Enter ESI">
                                    </div>
                                    <div class="form-group">
                                        <label>PF</label>
                                        <input class="form-control" type="text" name="pf" id="pf" placeholder="Enter PF">
                                    </div>
                                    <div class="form-group">
                                        <label>Leave</label>
                                        <input class="form-control" type="text" name="leave" id="leave" placeholder="Enter leave">
                                    </div>
                                    <div class="form-group">
                                        <label>Prof. Tax</label>
                                        <input class="form-control" type="text" name="prof_tax" id="prof_tax" placeholder="Enter Prof. Tax">
                                    </div>
                                    <div class="form-group">
                                        <label>Labour Welfare</label>
                                        <input class="form-control" type="text" name="labour_welfare" id="labour_welfare" placeholder="Enter labour welfare">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Salary Modal -->
        
        <!-- Edit Salary Modal -->
        <div id="edit_salary" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Staff Salary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row"> 
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Select Staff</label>
                                        <select class="select"> 
                                            <option>John Doe</option>
                                            <option>Richard Miles</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6"> 
                                    <label>Net Salary</label>
                                    <input class="form-control" type="text" value="$4000">
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6"> 
                                    <h4 class="text-primary">Earnings</h4>
                                    <div class="form-group">
                                        <label>Basic</label>
                                        <input class="form-control" type="text" value="$6500">
                                    </div>
                                    <div class="form-group">
                                        <label>DA(40%)</label>
                                        <input class="form-control" type="text" value="$2000">
                                    </div>
                                    <div class="form-group">
                                        <label>HRA(15%)</label>
                                        <input class="form-control" type="text" value="$700">
                                    </div>
                                    <div class="form-group">
                                        <label>Conveyance</label>
                                        <input class="form-control" type="text" value="$70">
                                    </div>
                                    <div class="form-group">
                                        <label>Allowance</label>
                                        <input class="form-control" type="text" value="$30">
                                    </div>
                                    <div class="form-group">
                                        <label>Medical  Allowance</label>
                                        <input class="form-control" type="text" value="$20">
                                    </div>
                                    <div class="form-group">
                                        <label>Others</label>
                                        <input class="form-control" type="text">
                                    </div>  
                                </div>
                                <div class="col-sm-6">  
                                    <h4 class="text-primary">Deductions</h4>
                                    <div class="form-group">
                                        <label>TDS</label>
                                        <input class="form-control" type="text" value="$300">
                                    </div> 
                                    <div class="form-group">
                                        <label>ESI</label>
                                        <input class="form-control" type="text" value="$20">
                                    </div>
                                    <div class="form-group">
                                        <label>PF</label>
                                        <input class="form-control" type="text" value="$20">
                                    </div>
                                    <div class="form-group">
                                        <label>Leave</label>
                                        <input class="form-control" type="text" value="$250">
                                    </div>
                                    <div class="form-group">
                                        <label>Prof. Tax</label>
                                        <input class="form-control" type="text" value="$110">
                                    </div>
                                    <div class="form-group">
                                        <label>Labour Welfare</label>
                                        <input class="form-control" type="text" value="$10">
                                    </div>
                                    <div class="form-group">
                                        <label>Fund</label>
                                        <input class="form-control" type="text" value="$40">
                                    </div>
                                    <div class="form-group">
                                        <label>Others</label>
                                        <input class="form-control" type="text" value="$15">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Salary Modal -->
        
        <!-- Delete Salary Modal -->
        <div class="modal custom-modal fade" id="delete_salary" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Salary</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Salary Modal -->
     
    </div>
    <!-- /Page Wrapper -->
    @section('script')
        <script>
            $(document).ready(function() {
                $('.select2s-hidden-accessible').select2({
                    closeOnSelect: false
                });
            });
        </script>
        <script>
            // select auto id and email
            $('#name').on('change',function()
            {
                $('#employee_id').val($(this).find(':selected').data('employee_id'));
            });
        </script>
    @endsection
@endsection
