<!-- Modal -->
<form method="POST" action="{{ route('interviewv2.update',[$item->id]) }}">
    <div id="edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

        {{--        modal-lg--}}

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    Edit Interview

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">


                    @csrf
                    @method('PUT')



                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Select Job Role') }}</label>

                        <div class="col-md-12">
                            <select name="job_role_id" id="" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($job_roles as $job_role)
                                    <option {{ $item->job_role_id == $job_role->id? 'selected':'' }} value="{{ $job_role->id }}">{{ $job_role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Interview Name') }}</label>

                        <div class="col-md-12">
                            <input type="text" name="name" class="form-control" value="{{ $item->name }}" />
                        </div>

                    </div>

                    <input type="hidden" name="interviewer" value="{{ $item->interviewer }}" />


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary pull-left">
                        {{ __('Save Interview') }}
                    </button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
