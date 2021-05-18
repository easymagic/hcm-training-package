<!-- Modal -->
<form method="POST" action="{{ route('interview-assessmentv2.update',[$item->id]) }}">
    <div id="edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

        {{--        modal-lg--}}

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="text-transform: uppercase;">

                    Rate/Score Candidate ({{ $candidate->name }})

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    @csrf

                    @method('PUT')

                    <input type="hidden" name="interview_assessment_id" value="{{ $item->id }}" />
                    <input type="hidden" name="candidate_id" value="{{ request('candidate') }}" />


                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Competency') }}</label>

                        <div class="col-md-12" style="border: 1px solid #ddd;background-color: #eee;padding: 12px;">
                            {{ $item->competency }}
                        </div>
                    </div>



                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Score (Max: ' . $item->max_rating . ')') }}</label>

                        <div class="col-md-12">
                            <input type="number" name="score" class="form-control" value="{{ $item->candidate_score }}" />
                        </div>

                    </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary pull-left">
                        {{ __('Submit Score') }}
                    </button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>