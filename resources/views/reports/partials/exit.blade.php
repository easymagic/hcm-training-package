<div class="tab-pane" id="exitsTab" role="tabpanel">
                      <form method="get" action="{{url('report-exits')}}">
                         
                      <div class="row">
                          <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="seperation_type">Exit types</label>
                                                <select class="form-control" name="separation_type">
                                                    <option value="0">All Types</option>
                                                    @forelse($separation_types as $separation_type)
                                                        <option value="{{$separation_type->id}}" {{ request()->separation_type==$separation_type->id?'selected':'' }}>{{$separation_type->name}}</option>
                                                    @empty
                                                        <option value="0">Please Create Separation types</option>
                                                    @endforelse
                                                </select>

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
                                                <select class="form-control" name="department" onchange="exitDepartmentChange(this.value);">
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
                                                <select class="form-control" name="jobrole"  id="exit-jobroles" style="width: 100%">
                                                    
                                                        <option value="0">Please select Department</option>
                                                        
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="">Hire Date</label>
                                            <div class="input-daterange input-group" id="exit-datepicker">
                                                <input type="text" class=" form-control" name="start_date_hiredate" placeholder="From date" id="hirefromdate" value="" required="" readonly />
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class=" form-control" name="end_date_hiredate" placeholder="To date" id="hiretodate" value="" required="" readonly />
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
                                        <div class="form-group">
                                            <label class="form-control-label" for=""> Date of Separation</label>
                                            <div class="input-daterange input-group" id="employee-datepicker-dob">
                                                <input type="text" class=" form-control" name="start_date_exitdate" placeholder="From date" id="exitfromdate" value="" required="" readonly />
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class=" form-control" name="end_date_exitdate" placeholder="To date" id="exittodate" value="" required="" readonly />
                                            </div>
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
                                            </div>
                                            
                          
                          </div>
                          <div class="row">
                      <div class="col-md-4">
                      <button type="submit" class="btn btn-primary btn-lg form-control">Filter</button>
                      </div>
                       </div>
                        </form>    
                  </div>