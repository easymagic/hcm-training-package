<!-- Modal -->
<form method="POST" action="{{ route('interview-assessmentv2.store') }}">
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">

{{--        modal-lg--}}

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                Add Interview Question

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">


                    @csrf


                <input type="hidden" name="interview_id" value="{{ $interview->id }}" />


                <div class="form-group row">
                <label class="col-sm-12 col-form-label text-md-left">{{ __('Competency') }}</label>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="competency" />
                        </div>
                    </div>



                <div class="form-group row">

                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Max-Rating') }}</label>

                    <div class="col-md-12">
                        <input type="number" name="max_rating" class="form-control" />
                    </div>

                </div>


            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary pull-left">
                    {{ __('Add Interview Question') }}
                </button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</form>