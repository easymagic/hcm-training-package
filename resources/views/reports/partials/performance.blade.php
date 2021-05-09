<div class="tab-pane" id="promotionTab" role="tabpanel">
                      <form method="get" action="{{url('report-promotion')}}">
                         
                      <div class="row">
                         
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
                                        <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="department">Departments</label>
                                                <select class="form-control" name="department" onchange="promotionDepartmentChange(this.value);">
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
                                                <select class="form-control" name="jobrole"  id="promotion-jobroles" style="width: 100%">
                                                    
                                                        <option value="0">Please select Department</option>
                                                        
                                                </select>
                                            </div>
                                        </div>
                                        
                      </div>
                      <div class="row">
                          
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="">Effective Date of Promomtion</label>
                                            <div class="input-daterange input-group" id="promotion-datepicker">
                                                <input type="text" class=" form-control" name="start_date_promotiondate" placeholder="From date" id="promotionfromdate" value="" required="" readonly />
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class=" form-control" name="end_date_promotiondate" placeholder="To date" id="promotiontodate" value="" required="" readonly />
                                            </div>
                                        </div>
                      </div>
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
                                                <label class="form-control-label" for="grade">Promoted from</label>
                                                <select class="form-control" name="promoted from">
                                                    <option value="0">All Grade</option>
                                                    @forelse($grades as $grade)
                                                        <option value="{{$grade->id}}" >{{$grade->level}}</option>
                                                    @empty
                                                        <option value="0">Please Create Grade</option>
                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                                            <div class="form-group " >
                                                <label class="form-control-label" for="grade">Promoted To</label>
                                                <select class="form-control" name="promoted_to">
                                                    <option value="0">All Grade</option>
                                                    @forelse($grades as $grade)
                                                        <option value="{{$grade->id}}" >{{$grade->level}}</option>
                                                    @empty
                                                        <option value="0">Please Create Grade</option>
                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>
                          
                      </div>
                     
          
                          <div class="row">
                      <div class="col-md-4">
                      <button type="submit" class="btn btn-primary btn-lg form-control">Filter</button>
                      </div>
                       </div>
                        </form>    
                  </div>