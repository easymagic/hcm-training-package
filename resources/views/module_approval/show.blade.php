<!-- Modal -->
<form method="POST" action="{{ route('module-approval.update',[$item->id]) }}">
    <div id="show{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

        {{--        modal-lg--}}

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    Approve Stage

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">


                    @csrf
                    @method('PUT')


                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Action') }}</label>

                        <div class="col-md-12">

                            <select name="action" class="form-control" id="">

                                <option value="">--Select Action--</option>
                                <option value="approve">Approve</option>
                                <option value="reject">Reject</option>

                            </select>


                        </div>
                    </div>



                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Comments') }}</label>

                        <div class="col-md-12">

                            <textarea name="comments" id="" class="form-control" cols="30" rows="10">{{ $item->comments }}</textarea>


                        </div>

                    </div>

                    <input type="hidden" name="approver_id" value="{{ Auth::user()->id }}" />
                    <input type="hidden" name="module" value="{{ $item->module }}" />
                    <input type="hidden" name="module_id" value="{{ $item->module_id }}" />


                </div>
                <div class="modal-footer">

                    @if ($item->status == 0)

                    <button type="submit" class="btn btn-primary pull-left">
                        {{ __('Submit') }}
                    </button>

                    @endif



                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
