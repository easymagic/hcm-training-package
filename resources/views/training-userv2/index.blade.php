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
                        Recommend Training
                    </div>

                    @include('training-userv2.create')

                    @foreach ($list as $item)


                        @include('training-userv2.edit')


                    @endforeach


                    <div class="col-md-12" align="right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="margin-bottom: 11px;" data-target="#create">Recommend Training</button>
                    </div>


                    <div class="col-md-12" align="left" style="padding: 0;">

                        <form action="?" method="get">
                            <input type="text" name="user" placeholder="Search User By E-mail" style="margin-bottom: 11px;" />
                        </form>
                    </div>

                    <table class="table table-striped">
                        <tr>
                            <th>
                                Training
                            </th>
                            <th>
                                Candidate
                            </th>
                            <th>
                                E-mail
                            </th>
                            <th>
                                Invitation Status
                            </th>
                            <th style="text-align: right;">
                                Actions
                            </th>
                        </tr>
                        @foreach ($list as $item)


                            <tr>

                                <td>
                                    {{ $item->training->name }}
                                </td>
                                <td>
                                    {{ $item->user->name }}
                                </td>
                                <td>
                                    {{ $item->user->email }}
                                </td>
                                <td>
                                    {{ $item->accepted_name }}
                                </td>

                                <td style="text-align: right;">

                                    <a  type="button" data-toggle="modal" style="margin-bottom: 11px;color: #fff;" data-target="#edit{{ $item->id }}" class="btn btn-sm btn-primary">View Detail</a>

                                    <form style="display: inline-block" method="post" onsubmit="return confirm('Do you want to confirm this action?')" action="{{ route('training-userv2.destroy',$item->id) }}">

                                        @csrf
                                        @method('DELETE')

                                        <button style="position: relative;top: -6px;" type="submit" class=" btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove</button>

                                    </form>



                                </td>
                            </tr>

                        @endforeach
                    </table>

                    {{ $list->links() }}


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