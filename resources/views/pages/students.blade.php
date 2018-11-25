@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header" style="background-color: #FFFFFF">
    <h1>
        Patient List
    </h1>
    <ol class="breadcrumb" style="background-color: #FFFFFF">
        <li>
            <button class="btn btn-secondary bg-blue add_student" data-toggle="modal" data-target="#patient-form-modal">
                <i class="fa fa-plus-square"></i>
            </button>
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content" style="background-color: #FFFFFF">

    <div class="row">
        <br>
        <!-- /.col -->
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#students_makati_tab" data-toggle="tab">Patients</a></li>
                </ul>

                <!-- STUDENTS MAKATI -- START -->
                <div class="tab-content">
                    <div class="active tab-pane" id="students_makati_tab">
                        <table id="students_makati" class="table table-striped table-bordered" cellspacing="0">
                            @include('includes.student_table')
                        </table>
                    </div>
                </div>

                <!-- STUDENTS MAKATI -- END -->

            </div>
        </div>
    </div>

    <!-- MODALS -- START -->
    
    <div id="patient-form-modal" class="modal fade" role="dialog" >
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><small><span id="employee-form-modal-header-title"></span> Patient</small></h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form method="POST" id='employee-form' class="needs-validation" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <div class="row" style='padding:10px'>
                        <!-- //basic info -->
                        <div class="col-md-6" style='border-right:1px solid #ccc'>
                            <h6 class="c-grey-900">Basic Info</h6>
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
                                            placeholder="Middle Name" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Last Name</label>
                                    <div class="col-sm-8">
                                        <input name="last_name" id="last_name" id="last_name" type="text" class="form-control font-xs"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Address</label>
                                    <div class="col-sm-8">
                                        <input name="address" id="address" type="text" class="form-control font-xs"
                                            placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Contact</label>
                                    <div class="col-sm-8">
                                        <input name="contact" id="contact" type="text" class="form-control font-xs"
                                            placeholder="Contact">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Guardian</label>
                                    <div class="col-sm-8">
                                        <input name="guardian" id="guardian" type="text" class="form-control font-xs"
                                            placeholder="Guardian">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Gender</label>
                                    <div class="col-sm-8">
                                        <select name="gender" id="gender" class="form-control font-xs" >
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Birthday</label>
                                   <div class="timepicker-input col-sm-8">
                                        <input name="bday" id='bday' type="text" class="form-control bdc-black start-date font-xs"
                                            placeholder="MM/DD/YYYY" data-provide="datepicker">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="image-upload" align="center">
                                    <label id="form-image-container" for="photo" style="cursor:pointer">
                                        <img src="/./img/nobody.jpg" alt="profile Pic" id="upload-image-display"
                                            width="50%" />
                                    </label>
                                    <input name="photo" id="photo"  type="file" style="display:none" />
                                    <input name="captured_photo" id="captured_photo" type="text" value="" style="display:none" />
                                    
                                </div>
                            </div>

                            </div>
                        </div>
                       
                        <!-- //company info -->
                        <div class="col-md-6" >
                            <h6 class="c-grey-900">Presciption Details</h6>
                            <div class="mT-30">
                                <div class="form-group row admin-hidden-field">
                                    <label class="col-sm-4 col-form-label font-xs" >Doctor</label>
                                    <div class="col-sm-8">
                                        <select name="doc_id" id="doc_id" class="form-control font-xs" >
                                            @foreach($doctors as $datum)  
                                                    <option class="non" value="Dr. {{$datum->firstname}} {{$datum->lastname}}">Dr. {{$datum->firstname}} {{$datum->lastname}}</option>   
                                            @endforeach
                                            <option class="editable" value="other">Other</option>
                                            <input class="editOption form-control font-xs"  style="display:none;"></input>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Generic Name</label>
                                    <div class="col-sm-8">
                                        <input name="generic_name" id="generic_name" type="text" class="form-control font-xs"
                                            placeholder="Generic Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Brand Name</label>
                                    <div class="col-sm-8">
                                        <input name="brand_name" id="brand_name" type="text" class="form-control font-xs"
                                            placeholder="Brand Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Dosage Form</label>
                                    <div class="col-sm-8">
                                        <input name="dosage_form" id="dosage_form" type="text"  class="form-control font-xs"
                                            placeholder="Dosage Form">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Dosage Strength</label>
                                    <div class="col-sm-8">
                                        <input name="dosage_strength" id="dosage_strength" type="text" class="form-control font-xs"
                                            placeholder="Dosage Strength">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Prescribed Quantity</label>
                                    <div class="col-sm-8">
                                        <input name="pres_quantity" id="pres_quantity" type="number" class="form-control font-xs"
                                            placeholder="Prescribed Quantity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">On-Hand Quantity</label>
                                    <div class="col-sm-8">
                                        <input name="onhand_quantity" id="onhand_quantity" type="number" class="form-control font-xs"
                                            placeholder="On-Hand Quantity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Signa</label>
                                    <div class="col-sm-8">
                                        <input name="signa" id="signa" type="text" class="form-control font-xs"
                                            placeholder="Signa">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Allergy</label>
                                    <div class="col-sm-8">
                                        <input name="allergy" id="allergy" type="text" class="form-control font-xs"
                                            placeholder="Allergy">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Time</label>
                                    <div class="col-sm-8">
                                        <input name="time" id="time" type="text" class="form-control font-xs"
                                            placeholder="ex. 8:00am-1:00pm-5:30pm-9:45pm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Drug per Day</label>
                                    <div class="col-sm-8">
                                        <input name="per_day" id="per_day" type="text" class="form-control font-xs"
                                            placeholder="ex. 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Refill Check</label>
                                    <div class="col-sm-8">
                                        <select name="refill_check" id="refill_check" class="form-control font-xs" >
                                            <option value="Minor">Minor</option>
                                            <option value="Major">Major</option>
                                            <option value="Critical">Critical</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                
                     
                                <div class="pull-right">
                                    <a class="btn btn-default" data-dismiss="modal" id="employee-modal-cancel">Cancel</a>
                                    <button type="submit" id="employee-form-submit" class="btn btn-primary push-right" style="color:white">Confirm</button>
                                </div>
            
    
                        </div>

                        <input type="hidden" name="id" id="patient_id">
                        <input type="hidden" name="action" id="action">
                        <input type="hidden" name="portion" id="portion">
                        <input type="hidden" name="role" id="role">
                    </div>           
                </form>
            </div>
        </div>
        </div>
        </div>
    <!-- MODALS -- END -->
