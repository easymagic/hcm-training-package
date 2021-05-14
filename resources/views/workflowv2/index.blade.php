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
">
                        Organizational Trainings
                    </div>

                    @include('trainingv2.create')

                    @foreach ($list as $item)


                        @include('trainingv2.edit')


                    @endforeach


                    <div class="col-md-12" align="right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="margin-bottom: 11px;" data-target="#create">Add Training</button>
                    </div>

                    <table class="table table-striped">
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Year
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Cost
                            </th>
                            <th>
                                Status
                            </th>
                            <th  style="text-align: right;">
                                Actions
                            </th>
                        </tr>
                        @foreach ($list as $item)


                            <tr>

                                <td>
                                    {{ $item->name }}
                                </td>

                                <td>
                                    {{ $item->year }}
                                </td>

                                <td>
                                    {{ $item->type }}
                                </td>

                                <td>
                                    {{ $item->cost }}
                                </td>
                                <td>
                                    {{ $item->approved_name }}
                                </td>

                                <td align="right" style="text-align: right;">


                                    <a  target="_blank" href="{{ route('module-approval.show',[$item->id]) }}?module={{ base64_encode(\App\Models\TrainingV2::class) }}"  style="margin-bottom: 11px;"  class="btn btn-sm btn-success">Approvals</a>

                                    <a  type="button" data-toggle="modal" style="margin-bottom: 11px;" data-target="#edit{{ $item->id }}" class="btn btn-sm btn-warning" data-backdrop="false">Modify</a>

                                    <form style="display: inline-block;position: relative;top: -6px;" method="post" onsubmit="return confirm('Do you want to confirm this action?')" action="{{ route('trainingv2.destroy',$item->id) }}">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove</button>

                                    </form>


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