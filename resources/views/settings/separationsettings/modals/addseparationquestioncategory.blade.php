<div class="modal fade in modal-3d-flip-horizontal modal-info" id="addSeparationTypeModal" aria-hidden="true" aria-labelledby="addSeparationTypeModal" role="dialog" tabindex="-1">
    <div class="modal-dialog ">
        <form class="form-horizontal" id="addSeparationTypeForm"  method="POST">
            <div class="modal-content">
                <div class="modal-header" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="training_title">Add Separation Type</h4>
                </div>
                <div class="modal-body">
                    <div class="row row-lg col-xs-12">
                        <div class="col-xs-12">
                            @csrf
                            <div class="form-group">
                                <h4 class="example-title">Name</h4>
                                <input type="text" name="name" class="form-control" >
                            </div>


                            <div class="form-group">
                                <h4 class="example-title">Workflow</h4>
                                <select name="workflow_id" id="workflow_id" class="form-control" required>
                                  <option value="">Select  Workflow</option>
                                  @foreach($workflows as $workflow)
                                  <option value="{{$workflow->id}}">{{$workflow->name}}</option>
                                  @endforeach
                              </select>
                          </div>

                          <input type="hidden" value="save_separation_type" name="type">
                      </div>
                      <div class="clearfix hidden-sm-down hidden-lg-up"></div>
                  </div>
              </div>
              <div class="modal-footer">
                <div class="col-xs-12">

                    <div class="form-group">

                        <button type="submit" class="btn btn-info pull-left">Save</button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                    </div>
                    <!-- End Example Textarea -->
                </div>
            </div>
        </div>
    </form>
</div>
</div>
