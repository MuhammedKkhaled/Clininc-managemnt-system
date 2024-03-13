@extends('layouts.master')
@section('title', "Diagnoses")
@section('css')
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Diagnose</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Diagnoses</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- Modal -->

    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <button id="button" class="btn btn-primary mg-b-20" data-toggle="modal" data-target="#addModal">Add Diagnose</button>
                        <table class="table table-striped  text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0"># </th>
                                <th class="wd-15p border-bottom-0">Patient Name </th>
                                <th class="wd-15p border-bottom-0">First Diagnose</th>
                                <th class="wd-15p border-bottom-0">Final Diagnose</th>
                                <th class="wd-20p border-bottom-0">Medical History </th>
                                <th class="wd-20p border-bottom-0">Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($diagnoses as $diagnose)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $diagnose->patient->name }}</td>
                                    <td>{{ $diagnose->first_diagnose }}</td>
                                    <td>{{ $diagnose->final_diagnose }}</td>
                                    <td>{{ $diagnose->history}}</td>
                                    <td>{{ $diagnose->patient->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger btn-sm deleteAppointmentBtn" value="{{ $diagnose->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    <!-- Add -->
    @include("diagnoses.add_modal")
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{  route("diagnoses.destroy" , $diagnose->id) }}" method="post">
                    @csrf
                    @method("delete")
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Appointment </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="diagnose_id" id ="diagnose_id">
                        <h5>
                            Are You sure to delete this Appointment
                        </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End Add -->


    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>

    <script>
        $(document).ready(function (){
            $('.deleteAppointmentBtn').click(function (e){

                e.preventDefault();

                let  diagnose_id = $(this).val();

                $('#diagnose_id').val(diagnose_id);

                $('#deleteModal').modal('show');
            });
        });
    </script>

@endsection
