@extends('layouts.master')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
    <link href="{{ asset('global/vendor/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('global/vendor/bootstrap-table/bootstrap-table.css') }}">
    <style type="text/css">
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            text-align: center;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
            background: #333;
        }


    </style>
@endsection
@section('content')
    <div class="page ">
        <div class="page-header">
            <h1 class="page-title">Excel Reports</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Excel Reports</li>
            </ol>
            <div class="page-header-actions">

            </div>
        </div>
        <div class="page-content container-fluid">
            <div class="example">
                <div class="nav-tabs-horizontal nav-tabs-inverse" data-plugin="tabs">
                    <ul class="nav nav-tabs nav-tabs-solid" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-toggle="tab" href="#masterFileTab" aria-controls="masterFileTab" role="tab">
                                <i class="icon md-accounts" aria-hidden="true"></i>
                                Master File
                            </a>
                        </li>
                        <!--<li class="nav-item" role="presentation">-->
                        <!--  <a class="nav-link" data-toggle="tab" href="#recruitmentTab" aria-controls="recruitmentTab" role="tab">-->
                        <!--  <i class="icon md-accounts-add" aria-hidden="true"></i>-->
                        <!--  Recruitment-->
                        <!--</a>-->
                        <!--</li>-->
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-toggle="tab" href="#exitsTab" aria-controls="exitsTab" role="tab">
                                <i class="fa fa-user-times" aria-hidden="true"></i>
                                Exits
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-toggle="tab" href="#leaveTab" aria-controls="leaveTab" role="tab">
                                <i class="icon md-calendar-check" aria-hidden="true"></i>
                                Leave
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-toggle="tab" href="#performanceTab" aria-controls="performanceTab" role="tab">
                                <i class="icon md-settings" aria-hidden="true"></i>
                                Performance Management
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-toggle="tab" href="#promotionTab" aria-controls="promotionTab" role="tab">
                                <i class="icon md-settings" aria-hidden="true"></i>
                                Promotion
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pt-15">
                        @include('reports.partials.masterfile')
                        @include('reports.partials.exit')
                        @include('reports.partials.promotion')

                        <div class="tab-pane" id="exampleIconifiedTabsThree" role="tabpanel">Pariatur consequat tempor excepteur quis eu deserunt. Dolor non
                            excepteur laborum dolore exercitation non tempor laborum. Qui
                            incididunt ex ullamco minim duis nostrud velit ipsum reprehenderit.
                            Irure qui sint fugiat occaecat proident anim. Dolor ea exercitation
                            ut cillum proident nulla voluptate pariatur ex. Enim ad dolor
                            Lorem qui. Ad officia laborum officia pariatur est dolore quis
                            esse ipsum.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('global/js/Plugin/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('global/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('global/vendor/bootstrap-table/bootstrap-table.min.js')}}"></script>
    <script src="{{asset('global/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.js')}}"></script>
    <script src="{{asset("js/countries.js")}}"></script>
    {{-- <script language="javascript">
             populateCountries("country", "state");
         </script> --}}
    <script type="text/javascript">


        $(document).ready(function() {
            //date picker initialization
            $('.datepicker').datepicker();
            $('.input-daterange').datepicker({
                format: 'yyyy-mm-dd',

                autoclose: true,
                closeOnDateSelect: true
            }).datepicker("setDate", 'now');
            $('.selector').select2();
            //function for picture change
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function(){
                readURL(this);
            });


            $(document).on('submit', '#emp-data', function(event) {
                event.preventDefault();
                var form = $(this);
                var formdata = false;
                if (window.FormData){
                    formdata = new FormData(form[0]);
                }
                // console.log(formdata);
                // return;
                //var formAction = form.attr('action');
                $.ajax({
                    url         : '{{url('users')}}',
                    data        : formdata ? formdata : form.serialize(),
                    cache       : false,
                    contentType : false,
                    processData : false,
                    type        : 'POST',
                    success     : function(data, textStatus, jqXHR){
                        toastr["success"]("Changes saved successfully",'Success');
                    },
                    error:function(data, textStatus, jqXHR){

                        jQuery.each( data['responseJSON'], function( i, val ) {

                            jQuery.each( val, function( i, valchild ) {

                                toastr["error"](valchild[0]);

                            });

                        });
                        console.log(textStatus);
                        console.log(jqXHR);
                    }
                });

            });
            //submit form on button click
            $(document).on('click', '#datasave', function(e) {

                // document.getElementById("emp-data");
                toastr.info('Processing ...','Info',{timeOut: 0,closeButton: true,extendedTimeOut:0 });
                var form = document.getElementById("emp-data");
                var formdata = false;
                if (window.FormData){
                    formdata = new FormData(form[0]);
                    console.log(formdata);
                }
                // console.log(formdata);
                // return
                //var formAction = form.attr('action');
                $.ajax({
                    url         : '{{url('users')}}',
                    data        : formdata ? formdata : form.serialize(),
                    cache       : false,
                    contentType : false,
                    processData : false,
                    type        : 'POST',
                    success     : function(data, textStatus, jqXHR){
                        toastr["success"]("Changes saved successfully",'Success');
                    },
                    error:function(data, textStatus, jqXHR){

                        jQuery.each( data['responseJSON'], function( i, val ) {

                            jQuery.each( val, function( i, valchild ) {

                                toastr["error"](valchild[0]);

                            });

                        });
                        console.log(data);
                        console.log(textStatus);
                        console.log(jqXHR);
                    }
                });

            });

        });



























        //   function changeLgas(state_id){
        //     $.get('{{ url('/userprofile/lgas') }}/',{ state_id: state_id },function(data){
        //     $('#lga').html();
        //   jQuery.each( data, function( i, val ) {

        //      $("#lga").append($('<option>', {value:val.id, text:val.name}));
        //      // console.log(val.name);
        //             });
        // });
        //   }
        var country=$('#country').val();
        var state=$('#state').val();
        $('#country').select2({
            ajax: {
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                url: function (params) {
                    return '{{url('location/country')}}';
                }
            }
        });
        $('#state').select2({
            ajax: {
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                url: function (country) {
                    return '{{url('location/state')}}/'+$('#country').val();
                }
            }
        });
        $('#lga').select2({
            ajax: {
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                url: function (state) {
                    return '{{url('location/lga')}}/'+$('#state').val();
                }
            },
            tags: true
        });
        $('#separation_type').select2({
            ajax: {
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                url: function () {
                    return '{{url('separation/separation_types')}}/';
                }
            },
            tags: true
        });
        $('#suspension_type').select2({
            ajax: {
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                url: function () {
                    return '{{url('separation/suspension_types')}}/';
                }
            },
            tags: true
        });


        @if(Auth::user()->role->permissions->contains('constant', 'manage_user'))
        $(function() {
            $(document).on('submit','#addSeparationForm',function(event){
                event.preventDefault();
                var form = $(this);
                var formdata = false;
                if (window.FormData){
                    formdata = new FormData(form[0]);
                }
                $.ajax({
                    url         : '{{route('separation.store')}}',
                    data        : formdata ? formdata : form.serialize(),
                    cache       : false,
                    contentType : false,
                    processData : false,
                    type        : 'POST',
                    success     : function(data, textStatus, jqXHR){

                        if(data=='success'){
                            toastr.success("User has been designated as separated successfully",'Success');
                            $('#addSeparationModal').modal('toggle');
                            location.reload();
                        }
                        if(data=='failed'){
                            toastr.error("You have no set the HireDate",'Wrong Hire date');
                        }


                    },
                    error:function(data, textStatus, jqXHR){
                        jQuery.each( data['responseJSON'], function( i, val ) {
                            jQuery.each( val, function( i, valchild ) {
                                toastr.error(valchild[0]);
                            });
                        });
                    }
                });

            });

        });
        @endif
        function departmentChange(department_id){
            event.preventDefault();
            $.get('{{ url('/users/department/jobroles') }}/'+department_id,function(data){


                if (data.jobs=='') {
                    $("#employee-jobroles").empty();
                    $('#employee-jobroles').append($('<option>', {value:0, text:'Please Create a Jobrole in Department'}));
                }else{
                    $("#employee-jobroles").empty();
                    $('#employee-jobroles').append($('<option>', {value:0, text:'Please Select a Jobrole'}));
                    jQuery.each( data.jobroles, function( i, val ) {
                        $('#employee-jobroles').append($('<option>', {value:val.id, text:val.title}));
                    });
                }

            });
        }
        function exitDepartmentChange(department_id){
            event.preventDefault();
            $.get('{{ url('/users/department/jobroles') }}/'+department_id,function(data){


                if (data.jobs=='') {
                    $("#exit-jobroles").empty();
                    $('#exit-jobroles').append($('<option>', {value:0, text:'Please Create a Jobrole in Department'}));
                }else{
                    $("#exit-jobroles").empty();
                    $('#exit-jobroles').append($('<option>', {value:0, text:'Please Select a Jobrole'}));
                    jQuery.each( data.jobroles, function( i, val ) {
                        $('#exit-jobroles').append($('<option>', {value:val.id, text:val.title}));
                    });
                }

            });
        }
        function promotionDepartmentChange(department_id){
            event.preventDefault();
            $.get('{{ url('/users/department/jobroles') }}/'+department_id,function(data){


                if (data.jobs=='') {
                    $("#promotion-jobroles").empty();
                    $('#promotion-jobroles').append($('<option>', {value:0, text:'Please Create a Jobrole in Department'}));
                }else{
                    $("#promotion-jobroles").empty();
                    $('#promotion-jobroles').append($('<option>', {value:0, text:'Please Select a Jobrole'}));
                    jQuery.each( data.jobroles, function( i, val ) {
                        $('#promotion-jobroles').append($('<option>', {value:val.id, text:val.title}));
                    });
                }

            });
        }

    </script>

@endsection