<!-- MODALS -- START -->
    
    <div id="edit_form_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><small><span id="patient-form-modal-header-title"></span>Edit Patient</small></h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form method="POST" id='patient_edit' class="needs-validation" enctype="multipart/form-data">
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
                                    <label class="col-sm-4 col-form-label font-xs">Address</label>
                                    <div class="col-sm-8">
                                        <input name="address" id="address_edit" type="text" class="form-control font-xs"
                                            placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Doctor</label>
                                    <div class="col-sm-8">
                                        <input name="doc_id" id="doctor" type="text" class="form-control font-xs"
                                            placeholder="Contact">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Contact</label>
                                    <div class="col-sm-8">
                                        <input name="contact" id="contact_edit" type="text" class="form-control font-xs"
                                            placeholder="Contact">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Guardian</label>
                                    <div class="col-sm-8">
                                        <input name="guardian" id="guardian_edit" type="text" class="form-control font-xs"
                                            placeholder="Guardian">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Gender</label>
                                    <div class="col-sm-8">
                                        <select name="gender" id="gender_edit" class="form-control font-xs" >
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs pad0">Birthday</label>
                                   <div class="timepicker-input col-sm-8">
                                        <input name="bday" id='bday_edit' type="text" class="form-control bdc-black start-date font-xs"
                                            placeholder="MM/DD/YYYY" data-provide="datepicker">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="image-upload" align="center">
                                    <label id="form-image-container" for="photo_edit" style="cursor:pointer">
                                        <img src="" alt="profile Pic" id="upload-image-display_edit"
                                            width="35%" />
                                    </label>
                                    <input name="photo_edit" id="photo_edit"  type="file" style="display:none"/>
                                    <input name="captured_photo_edit" id="captured_photo_edit" type="text" value="" style="display:none" />
                                    
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
                                    <a class="btn btn-default" data-dismiss="modal" id="patient-modal-cancel">Cancel</a>
                                    <button id="update-form-submit" class="btn btn-primary push-right" style="color:white">Confirm</button>
                    </div>
                     
                </form>
                </div>
            </div>

        </div>
        </div>
       

    <!-- VIEW PROFILE-->



</section>
@endsection

@section('script')
<style type="text/css">
.table-image-cover {
  height: 50px;
  width: 50px;
  background-size: cover;
}

