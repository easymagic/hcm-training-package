<!-- Modal -->
<form method="POST" action="{{ route('trainingv2.update',[$item->id]) }}">
    <div id="edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

        {{--        modal-lg--}}

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    Edit Training

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">


                    @csrf

                    @method('PUT')



                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Name') }}</label>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="name" value="{{ $item->name }}" autofocus>
                        </div>
                    </div>


                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Year') }}</label>

                        <div class="col-md-12">
                            <input  type="text" class="form-control" name="year" value="{{ $item->year }}" autofocus>

                        </div>
                    </div>


                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Cost') }}</label>

                        <div class="col-md-12">
                            <input  type="text" class="form-control" name="cost" value="{{ $item->cost }}" />
                        </div>
                    </div>


                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Is - Free?') }}</label>

                        <div class="col-md-12">
                            <input  type="checkbox" {{ $item->is_free? 'checked' : '' }}   name="is_free" value="{{ $item->is_free }}" >
                        </div>
                    </div>



                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Type') }}</label>

                        <div class="col-md-12">
                            <select name="type" class="form-control" id="">
                                <option value="">--Select---</option>
                                <option {{ $item->type == 'online'? 'selected':'' }} value="online">Online</option>
                                <option {{ $item->type == 'physical'? 'selected':'' }} value="physical">Physical</option>
                            </select>
                        </div>
                    </div>




                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Resource Link') }}</label>

                        <div class="col-md-12">
                            <input  type="text" class="form-control" name="resource_link" value="{{ $item->resource_link }}" />
                        </div>
                    </div>



                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Start Date') }}</label>

                        <div class="col-md-12">
                            <input  type="date" class="form-control" name="start_date" value="{{ $item->start_date }}" />
                        </div>
                    </div>


                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Stop Date') }}</label>

                        <div class="col-md-12">
                            <input  type="date" class="form-control" name="stop_date" value="{{ $item->stop_date }}" />
                        </div>
                    </div>



                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Select Department') }}</label>

                        <div class="col-md-12">
                            <select name="department_id" class="form-control" id="">
                                <option value="">--Select---</option>
                                @foreach ($departments as $department)
                                    <option {{ $item->department_id == $department->id? 'selected':'' }} value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <input type="hidden" name="created_by" value="{{ $item->created_by }}" />



                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary pull-left">
                        {{ __('Save') }}
                    </button>



                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
