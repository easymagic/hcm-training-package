<!-- Modal -->
<form method="POST" action="{{ route('training-userv2.update',[$item->id]) }}" enctype="multipart/form-data">

    <div id="edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

        {{--        modal-lg--}}

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    Feedback

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">


                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Feedback') }}</label>

                        <div class="col-md-12">
                            <textarea name="feedback" id="" class="form-control">{{ $item->feedback }}</textarea>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Select Rating') }}</label>

                        <div class="col-md-12">
                            <select name="rating" id="" class="form-control">
                                <option {{ $item->rating == ''? 'selected':'' }} value="">--Select--</option>
                                <option {{ $item->rating == '1'? 'selected':'' }} value="1">1 Star</option>
                                <option {{ $item->rating == '2'? 'selected':'' }} value="2">2 Stars</option>
                                <option {{ $item->rating == '3'? 'selected':'' }} value="3">3 Stars</option>
                                <option {{ $item->rating == '4'? 'selected':'' }} value="4">4 Stars</option>
                                <option {{ $item->rating == '5'? 'selected':'' }} value="5">5 Stars</option>
                            </select>
                        </div>
                    </div>




                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Upload Supporting Document') }}</label>

                        <div class="col-md-12">
                            <input type="file" name="document_upload" />
                        </div>

                        @if (!empty($item->document_upload))
                            <div>
                                <a href="{{ asset('uploads/' . $item->document_upload) }}">Download attachement</a>
                            </div>
                        @endif
                    </div>



                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary pull-left">
                        {{ __('Submit Feedback') }}
                    </button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
