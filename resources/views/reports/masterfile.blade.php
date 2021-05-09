@extends('layouts.master')
@section('stylesheets')

    <link rel="stylesheet" href="{{ asset('assets/examples/css/apps/mailbox.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div>
        <div class="page bg-white">
          
            <div class="page-main">
                <!-- Mailbox Header -->
                <div class="page-header">
                    <h1 class="page-title">Master Data</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('report-home')}}">Excel reports</a></li>
                        <li class="breadcrumb-item active">Master Data</li>
                      </ol>
                    <div class="page-header-actions">


                    </div>
                </div>
                <!-- Mailbox Content -->
                <div class="page-content container-fluid" data-plugin="asSelectable">
                    <!-- Actions -->
                    <div class='table-responsive'>
            
                    <table id="data_table" class="table">
                        <thead>
                        <tr>
                            <th>S/N</th></th>
                             <th>EMPLOYEE NO</th>
                            <th>SURNAME</th>
                           <th>FIRST NAME</th>
                           <th>GENDER</th>
                           <th>DOB (DD/MM/YYYY)</th>
                           <th>AGE</th>
                           <th>STATE OF ORIGIN</th>
                           <th>EMPLOYMENT DATE (DD/MM/YYYY)</th>
                           <th>DESIGNATION</th>
                           <th>DEPARTMENT</th>
                            <th>GRADE</th>
                            <th>LEVEL</th>
                            <th>PERMANENT/CONTRACT/INTERN</th>
                            <th>UNION/NON UNION</th>
                            <th>PHONE NUMBER</th>
                            <th>EMAIL ADDRESS</th>
                            <th>ANNUAL GROSS</th>
                            <th>MONTHLY GROSS</th>
                            <th>ACADEMIC QUALIFICATION 1</th>
                            <th>ACADEMIC QUALIFICATION 1</th>
                            <th>PROFESSIONAL QUALIFICATION</th>
                            <th>LOCATION</th>
                            <th>MARITAL STATUS</th>
                            <th>NUMBER OF CHILDREN</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=> $user)
                        @php
                        $gc = explode(" ", $user->name);
                        
                      $first_name=isset($gc[0])?$gc[0]:'';
                     $middle_name=isset($gc[1])?$gc[1]:'';
                     $last_name=end($gc);
                     $years = \Carbon\Carbon::parse($user->dob)->age;
                     $monthly_gross=0;
                     $annual_gross=0;
                     if($user->payroll_type=='office' && $user->grade!=null){
                     $monthly_gross=$user->grade->basic_pay;
                     $annual_gross= $user->grade->basic_pay*12;
                     }
                        @endphp
                            <tr>
                                 <td>{{$key + 1}}</td>
                                 <td>{{$user->emp_num}}</td>
                                <td>{{$last_name}}</td>
                                <td>{{$first_name}}</td>
                                <td>{{$user->sex == 'M'?'Male':($user->sex=='F'?'Female':'Unknown')}}</td>
                                <td>{{date('d/m/ Y', strtotime($user->dob))}}</td>
                                <td>{{$years}}</td>
                                <td>{{$user->state?$user->state->name:''}}</td>
                                <td>{{date('d/m/ Y', strtotime($user->hiredate))}}</td>
                                <td>{{$user->job?$user->job->title:''}}</td>
                                <td>{{$user->job?$user->job->department->name:''}}</td>
                                <td>{{$user->grade?$user->onlygrade:''}}</td>
                                <td>{{$user->grade?$user->onlylevel:''}}</td>
                                <td></td>
                               <td>{{$user->union?$user->union->name:'NON UNION'}}</td>
                               <td>{{$user->phone}}</td>
                               <td>{{$user->email}}</td>
                               <td>{{round($annual_gross,0)}}</td>
                               <td>{{round($monthly_gross,2)}}</td>
                                
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{$user->branch?$user->branch->name:''}}</td>
                                <td>{{$user->marital_status}}</td>
                               <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Label Form -->
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/App/Mailbox.js')}}"></script>
    <script type="text/javascript" src="{{ asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- <script src="{{ asset('assets/examples/js/apps/mailbox.js')}}"></script> -->
    <script>
        $(document).ready(function() {
            $('.input-daterange').datepicker({
                autoclose: true,
                format:'yyyy-mm-dd'
            });
        });
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script type="text/javascript">
    	 	$('#data_table thead tr').clone(true).appendTo( '#data_table thead' );
    $('#data_table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

       var table= $("#data_table").DataTable( {
// "aoColumnDefs": [
//       { "bSearchable": false, "aTargets": [ -2, -1 ] },
//       { "bSortable": false, "aTargets": [ -1 ] }
//     ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print',{
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A1'
            }
            ]
        });
         $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );

        function fnSubmit(arg)
        {
            $("#successor_id").val(arg);
            $("#update_form").submit();
        }

        function deleteEmployee($id){
            // deleteEmployee
        }

    </script>
@endsection
