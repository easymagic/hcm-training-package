<!-- Modal -->
<form method="POST" action="{{ route('interviewv2.store') }}">
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">

{{--        modal-lg--}}

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                Add Interview

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">


                    @csrf



                <div class="form-group row">
                <label class="col-sm-12 col-form-label text-md-left">{{ __('Select Job Role') }}</label>

                        <div class="col-md-12">
                            <select name="job_role_id" id="" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($job_roles as $job_role)
                                    <option value="{{ $job_role->id }}">{{ $job_role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                <div class="form-group row">

                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Interview Name') }}</label>

                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control" />
                    </div>

                </div>

                <input type="hidden" name="interviewer" value="{{ Auth::user()->id }}" />


            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary pull-left">
                    {{ __('Add Interview') }}
                </button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</form>
