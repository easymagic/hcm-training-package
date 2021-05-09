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
                    <h1 class="page-title">Exit Report</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('report-home')}}">Excel reports</a></li>
                        <li class="breadcrumb-item active">Exit Report</li>
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
                             <th>STAFF ID</th>
                            <th>SURNAME</th>
                           <th>FIRST NAME</th>
                           <th>GENDER</th>
                           <th>EMPLOYMENT DATE (DD/MM/YYYY)</th>
                           <th>DESIGNATION</th>
                           <th>DEPARTMENT</th>
                            <th>GRADE</th>
                            <th>LEVEL</th>
                            <th>EXIT DATE</th>
                            <th>TYPE OF RESIGNATION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($separations as $key=> $separation)
                        @php
                        $gc = explode(" ", $separation->user->name);
                      $first_name=$gc[0];
                     $middle_name=$gc[1];
                     $last_name=end($gc);
                    
                     
                        @endphp
                            <tr>
                                 <td>{{$key + 1}}</td>
                                 <td>{{$separation->user->emp_num}}</td>
                                <td>{{$last_name}}</td>
                                <td>{{$first_name}}</td>
                                <td>{{$separation->user->sex == 'M'?'Male':($separation->user->sex=='F'?'Female':'Unknown')}}</td>
                                <td>{{date('d/m/ Y', strtotime($separation->user->hiredate))}}</td>
                                <td>{{$separation->user->job?$separation->user->job->title:''}}</td>
                                <td>{{$separation->user->job?$separation->user->job->department->name:''}}</td>
                                <td>{{$separation->user->grade?$separation->user->onlygrade:''}}</td>
                                <td>{{$separation->user->grade?$separation->user->onlylevel:''}}</td>
                                <td>{{date('d/m/ Y', strtotime($separation->date_of_separation))}}</td>
                               <td>{{$separation->separation_type?$separation->separation_type->name:''}}</td>
                                
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