</style>
<script>

        var initialText = $('.editable').val();
        $('.editOption').val(initialText);

        $('#doc_id').change(function(){
        var selected = $('option:selected', this).attr('class');
        var optionText = $('.editable').text();

        if(selected == "editable"){
          $('.editOption').show();

          
          $('.editOption').keyup(function(){
              var editText = $('.editOption').val();
              $('.editable').val(editText);
              $('.editable').html(editText);
          });

        }else{
          $('.editOption').hide();
        }
        });


        //DATATABLES -- START

        var students_makati = $('#students_makati').DataTable({
            scrollCollapse: true,
            processing: true,
            scrollX: true,
            fixedColumns:   {
                leftColumns: 1,
            },
            autoWidth: true,
            ajax: '/makatiStudent',
            columns: [
                {width:'30%',data: 'image', name: 'image',
                        render: function( data, type, row, meta ) {
                        // var data = btoa(data.substr(data.indexOf(',')));
                        if(data){
                        return '<div class="table-image-cover bdrs-50p" style="background-image:url('+data+')"></div>';
                        }else{ 
                            return '<div class="table-image-cover bdrs-50p" style="background-image:url(./img/nobody.jpg)"></div>';}
                    }},
                {data: 'name', name: 'name'},
                {data: 'contact_number', name: 'contact_number'},
                {data: 'status', name: 'status'},
                {data: 'doctor', name: 'doctor'},
                {data: 'gender', name: 'gender'},
                {data: "action", orderable:false,searchable:false}
            ],
        });

        //DATATABLES -- END


        $( "#edit-form-modal" ).on('shown.bs.modal', function(){
            alert("I want this to appear after the modal has opened!");
            var  id = $(this).attr("id");
             $("#patient_id").val(2);
        });
        $(document).on("click", ".update_patient", function(e){
                e.preventDefault();
                $('#edit_form_modal').modal('show');
             var id = $(this).attr("id");
           $.ajax({
                    url:"/Patientdetails",
                    method: 'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        $('#action').val('update');
                        $('#patient_id_edit').val(data[0].id);
                        $('#first_name_edit').val(data[0].firstname);
                        $('#last_name_edit').val(data[0].lastname);
                        $('#middle_name_edit').val(data[0].middlename);
                        $('#address_edit').val(data[0].address);
                        $('#contact_edit').val(data[0].contact_number);
                        $('#guardian_edit').val(data[0].spouse_g);
                        $('#gender_edit').val(data[0].gender);
                        $('#bday_edit').val(data[0].birthdate);
                        $('#doctor').val(data[0].doc_id);
                        if(data[0].image!=null){
                            $('#upload-image-display_edit').attr('src',data[0].image).trigger('change');
                         }else{
                            $('#upload-image-display_edit').attr('src','/./img/nobody.jpg');
                         }
                         $('#captured_photo_edit').val(data[0].image);
             
                        // $('.modal_title').text('Update Expense');
                        // refresh_expense_table();
                    }
                })
        })     

$(document).on("click", ".delete_patient", function(e){
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
                        url:"/deletePatient",
                        method: "get",
                        data:{id:id},
                        success:function(data){
                            students_makati.ajax.reload();
                             //swal("Deleted!", "The record has been deleted.", "success");
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
function refresh_patient_table(){
    students_makati.ajax.reload(); //reload datatable ajax
} 
$('#patient-form-modal').on('hidden.bs.modal', function (e) {
             $('#upload-image-display').attr('src','/./img/nobody.jpg');
            document.getElementById("employee-form").reset();

})

$(document).on("click","#employee-form-submit", function(e) {
    e.preventDefault();
    var input = $(this);
    var button = input[0];
    button.disabled = true;
    input.html('Saving...'); 
        var formData = $('#employee-form').serialize();
        $("#employee-form input").removeClass('is-invalid');
            $.ajax({
                url: '/addPatient',
                method: 'post',
                dataType:'json',
                data: formData,
            success: function(result){
                $("#patient-form-modal").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').hide();
                 swal("Success!", "Record has been Added.", "success")
                  button.disabled = false;
                        input.html('Save');
                   students_makati.ajax.reload(); 
                }, error: function(data){
                        button.disabled = false;
                        input.html('Save');
                       swal("Please Fill Up Everything", "Something went wrong, try again.", "error")
                    }
             
        });
});
$(document).on("click","#update-form-submit", function(e) {
    e.preventDefault();
    var input = $(this);
    var button = input[0];
    button.disabled = true;
    input.html('Saving...'); 
        var formData = $('#patient_edit').serialize();
            $.ajax({
                url: '/editPatient',
                method: 'post',
                dataType:'json',
                data: formData,
            success: function(result){
                button.disabled = false;
                input.html('Save');
                $("#edit_form_modal").modal('hide');
                $('.modal-backdrop').remove();
                swal("Success!", "Record has been Updated.", "success")
                   students_makati.ajax.reload(); 
                }
             
        });
});
</script>

@endsection