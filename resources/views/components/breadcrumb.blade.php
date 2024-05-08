                    <div class="page-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title">{{ $title }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">{{ $li_1 }}</a></li>
                                    <li class="breadcrumb-item active">{{ $li_2 }}</li>
                                    @if(isset($li_3))
                                    <li class="breadcrumb-item">{{ $li_3 }}</li>
                                    @endif
                                    @if(isset($li_4))
                                    <li class="breadcrumb-item active">{{ $li_4 }}</li>
                                    @endif
                                </ul>
                            </div>

                            @if(isset($action_button))
                            <div class="col-auto float-end ms-auto">
                                {!! $action_button !!}
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- /Page Header -->

                     <!-- Page Header -->
                      @if(Route::is(['approval-setting','change-password']))
                            <div class="page-header mb-2">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="page-title">{{ $title }}</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- /Page Header -->
                    @endif

                    <!-- Page Header -->
                    @if(Route::is(['assets1','attance-reports','assets-new','assets-category','budget-expenses','budget-revenues','budgets','candidates','categories','clients-list','clients','daily-reports','departments','designations','employee-reports','employees-list','employees','estimate-view','estimates','events','expenses','experiance-level','goal-tracking','goal-type','holidays','inbox','interview-questions','interviewing','invoice-view','invoices','jobs','leave-reports','leave-type','leaves-employee','leaves','mail-view','overtime','performance-appraisal','performance-indicator','policies','project-list','project-view','projects','promotion','provident-fund','resignation','salary-view','salary','shift-list','shift-scheduling','sub-category','subscriptions','taxes','termination','tickets','timesheet','trainers','training-type','training','users']))
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">{{ $title }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">{{ $li_1 }}</a></li>
                                    <li class="breadcrumb-item active">{{ $li_2 }}</li>
                                     @if(Route::is(['candidates','experiance-level','interview-questions','interviewing','shift-list','shift-scheduling']))
                                    <li class="breadcrumb-item">{{ $li_3 }}</li>
                                    @endif
                                     @if(Route::is(['interviewing']))
                                    <li class="breadcrumb-item">{{ $li_4 }}</li>
                                    @endif
                                </ul>
                            </div>

                            <div class="col-auto float-end ms-auto">
                                @if(Route::is(['assets-category']))
                                <ul class="split-head">
									<li>
										<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_asset"><i class="fa fa-plus"></i>  Add Category</a>
									</li>
								</ul>
                                @endif
                                @if(Route::is(['assets-new']))
                               <ul class="split-head">
									<li>
										<div class="bookingrange btn btn-white btn-sm ">
											<i class="fa fa-calendar me-2"></i>
											<span>November 22, 2022 - November 28, 2022</span>
											<i class="fa fa-chevron-down ms-2"></i>
										</div>
									</li>
									<li>
										<a href="#" class="btn btn-whiteline"><i class="fa fa-download me-2" aria-hidden="true"></i>CSV</a>
									</li>
									<li>
										<a href="#" class="btn btn-whiteline"><i class="fa fa-filter me-2" aria-hidden="true"></i>Filters</a>
									</li>
									<li>
										<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_asset"><i class="fa fa-plus"></i> Add New Asset</a>
									</li>
								</ul>
                                @endif
                                @if(Route::is(['assets1']))
                                    <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_asset"><i class="fa fa-plus"></i> Add Asset</a>
                                @endif
                                @if(Route::is(['budget-expenses']))
                                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_categories"><i class="fa fa-plus"></i> Add Expenses</a>
                                @endif

                            @if(Route::is(['budget-revenues']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_categories"><i class="fa fa-plus"></i> Add Revenues</a>
                            @endif
                            @if(Route::is(['budgets']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_categories"><i class="fa fa-plus"></i> Add Budgets</a>
                             @endif
                             @if(Route::is(['candidates']))
                             <a href="#" data-bs-toggle="modal" data-bs-target="#add_employee" class="btn add-btn"> Add Candidates</a>
                             @endif
                             @if(Route::is(['categories']))
                             <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_categories"><i class="fa fa-plus"></i> Add Categories</a>
                            @endif
                             @if(Route::is(['departments']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_department"><i class="fa fa-plus"></i> Add Department</a>
                            @endif
                            @if(Route::is(['designations']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_designation"><i class="fa fa-plus"></i> Add Designation</a>
                            @endif
                             @if(Route::is(['estimates']))
                             <a href="{{url('create-estimate')}}"  class="btn add-btn"><i class="fa fa-plus"></i> Create Estimate</a>
                             @endif
                             @if(Route::is(['events']))
                             <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_event"><i class="fa fa-plus"></i> Add Event</a>
                             @endif
                             @if(Route::is(['expenses']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_expense"><i class="fa fa-plus"></i> Add Expense</a>
                            @endif
                            @if(Route::is(['experiance-level']))
                           <a href="#" data-bs-toggle="modal" data-bs-target="#add_employee" class="btn add-btn"> Add Experience Level</a>
                           @endif
                           @if(Route::is(['goal-tracking']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_goal"><i class="fa fa-plus"></i> Add New</a>
                            @endif
                             @if(Route::is(['goal-type']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_type"><i class="fa fa-plus"></i> Add New</a>
                            @endif
                             @if(Route::is(['performance-indicator']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_indicator"><i class="fa fa-plus"></i> Add New</a>
                            @endif
                             @if(Route::is(['performance-appraisal']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_appraisal"><i class="fa fa-plus"></i> Add New</a>
                            @endif
                             @if(Route::is(['trainers']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_trainer"><i class="fa fa-plus"></i> Add New</a>
                            @endif

                            @if(Route::is(['holidays']))
                             <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_holiday"><i class="fa fa-plus"></i> Add Holiday</a>
                             @endif
                              @if(Route::is(['inbox','mail-view']))
                              <a href="{{url('compose')}}" class="btn add-btn"><i class="fa fa-plus"></i> Compose</a>
                              @endif
                              @if(Route::is(['interview-questions']))
                              <a href="#" class="btn add-btn mb-1" data-bs-toggle="modal" data-bs-target="#add_question"><i class="fa fa-plus"></i> Add Question</a>
                            <a href="#" class="btn add-btn me-1 mb-1" data-bs-toggle="modal" data-bs-target="#add_category"><i class="fa fa-plus"></i> Add Category</a>
                            @endif
                            @if(Route::is(['invoices']))
                            <a href="{{url('create-invoice')}}" class="btn add-btn"><i class="fa fa-plus"></i> Create Invoice</a>
                            @endif
                             @if(Route::is(['jobs']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_job"><i class="fa fa-plus"></i> Add Job</a>
                            @endif
                            @if(Route::is(['leave-type']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_leavetype"><i class="fa fa-plus"></i> Add Leave Type</a>
                            @endif
                            @if(Route::is(['leaves-employee','leaves']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
                            @endif
                            @if(Route::is(['overtime']))
                             <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_overtime"><i class="fa fa-plus"></i> Add Overtime</a>
                             @endif
                            @if(Route::is(['policies']))
                           <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_policy"><i class="fa fa-plus"></i> Add Policy</a>
                           @endif
                            @if(Route::is(['promotion']))
                           <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_promotion"><i class="fa fa-plus"></i> Add Promotion</a>
                           @endif
                           @if(Route::is(['provident-fund']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_pf"><i class="fa fa-plus"></i> Add Provident Fund</a>
                            @endif
                            @if(Route::is(['resignation']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_resignation"><i class="fa fa-plus"></i> Add Resignation</a>
                            @endif
                            @if(Route::is(['salary']))
                             <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
                             @endif
                             @if(Route::is(['shift-list']))
                             <a href="#" class="btn add-btn m-r-5" data-bs-toggle="modal" data-bs-target="#add_shift">Add Shifts</a>
                                <a href="#" class="btn add-btn m-r-5" data-bs-toggle="modal" data-bs-target="#add_schedule"> Assign Shifts</a>
                            @endif
                            @if(Route::is(['shift-scheduling']))
                            <div class="col-auto float-end ms-auto">
                                <a href="shift-list" class="btn add-btn m-r-5">Shifts</a>
                                <a href="#" class="btn add-btn m-r-5" data-bs-toggle="modal" data-bs-target="#add_schedule"> Assign Shifts</a>
                            </div>
                            @endif
                             @if(Route::is(['sub-category']))
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_categories"><i class="fa fa-plus"></i> Add Sub Categories</a>
                            @endif
                             @if(Route::is(['subscriptions']))
                              <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_plan"><i class="fa fa-plus"></i> Add Subscription</a>
                              @endif
                              @if(Route::is(['taxes']))
                             <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_tax"><i class="fa fa-plus"></i> Add Tax</a>
                              @endif
                              @if(Route::is(['termination']))
                              <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_termination"><i class="fa fa-plus"></i> Add Termination</a>
                              @endif
                               @if(Route::is(['tickets']))
                              <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_ticket"><i class="fa fa-plus"></i> Add Ticket</a>
                              @endif
                              @if(Route::is(['timesheet']))
                              <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_todaywork"><i class="fa fa-plus"></i> Add Today Work</a>
                              @endif

                               @if(Route::is(['training-type']))
                               <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_type"><i class="fa fa-plus"></i> Add Type</a>
                               @endif
                               @if(Route::is(['training']))
                               <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_training"><i class="fa fa-plus"></i> Add New </a>
                               @endif
                                @if(Route::is(['users']))
                                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_user"><i class="fa fa-plus"></i> Add User</a>
                                @endif
                            </div>


                            @if(Route::is(['clients-list','clients']))
                            <div class="col-auto float-end ms-auto">
                                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_client"><i class="fa fa-plus"></i> Add Client</a>
                                <div class="view-icons">
                                    <a href="{{url('clients')}}" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                                    <a href="{{url('clients-list')}}" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                                </div>
                            </div>
                            @endif
                            @if(Route::is(['employees-list','employees','project-list','projects','project-view']))
                              <div class="col-auto float-end ms-auto">
                                 @if(!Route::is(['projects','project-view','project-list']))
                                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                                @endif
                                @if(Route::is(['projects','project-list']))
                                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#create_project"><i class="fa fa-plus"></i> Create Project</a>
                                @endif
                                @if(Route::is(['project-view']))
                                 <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa fa-plus"></i> Edit Project</a>
                                 @endif
                                <div class="view-icons">
                                @if(Route::is(['employees-list']))
                                    <a href="{{url('employees')}}" class="grid-view btn btn-link "><i class="fa fa-th"></i></a>
                                    <a href="{{url('employees-list')}}" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                                @endif
                                @if(Route::is(['employees']))
                                    <a href="{{url('employees')}}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                                    <a href="{{url('employees-list')}}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                                @endif
                                 @if(Route::is(['project-list']))
                                    <a href="{{url('projects')}}" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                                    <a href="{{url('project-list')}}" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                                @endif
                                  @if(Route::is(['projects']))
                                    <a href="{{url('projects')}}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                                    <a href="{{url('project-list')}}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                                @endif
                                @if(Route::is(['project-view']))
                               <a href="{{url('task-board')}}" class="btn btn-white float-end m-r-10" data-bs-toggle="tooltip" title="Task Board"><i class="fa fa-bars"></i></a>
                               @endif
                                </div>
                            </div>
                            @endif
                             @if(Route::is(['daily-reports','employee-reports','leave-reports','attance-reports']))
                               <div class="col-auto">
                                <a href="#" class="btn btn-primary">PDF</a>
                            </div>
                            @endif
                            @if(Route::is(['estimate-view','invoice-view','salary-view']))
                            <div class="col-auto float-end ms-auto">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-white">CSV</button>
                                    <button class="btn btn-white">PDF</button>
                                    <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                                </div>
                            </div>
                            @endif


                        </div>
                    </div>
                    <!-- /Page Header -->
                    @endif
