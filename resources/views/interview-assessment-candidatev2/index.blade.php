@extends('layouts.master')

@section('content')

    <div class="col-lg-12 post-list" style="margin-top: 21px;">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div style="
    border-bottom: 3px solid #000000;
    margin-bottom: 17px;
    font-size: 18px;
">
                      Assessment For Candidate ({{ $interview->name }})
                    </div>

{{--                    @include('interview-assessmentv2.create')--}}

                    @foreach ($list as $item)


                        @include('interview-assessment-candidatev2.edit')


                    @endforeach


{{--                    <div class="col-md-12" align="right">--}}
{{--                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="margin-bottom: 11px;" data-target="#create">Add Interview Question</button>--}}
{{--                    </div>--}}


                    <div class="col-md-12" align="left" style="padding: 0;">

                        <form action="?" method="get">

                            <select name="job_role" id="job_role" style="margin-bottom: 11px;">
                                <option>--Select Job Role--</option>
                                @foreach ($job_roles as $job_role)
                                    <option
                                            {{ (request()->filled('job_role') && request('job_role') == $job_role->id)? 'selected':'' }}
                                            value="{{ $job_role->id }}">{{ $job_role->name }}</option>
                                @endforeach
                            </select>


                            <select name="candidate" id="candidate" style="margin-bottom: 11px;">
                                <option>--Select Candidate--</option>
                                @foreach ($candidates as $candidate)
                                    <option
                                            {{ (request()->filled('candidate') && request('candidate') == $candidate->id)? 'selected' : '' }}
                                            value="{{ $candidate->id }}">{{ $candidate->name }}</option>
                                @endforeach
                            </select>




                        </form>
                    </div>

                    <table class="table table-striped">
                        <tr>
                            <th>
                                Competency
                            </th>
                            <th>
                                Max-Rating
                            </th>
                            <th>
                                Score
                            </th>
                            <th style="text-align: right;">
                                Actions
                            </th>
                        </tr>
                        @foreach ($list as $item)


                            <tr>

                                <td>
                                    {{ $item->competency }}
                                </td>
                                <td>
                                    {{ $item->max_rating }}%
                                </td>
                                <td>
                                    {{ $item->candidate_score }}%
                                </td>
                                <td style="text-align: right;">


                                    <a type="button" data-toggle="modal" style="margin-bottom: 11px;color: #fff;" data-target="#edit{{ $item->id }}" class="btn btn-sm btn-warning">Score Candidate</a>


                                </td>
                            </tr>

                        @endforeach
                    </table>

{{--                    {{ $list->links() }}--}}

                    <div class="col-md-12">
                        <b>
                            Total Score :
                        </b>{{ number_format($total_score,2) }} %
                    </div>


                </div>
            </div>

            <div class="col-lg-12" style="margin: 11.4%;"></div>
        </div>


    </div>

    <div style="clear: both;">&nbsp;</div>


@endsection


@section('scripts')

    <script>
        // alert(1);
        (function($){
            $(function(){


                $('#candidate').on('change',function(){
                    var id = $(this).val();
                    location.href = `{{ route('interview-assessment-candidatev2.show',[$id]) }}?candidate=${id}&job_role=${$('#job_role').val()}`;
                });

                setTimeout(()=>{
                    // $('#user_ids').select2();
                },1000);

                $('#job_role').on('change',function(){

                    var id = $(this).val();
                    location.href = `{{ route('interview-assessment-candidatev2.show',[$id]) }}?job_role=${id}`;

                });


            });
        })(jQuery);


        //


    </script>

    @include('response-message')

@endsection