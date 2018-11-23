@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Doctors Page
    </h1>
    <ol class="breadcrumb">
        <li><button class="btn btn-secondary bg-red" data-toggle="modal" data-target="#add_doctor_modal"><i class="fa fa-plus-square"></i></button></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <br>
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                
                <div class="tab-content">
                    <div class="active tab-pane" id="makati_tab">
                        <table id="doctors_table" class="table table-striped table-bordered" cellspacing="0" style="width: 250px;">
                            <thead>
                                <tr>
                                    <th style="width: 200px;">Name</th>
                                    <th style="width: 200px;">Contact Number</th>
                                    <th style="width: 200px;">Email</th>
                                    <th style="width: 200px;">License Number</th>
                                    <th style="width: 200px;">Clinic Location</th>
                                    <th style="width: 200px;">Specialty</th>
                                    <th style="width: 200px;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                    </div>
                <!-- /.tab-pane -->
                </div>
            <!-- /.tab-content -->
            </div>
        <!-- /.nav-tabs-custom -->
        </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
  <div id="add_doctor_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><small><span id="doctor-form-modal-header-title"></span>Add Doctor</small></h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form method="POST" id='add_doctor' class="needs-validation" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="mT-30">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">First Name</label>
                                    <div class="col-sm-8">
                                        <input name="first_name" id="first_name" type="text" class="form-control font-xs"
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Middle Name</label>
                                    <div class="col-sm-8">
                                        <input name="middle_name" id="middle_name" type="text" class="form-control font-xs"
                                            placeholder="Middle Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Last Name</label>
                                    <div class="col-sm-8">
                                        <input name="last_name" id="last_name" type="text" class="form-control font-xs"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Specialty</label>
                                    <div class="col-sm-8">
                                        <input name="specialty" id="specialty" type="text" class="form-control font-xs"
                                            placeholder="Specialty">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Clinic Location</label>
                                    <div class="col-sm-8">
                                        <input name="clinic" id="clinic" type="text" class="form-control font-xs"
                                            placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">License Number</label>
                                    <div class="col-sm-8">
                                        <input name="license" id="license" type="text" class="form-control font-xs"
                                            placeholder="License Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Email</label>
                                    <div class="col-sm-8">
                                        <input name="email" id="email" type="text" class="form-control font-xs"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Contact Number</label>
                                    <div class="col-sm-8">
                                        <input name="contact_number" id="contact_number" type="text" class="form-control font-xs"
                                            placeholder="Contact Number">
                                    </div>
                                </div>
                            </div>
                            
                        </div>            
                               
    
                        </div>

                        <input type="hidden" name="id" id="patient_id_edit">
                        <input type="hidden" name="action" id="action">
                        <input type="hidden" name="portion" id="portion">
                        <input type="hidden" name="role" id="role">
              
                     <div  class="push-right" style="padding-bottom:10px; ">
                                    <a class="btn btn-default" data-dismiss="modal" id="doctor-modal-cancel">Cancel</a>
                                    <button id="doctor-form-submit" class="btn btn-danger push-right" style="color:white">Confirm</button>
                    </div>
                     
                </form>
                </div>
            </div>

        </div>
        </div>

<div id="edit_doctor_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><small><span id="doctor-form-modal-header-title"></span>Edit Doctor</small></h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form method="POST" id='edit_doctor' class="needs-validation" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="mT-30">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">First Name</label>
                                    <div class="col-sm-8">
                                        <input name="first_name" id="first_name_edit" type="text" class="form-control font-xs"
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Middle Name</label>
                                    <div class="col-sm-8">
                                        <input name="middle_name" id="middle_name_edit" type="text" class="form-control font-xs"
                                            placeholder="Middle Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Last Name</label>
                                    <div class="col-sm-8">
                                        <input name="last_name" id="last_name_edit" type="text" class="form-control font-xs"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Specialty</label>
                                    <div class="col-sm-8">
                                        <input name="specialty" id="specialty_edit" type="text" class="form-control font-xs"
                                            placeholder="Specialty">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Clinic Location</label>
                                    <div class="col-sm-8">
                                        <input name="clinic" id="clinic_edit" type="text" class="form-control font-xs"
                                            placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">License Number</label>
                                    <div class="col-sm-8">
                                        <input name="license" id="license_edit" type="text" class="form-control font-xs"
                                            placeholder="License Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Email</label>
                                    <div class="col-sm-8">
                                        <input name="email" id="email_edit" type="text" class="form-control font-xs"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Contact Number</label>
                                    <div class="col-sm-8">
                                        <input name="contact_number" id="contact_number_edit" type="text" class="form-control font-xs"
                                            placeholder="Contact Number">
                                    </div>
                                </div>
                            </div>
                            
                        </div>            
                               
    
                        </div>

                        <input type="hidden" name="id" id="doctor_id_edit">              
                     <div  class="push-right" style="padding-bottom:10px; ">
                                    <a class="btn btn-default" data-dismiss="modal" id="doctor-modal-cancel">Cancel</a>
                                    <button id="edit-doctor-submit" class="btn btn-danger push-right" style="color:white">Confirm</button>
                    </div>
                     
                </form>
                </div>
            </div>

        </div>
        </div>
    
