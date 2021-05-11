<!-- Modal -->
<form method="POST" action="{{ route('trainingv2.store') }}">
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">

{{--        modal-lg--}}

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                Create Training

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">


                    @csrf



                <div class="form-group row">

                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Name') }}</label>

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name" value="" autofocus>

                    </div>
                </div>


                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Year') }}</label>

                        <div class="col-md-12">
                            <input  type="text" class="form-control" name="year" value="{{ date('Y') }}" autofocus>

                        </div>
                    </div>


                <div class="form-group row">

                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Cost') }}</label>

                    <div class="col-md-12">
                        <input  type="text" class="form-control" name="cost" value="" />
                    </div>
                </div>


                <div class="form-group row">

                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Is - Free?') }}</label>

                    <div class="col-md-12">
                        <input  type="checkbox"   name="is_free" value="1" >
                    </div>
                </div>



                <div class="form-group row">

                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Type') }}</label>

                    <div class="col-md-12">
                        <select name="type" class="form-control" id="">
                            <option value="">--Select---</option>
                            <option value="online">Online</option>
                            <option value="phuysical">Physical</option>
                        </select>
                    </div>
                </div>




                <div class="form-group row">

                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Resource Link') }}</label>

                    <div class="col-md-12">
                        <input  type="text" class="form-control" name="resource_link" value="" />
                    </div>
                </div>



                <div class="form-group row">

                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Start Date') }}</label>

                    <div class="col-md-12">
                        <input  type="date" class="form-control" name="start_date" value="" />
                    </div>
                </div>


                <div class="form-group row">

                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Stop Date') }}</label>

                    <div class="col-md-12">
                        <input  type="date" class="form-control" name="stop_date" value="" />
                    </div>
                </div>



                <div class="form-group row">

                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Select Department') }}</label>

                    <div class="col-md-12">
                        <select name="department_id" class="form-control" id="">
                            <option value="">--Select---</option>
                            @foreach ($departments as $department)
                              <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}" />



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
