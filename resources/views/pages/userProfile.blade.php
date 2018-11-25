@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Account Profile
    </h1>
    <ol class="breadcrumb">
        <li><button class="btn btn-secondary bg-red" data-toggle="modal" data-target="#add_doctor_modal"><i class="fa fa-plus-square"></i></button></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-3">
                <input type="text" id="id_user" hidden="" value="{{$users[0]->id}}">
         
            <div class="box box-primary">
                <div class="box-body box-profile">
                <?php

                ?>
                    <img class="profile-user-img img-responsive img-circle" src="{{ !empty($users[0]->image)? $users[0]->image : '/./img/nobody.jpg'}}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{$users[0]->firstname}} {{$users[0]->lastname}}</h3>

                  

                    <ul class="list-group list-group-unbordered">
                         
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right">{{ $users[0]->email }}</a>
                        </li>
                    </ul>

                    <button id="edit_user" data-toggle="modal" data-target="#edit_user_profile" class="btn btn-primary btn-block"><b>Edit Profile</b></button>
                </div>
 
            </div>
    </div>
    <!-- /.row -->
    </section>

   <div id="edit_user_profile" class="modal fade" role="dialog" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><small><span id="user-form-modal-header-title"></span>Edit User</small></h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form method="POST" id='user_edit' class="needs-validation" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="mT-30">
                            <input type="hidden" name="id" id="id" value="{{ $users[0]->id }}">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">First Name</label>
                                    <div class="col-sm-8">
                                        <input name="first_name" id="first_name_edit" type="text" class="form-control font-xs" value="{{ $users[0]->firstname }}" 
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Last Name</label>
                                    <div class="col-sm-8">
                                        <input name="last_name" id="last_name_edit" type="text" class="form-control font-xs" value="{{ $users[0]->lastname }}" 
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Email</label>
                                    <div class="col-sm-8">
                                        <input name="contact" id="contact_edit" type="text" class="form-control font-xs" value="{{ $users[0]->email }}" 
                                            placeholder="Contact">
                                    </div>
                                </div>
                               <!--  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Old Password</label>
                                    <div class="col-sm-8">
                                        <input name="old_pass" id="old_pass" type="password" class="form-control font-xs"
                                            placeholder="Old Password">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">New Password</label>
                                    <div class="col-sm-8">
                                        <input name="new_pass" id="new_pass" type="password" class="form-control font-xs"
                                            placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="image-upload" align="center">
                                    <label id="form-image-container" for="photo_edit" style="cursor:pointer">
                                        <img src="{{ !empty($users[0]->image)? $users[0]->image : '/./img/nobody.jpg'}}" alt="profile Pic" id="upload-image-display_edit"
                                            width="35%" />
                                    </label>
                                    <input name="photo_edit" id="photo_edit"  type="file" style="display:none"/>
                                    <input name="captured_photo_edit" id="captured_photo_edit" type="text" value="" style="display:none" />
                                    
                                </div>
                            </div>

                            </div>
                            
                        </div>            
                               
    
                        </div>
              
                     <div  class="push-right" style="padding-bottom:10px; ">
                                    <a class="btn btn-default" data-dismiss="modal" id="patient-modal-cancel">Cancel</a>
                                    <button id="update_user" class="btn btn-danger push-right" style="color:white">Confirm</button>
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

    $("#photo").change(function() {
    readURL(this);
    });
	$("#photo_edit").change(function() {
    readURL2(this);
    });
    function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#upload-image-display').attr('src', e.target.result);
        $('#captured_photo').val(e.target.result);
      }
      reader.readAsDataURL(input.files[0]);

    } 

}
 
function readURL2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#upload-image-display_edit').attr('src', e.target.result);
        $('#captured_photo_edit').val(e.target.result);
      }
      reader.readAsDataURL(input.files[0]);

    } 

} 
 $(document).on("click", "#update_user", function(e){
    e.preventDefault();
		    var input = $(this);
		    var button = input[0];
		    button.disabled = true;
		    input.html('Saving...'); 
		        var formData = $('#user_edit').serialize();
		   console.log(formData);
		       // console.log(formData);
		            $.ajax({
		                url: '/updateUser',
		                method: 'post',
		                dataType:'json',
		                data: formData,
		            success: function(result){
		                console.log(result);
		                $("#edit_user_profile").modal('hide');
		                $('.modal-backdrop').remove();
		                 swal("Success!", "Record has been Updated.", "success")
		                    button.disabled = false;
		                    input.html('Save'); 
		                  location.reload();
		                }, error: function(data){
		                        button.disabled = false;
		                        input.html('Save');
		                       swal("Oh no!", "Something went wrong, try again.", "error")
		                    }
		             
		        });
        })     


</script>
@endsection