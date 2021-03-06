<div class="modal fade in modal-3d-flip-horizontal modal-info" id="addConfirmationRequirementModal" aria-hidden="true" aria-labelledby="addCOnfirmationRequirementModal" role="dialog" tabindex="-1">
    <div class="modal-dialog ">
        <form class="form-horizontal" id="addConfirmationRequirementForm"  method="POST">
            <div class="modal-content">
                <div class="modal-header" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="training_title">Add Confirmation Request</h4>
                </div>
                <div class="modal-body">
                    <div class="row row-lg col-xs-12">
                        <div class="col-xs-12">
                            @csrf
                            <div class="form-group">
                                <h4 class="example-title">Name</h4>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <h4 class="example-title">Compulsory</h4>
                                <select name="compulsory" id="compulsory" class="form-control" required>

                                        <option value="1">Yes</option>
                                    <option value="0">No</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <h4 class="example-title">For Approval</h4>
                                <select name="is_approval_requirement" id="is_approval_requirement" class="form-control" required>

                                    <option value="1">Yes</option>
                                    <option value="0">No</option>

                                </select>
                            </div>
                        </div>
                        <div class="clearfix hidden-sm-down hidden-lg-up"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-xs-12">

                        <div class="form-group">
                            <input type="hidden" name="type" value="save_confirmation_requirement">
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
