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
                        Setup Interview
                    </div>

                    @include('interviewv2.create')

                    @foreach ($interviews as $item)


                        @include('interviewv2.edit')


                    @endforeach


                    <div class="col-md-12" align="right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="margin-bottom: 11px;" data-target="#create">Add Interview</button>
                    </div>


                    <div class="col-md-12" align="left" style="padding: 0;">

                        <form action="?" method="get">
                            <input value="{{ request()->filled('name_search')?  request('name_search') : '' }}" type="text" name="name_search" placeholder="Search Interview" style="margin-bottom: 11px;" />
                        </form>
                    </div>

                    <table class="table table-striped">
                        <tr>
                            <th>
                                Job Role
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Interviewer
                            </th>
                            <th style="text-align: right;">
                                Actions
                            </th>
                        </tr>
                        @foreach ($interviews as $item)


                            <tr>

                                <td>
                                    {{ $item->job_role_id }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->interviewer_user->email }}
                                </td>
                                <td style="text-align: right;">

                                    <a type="button" data-toggle="modal" style="margin-bottom: 11px;color: #fff;" data-target="#edit{{ $item->id }}" class="btn btn-sm btn-primary">Edit</a>



                                    <form style="display: inline-block" method="post" onsubmit="return confirm('Do you want to confirm this action?')" action="{{ route('interviewv2.destroy',$item->id) }}">

                                        @csrf
                                        @method('DELETE')

                                        <button style="position: relative;top: -6px;" type="submit" class=" btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove</button>

                                    </form>


                                </td>
                            </tr>

                        @endforeach
                    </table>

{{--                    {{ $list->links() }}--}}


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

                setTimeout(()=>{
                    $('#user_ids').select2();
                },1000);


            });
        })(jQuery);


        //


    </script>

    @include('response-message')

@endsection