@endsection

@section('script')
<link href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />     
<script type="text/javascript">
   
    var doctors_table = $('#doctors_table').DataTable({
            scrollCollapse: true,
            processing: true,
            scrollX: true,
            fixedColumns:   {
                leftColumns: 1,
            },
            autoWidth: true,
            ajax: '/doctorView',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'contact_number', name: 'contact_number'},
                {data: 'email', name: 'email'},
                {data: 'license_number', name: 'license_number'},
                {data: 'clinic_location', name: 'clinic_location'},
                {data: 'specialty', name: 'specialty'},
                {data: "action", orderable:false,searchable:false}
            ],
        });

$('#add_doctor_modal').on('hidden.bs.modal', function (e) {       
    document.getElementById("add_doctor").reset();
})
$(document).on("click","#doctor-form-submit", function(e) {
    e.preventDefault();
    var input = $(this);
    var button = input[0];
    button.disabled = true;
    input.html('Saving...'); 
        var formData = $('#add_doctor').serialize();
        console.log(formData);
            $.ajax({
                url: '/addDoctor',
                method: 'post',
                dataType:'json',
                data: formData,
            success: function(result){
                console.log(result);
                $("#add_doctor_modal").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').hide();
                button.disabled = false;
                input.html('Save');
                 swal("Success!", "Record has been added to database", "success")
                doctors_table.ajax.reload(); 
                }, 
                error: function(data){
                        button.disabled = false;
                        input.html('Save');
                       // swal("Oh no!", "Something went wrong, try again.", "error")
            }
             
        });
});

$(document).on("click", ".doctor-edit", function(e){
            e.preventDefault();
            var id = $(this).attr("id");
                $.ajax({
                    url:"/doctorDetails",
                    method: 'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        $('#doctor_id_edit').val(data.id);
                        $('#first_name_edit').val(data.firstname);
                        $('#middle_name_edit').val(data.middlename);
                        $('#last_name_edit').val(data.lastname);
                        $('#contact_number_edit').val(data.contact_number);
                        $('#license_edit').val(data.license_number);
                        $('#specialty_edit').val(data.specialty);
                        $('#clinic_edit').val(data.clinic_location);
                        $('#email_edit').val(data.email);
                    }
                })
})     

$(document).on("click","#edit-doctor-submit", function(e) {
    e.preventDefault();
    var input = $(this);
    var button = input[0];
    button.disabled = true;
    input.html('Saving...'); 
        var formData = $('#edit_doctor').serialize();
      //  console.log(formData);
            $.ajax({
                url: '/updateDoctor',
                method: 'post',
                dataType:'json',
                data: formData,
            success: function(result){
                console.log(result);
                $("#edit_doctor_modal").modal('hide');
                $('.modal-backdrop').remove();
                 swal("Success!", "Record has been updated!", "success")
                    doctors_table.ajax.reload();
                    button.disabled = false;
                    input.html('Save'); 
                }, error: function(data){
                        button.disabled = false;
                        input.html('Save');
                       swal("Oh no!", "Something went wrong, try again.", "error")
                    }
             
        });
});

    $(document).on("click", ".delete_doctor", function(e){
            e.preventDefault();
                var  id = $(this).attr("id");
                 swal({
                    title: "Are you sure?",
                    text: "Delete this record?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url:"/deleteDoctor",
                        method: "get",
                        data:{id:id},
                        success:function(data){
                            console.log(data);
                             swal("Deleted!", "Record has been Deleted.", "success")
                            doctors_table.ajax.reload();
                             
                        }
                    })
                }
            })
                   
    })     

</script>
@endsection