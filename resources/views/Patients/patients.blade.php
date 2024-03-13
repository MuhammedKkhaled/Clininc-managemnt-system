@extends('layouts.master')
@section("title", "Patients")
@section('css')
    <link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Patients </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Patients</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <button id="button" class="btn btn-primary mg-b-20" data-toggle="modal" data-target="#addModal">Add Patient</button>
                        <table id="example-delete" class="table table-striped text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Main Phone Number </th>
                                <th> Gender </th>
                                <th>Start date</th>
                                <th> Actions </th>
                                <th>Second Phone Number </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($patients as $patient)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->age }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ $patient->gender == 2 ? "Male": "Female" }}</td>
                                <td>{{ $patient->created_at->format('Y-m-d h:i:s') }}</td>
                                <td>
                                    <a class="btn btn-outline-primary btn-sm update_patient_form"
                                       style="color: white"
                                       data-toggle="modal"
                                       data-target="#updateModal"
                                       data-id="{{ $patient->id }}"
                                       data-name="{{ $patient->name }}"
                                       data-age="{{ $patient->age }}"
                                       data-phone="{{ $patient->phone }}"
                                       data-gender="{{ $patient->gender }}"
                                       data-phone2="{{ $patient->phone2 }}"
                                       href=""
                                    >
                                        <i class="las la-edit"></i>
                                    </a>

                                    <a class="btn btn-outline-danger btn-sm delete_patient"
                                       style="color: white"
                                       data-id="{{ $patient->id }}"
                                       href=""
                                    >
                                        <i class="las la-trash"></i>
                                    </a>

                                </td>
                                <td>{{ $patient->phone2 ?? " There isn't a Second Number" }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $patients->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    @include('Patients.add_modal')
    @include('Patients.edit_modal')
    <!-- main-content closed -->
@endsection

@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Moment js -->
    <script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <!--Internal  Flot js-->
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
    <script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
    <script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
    <!--Internal Apexchart js-->
    <script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
    <!-- Internal Map -->
    <script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
    <!--Internal  index js -->
    <script src="{{URL::asset('assets/js/index.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
    {{--  Eh eLgdede  --}}
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
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

    <script>
    $(document).ready(function (){

        $(document).on('click','.add_product',function (e){
            e.preventDefault();

            let name= $('#name').val();
            let age= $('#age').val();
            let phone= $('#phone').val();
            let phone2= $('#phone2').val();
            let gender= $('#gender').val();
            $.ajax({
                url:"{{ route('patients.store') }}",
                method:'post',
                data:{name:name, age:age,phone:phone,phone2:phone2,gender:gender},
                success:function (res){
                    if (res.status == "success"){
                        $('#addModal').modal('hide');
                        $('#addPatientForm')[0].reset()
                        $('.table').load(location.href+' .table');
                    }
                },error:function (err){
                    let error = err.responseJSON;
                    $.each(error.errors,function (index , value){
                        $(".errMsgContainer").append('<span class="text-danger">' + value + '</span>' + '<br>');
                    });
                }
            });

        })

        ///Show values in the form

        $(document).on('click','.update_patient_form',function (){

            let id =  $(this).data('id');
            let name=  $(this).data('name');
            let age =  $(this).data('age');
            let phone =  $(this).data('phone');
            let gender =  $(this).data('gender');
            let phone2 =  $(this).data('phone2');

            $("#up_id").val(id);
            $("#up_name").val(name);
            $("#up_age").val(age);
            $("#up_phone").val(phone);
            $("#up_phone2").val(phone2);
            $("#up_gender").val(gender);
        });


        $(document).on('click' , '.update_patient' , function (e){

            e.preventDefault();

            let id=     $('#up_id').val();
            let name =  $('#up_name').val();
            let age =   $('#up_age').val();
            let phone = $('#up_phone').val();
            let phone2 =$('#up_phone2').val();
            let gender= $('#up_gender').val();

            $.ajax({
                url: "{{ route('patients.update') }}",
                method:'post',
                data:{id:id,name:name,age:age,phone:phone,phone2:phone2,gender:gender},
                success:function (res){
                    if(res.status=='success'){
                        $('#updateModal').modal('hide');
                        $('#updatePatientForm')[0].reset()
                        $('.table').load(location.href+' .table');

                    }
                },error:function (err){
                    let error = err.responseJSON;
                    $.each(error.errors,function (index , value){
                        $(".errMsgContainer").append('<span class="text-danger">' + value + '</span>' + '<br>');
                    });
                }
            });
        })

        $(document).on('click','.delete_patient' ,function (e){

            e.preventDefault();

            let id =  $(this).data('id');

            if(confirm("are you sure to delete this patient , If You delete him that will delete all Appointments for him ")){

                $.ajax({
                    url:"{{route('patients.destroy')}}",
                    method:'post',
                    data:{id:id},
                    success:function (res){
                        if(res.status=='success'){
                            $('.table').load(location.href+' .table');
                        }
                    }
                });
            }


        })


        // Pagination
        $(document).on('click','.pagination a',function (e){
            e.preventDefault();

            let page = $(this).attr('href').split('page=')[1];
            patient(page);
        })

        function patient(page){
            $.ajax({
                url:"/pagination/paginate-data?page="+page,
                success:function (res){
                    $('.table-striped').html(res);
                }

            })
        }


    });
    </script>


@endsection
