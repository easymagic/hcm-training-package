@extends('layouts.master')

@section('content')

    <div class="col-md-12 post-list" style="/* margin-left: 1%; */margin-top: 25px;">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div style="
    border-bottom: 3px solid #000000;
    margin-bottom: 17px;
    font-size: 18px;
    padding: 14px;
    font-size: 21px;
    font-weight: bold;
    text-transform: uppercase;
    color: #000;
">
                        Approval For {{ $module->getNarration() }}
                    </div>

                    @include('training-budgetv2.create')

                    @foreach ($list as $item)


                        @include('training-budgetv2.edit')


                    @endforeach


                    <div class="col-md-12" align="right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="margin-bottom: 11px;" data-target="#create">Add Training Budget</button>
                    </div>

                    <table class="table table-striped">
                        <tr>
                            <th>
                                Stage
                            </th>
                            <th>
                                Approved By
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        @foreach ($list as $item)


                            <tr>

                                <td>
                                    {{ $item->stage->name }} @ Position - {{ $item->stage->position }}
                                </td>
                                <td>
                                    {{ $item->approver->blank? $item->approver->blank_name : $item->approver->name }}
                                </td>

                                <td>

                                    <a href="#" data-toggle="modal" style="margin-bottom: 11px;" data-target="#edit{{ $item->id }}" class="btn btn-sm btn-primary">Approve</a>

                                </td>
                            </tr>

                        @endforeach
                    </table>



                </div>
            </div>

            <div class="col-lg-12" style="margin: 11.4%;"></div>
        </div>


    </div>

    <div style="clear: both;">&nbsp;</div>


@endsection

@section('scripts')

    <script>
        // alert('ok');
    </script>


    @include('response-message')

@endsection