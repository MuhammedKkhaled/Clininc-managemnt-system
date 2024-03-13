@extends('layouts.master')
@section('title', "Prescriptions")
@section('css')
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> Prescription </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> / All Prescription </span>
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
                        <button id="button" class="btn btn-primary mg-b-20" data-toggle="modal" data-target="#addModal"> Add Prescription </button>
                        <table class="table table-striped  text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0"># </th>
                                <th class="wd-15p border-bottom-0">Patient Name </th>
                                <th class="wd-15p border-bottom-0">Prescription </th>
                                <th class="wd-15p border-bottom-0"></th>
                                <th class="wd-20p border-bottom-0">Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prescriptions as $prescription)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td> {{ $prescription->patient->name }}</td>
                                    <td>{{ $prescription->prescription }}</td>
                                    <td>  </td>
                                    <td>
                                        <button
                                            class="btn btn-outline-primary btn-sm"
                                            data-patient_name="{{ $prescription->patient->name }}"
                                            data-patient_id="{{ $prescription->patient_id  }}"
                                            data-prescription ="{{ $prescription->prescription}}"
                                            data-toggle="modal"
                                            data-target="#editmodal"
                                            title="edit"
                                        >
                                            Edit
                                        </button>

                                        <button type="button" class="btn btn-outline-danger btn-sm deleteAppointmentBtn" value="{{ $prescription->id }}">
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
        <!-- Add -->
        @include('prescriptions.add_modal')

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('prescriptions.destroy' , $prescription->id) }}" method="post">
                        @csrf
                        @method("delete")
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Appointment </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="prescription_id" id ="prescription_id">
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


        <!-- edit -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Prescription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editForm" method="post" action="{{ route("prescriptions.update" ,$prescription->id ) }}">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="patient_name">Patient Name:</label>
                                <select class="form-control" name="patient_id" id="patient_id">
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="prescription">Prescription:</label>
                                <textarea name="prescription" cols="20" rows="5" id="prescription" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

{{--        End Edit--}}

    </div>
    <!-- row closed -->

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

                let  prescription_id = $(this).val();

                $('#prescription_id').val(prescription_id);

                $('#deleteModal').modal('show');
            });

            $('#editmodal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var patient_id = button.data('patient_id');
                var prescription = button.data('prescription');

                // Populate data into the modal
                var modal = $(this);
                modal.find('.modal-body #patient_id').val(patient_id);
                modal.find('.modal-body #prescription').val(prescription);
            });
        });
    </script>

@endsection
