<div class="tab-pane active" id="masterFileTab" role="tabpanel">
                      <form method="get" action="{{url('report-master')}}">
                         
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group " >
                                <label class="form-control-label" for="employee">Employee Name/Email/Staff ID</label>
                              
                                <input type="text" class="form-control" id="employee" value="" name="employee" placeholder="Employee Name/Email/Staff ID"
                                   />
                                 
                              </div>
                                </div>
                                <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="role">Roles</label>
                                                <select class="form-control" name="role">
                                                    <option value="0">All Roles</option>
                                                    @forelse($roles as $role)
                                                        <option value="{{$role->id}}" {{ request()->role==$role->id?'selected':'' }}>{{$role->name}}</option>
                                                    @empty
                                                        <option value="0">Please Create Roles</option>
                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>
                                 <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="branch">Branches</label>
                                                <select class="form-control" name="branch">
                                                    <option value="0">All Branches</option>
                                                    @forelse($branches as $branch)
                                                        <option value="{{$branch->id}}" {{ request()->branch==$branch->id?'selected':'' }}>{{$branch->name}}</option>
                                                    @empty
                                                        <option value="0">Please Create Branches</option>
                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>
                                        
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="department">Departments</label>
                                                <select class="form-control" name="department" onchange="departmentChange(this.value);">
                                                    <option value="0">All Departments</option>
                                                    @forelse($departments as $department)
                                                        <option value="{{$department->id}}" >{{$department->name}}</option>
                                                    @empty
                                                        <option value="0">Please Create Departments</option>
                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="jobroles" >Job Roles</label>
                                                <select class="form-control" name="jobrole"  id="employee-jobroles" style="width: 100%">
                                                    
                                                        <option value="0">Please select Department</option>
                                                        
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="">Hire Date</label>
                                            <div class="input-daterange input-group" id="employee-datepicker">
                                                <input type="text" class=" form-control" name="start_date_hiredate" placeholder="From date" id="fromdate" value="" required="" readonly />
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class=" form-control" name="end_date_hiredate" placeholder="To date" id="todate" value="" required="" readonly />
                                            </div>
                                        </div>
                      </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="grade">Grades</label>
                                                <select class="form-control" name="grade">
                                                    <option value="0">All Grade</option>
                                                    @forelse($grades as $grade)
                                                        <option value="{{$grade->id}}" >{{$grade->level}}</option>
                                                    @empty
                                                        <option value="0">Please Create Grade</option>
                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="gender">Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option value="all">All Gender</option>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                    
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="status">Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="all">All Staff</option>
                                                    <option value="active">Active Staff</option>
                                                    <option value="1">Confirmed</option>
                                                    <option value="0">Probation</option>
                                                    <option value="2">Disengaged</option>
                                                    
                                                </select>

                                            </div>
                                        </div>
                          </div>
                          <div class="row">
                          
                                        <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="section">Sections</label>
                                                <select class="form-control" name="section">
                                                    <option value="all">All Staff</option>
                                                    <option value="m">Non Sectionized Staff</option>
                                                   
                                                    @foreach($sections as $section)
                                                        <option value="{{$section->id}}" >{{$section->name}}</option>
                                                    
                                                    @endforeach
                                                    
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="status">Unions</label>
                                                <select class="form-control" name="union">
                                                    <option value="all">All Staff</option>
                                                    <option value="0">Non Unionized Staff</option>
                                                     @foreach($unions as $union)
                                                        <option value="{{$union->id}}" >{{$union->name}}</option>
                                                    
                                                    @endforeach
                                                    
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for=""> Date of Birth</label>
                                            <div class="input-daterange input-group" id="employee-datepicker-dob">
                                                <input type="text" class=" form-control" name="start_date_dob" placeholder="From date" id="fromdate-dob" value="" required="" readonly />
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class=" form-control" name="end_date_dob" placeholder="To date" id="todate-dob" value="" required="" readonly />
                                            </div>
                                        </div>
                      </div>
                      <div class="col-md-4">
                      <button type="submit" class="btn btn-primary btn-lg form-control">Filter</button>
                      </div>
                          
                          </div>
                        </form>    
                  </div>