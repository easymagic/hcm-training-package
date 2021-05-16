<!-- Modal -->
<form method="POST" action="{{ route('training-userv2.store') }}">
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">

{{--        modal-lg--}}

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                Recommend Training

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">


                    @csrf



                <div class="form-group row">
                <label class="col-sm-12 col-form-label text-md-left">{{ __('Select Training') }}</label>

                        <div class="col-md-12">
                            <select name="training_id" id="" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($trainings as $training)
                                    <option value="{{ $training->id }}">{{ $training->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                <div class="form-group row">
                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Select Users') }}</label>

                    <div class="col-md-12">
                        <select name="user_ids[]" id="user_ids" class="form-control" style="width: 100%;" multiple>
                            <option value="">--Select--</option>
                            @foreach ($users as $user)
                                <option  value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>






            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary pull-left">
                    {{ __('Send Invitation') }}
                </button>



                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</form>
