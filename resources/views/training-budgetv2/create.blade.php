<!-- Modal -->
<form method="POST" action="{{ route('training-budgetv2.store') }}">
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">

{{--        modal-lg--}}

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                Create Training Budget

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">


                    @csrf


                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Year') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="text" class="form-control" name="year" value="{{ date('Y') }}" autofocus>

                        </div>
                    </div>


                <div class="form-group row">

                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Amount') }}</label>

                    <div class="col-md-12">

                        <input id="email" type="text" class="form-control" name="amount" value="" autofocus>

                    </div>
                </div>





            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary pull-left">
                    {{ __('Submit') }}
                </button>



                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</form>
