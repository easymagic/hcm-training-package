<!-- Modal -->
<form method="POST" action="{{ route('workflow.store') }}">
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">

{{--        modal-lg--}}

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                Create Workflow

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">


                    @csrf


                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('WorkFlow Name') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="text" class="form-control" name="name" value="" autofocus>

                        </div>
                    </div>






            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary pull-left">
                    {{ __('Create Workflow') }}
                </button>



                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</form>
