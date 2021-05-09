@extends('layouts.main')

@section('content')

    <div class="col-lg-10 post-list" style="@yield('main-center-style','margin-left: 1%;');">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div style="
    border-bottom: 3px solid #000000;
    margin-bottom: 17px;
    font-size: 18px;
">
                        Workflows
                    </div>

                    @include('workflow.create')

                    @foreach ($workflows as $item)


                        @include('workflow.edit')


                    @endforeach


                    <div class="col-md-12" align="right">
                        <a style="margin-bottom: 11px;" href="{{ route('workflow-stages.index') }}" class="btn btn-sm btn-info">
                            Workflow-Stages
                        </a>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="margin-bottom: 11px;" data-target="#create">Add Workflow</button>
                    </div>

                    <table class="table table-striped">
                        <tr>
                            <th>
                                Workflow-Name
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        @foreach ($workflows as $item)


                            <tr>

                                <td>
                                    {{ $item->name }}
                                </td>

                                <td>
                                    <div class="dropdown show">
                                        <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Action
                                        </button>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">


                                            <a  type="button" data-toggle="modal" style="margin-bottom: 11px;" data-target="#edit{{ $item->id }}" class="dropdown-item" data-backdrop="false">Modify</a>

                                            <form method="post" onsubmit="return confirm('Do you want to confirm this action?')" action="{{ route('workflow.destroy',$item->id) }}">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove</button>

                                            </form>

                                            <a style="margin-bottom: 11px;" href="{{ route('workflow-stages.index') }}?workflow_id={{ $item->id }}" target="_blank" class="dropdown-item">Stages</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </table>



                </div>
            </div>

            <div class="col-lg-12" style="margin: 11.4%;"></div>
        </div>


    </div>


@endsection
