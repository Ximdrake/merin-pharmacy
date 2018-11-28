
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->

<section class="content-header" style="background-color: #FFFFFF">
    <h1>
        Patient Profile
    </h1>
    <ol class="breadcrumb">
         <li>
            <button class="btn btn-secondary bg-blue add_student" data-toggle="modal" data-target="#prescription-form-modal">
                <i class="fa fa-plus-square"></i>
            </button>
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content" style="background-color: #FFFFFF">

    <div class="row">
        <div class="col-md-3">
                <input type="text" id="id" hidden="" value="{{$users[0]->id}}">
         
            <div class="box box-primary">
                <div class="box-body box-profile">
                <?php

                ?>
                    <img class="profile-user-img img-responsive img-circle" src="{{ !empty($users[0]->image)? $users[0]->image : '/./img/nobody.jpg'}}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{$users[0]->firstname}} {{$users[0]->lastname}}</h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Age</b> <a class="pull-right"><?php  
                        $birthDate = explode("/", $users[0]->birthdate);
                        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                          ? ((date("Y") - $birthDate[2]) - 1)
                          : (date("Y") - $birthDate[2]));
                        echo $age;

                      ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Birthday</b> <a class="pull-right">{{ date('F j, Y',strtotime($users[0]->birthdate )) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Guardian</b> <a class="pull-right">{{ $users[0]->spouse_g }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Contact Number</b> <a class="pull-right">{{ $users[0]->contact_number }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Gender</b> <a class="pull-right">{{ $users[0]->gender }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Address</b> <a class="pull-right">{{ $users[0]->address }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Doctor</b> <a class="pull-right">{{ $users[0]->doc_id }}</a>
                        </li>
                    </ul>

                    <?php if(count($medicine)==count($meds)){
                    echo '<a href="#" class="btn btn-primary btn-block"><b>Full</b></a>';}
                    else{ 
                      echo '<a href="#" class="btn btn-danger btn-block"><b>On Maintenance</b></a>';;
                    }?>
                </div>
 
            </div>
        
        </div>
    
        <br>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li ><a href="#makati_tab" data-toggle="tab">PRESCRIPTION</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="makati_tab">
                        <table id="prescription" class="table table-striped table-bordered" cellspacing="0" style="width: 250px;">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">Generic Name</th>
                                    <th style="width: 100px;">Brand Name</th>
                                    <th style="width: 50px;">Dosage Form</th>
                                    <th style="width: 50px;">Dosage Strength</th>
                                    <th style="width: 50px;">Prescribed Quantity</th>
                                    <th style="width: 50px;">On-Hand Quantity</th>
                                    <th style="width: 50px;">Signa</th>
                                    <th style="width: 50px;">Allergy</th>
                                    <th style="width: 50px;">Schedule</th>
                                    <th style="width: 100px;">Refill Check</th>
                                    <th style="width: 100px;">Status</th>
                                    <th style="width: 100px;">Prescription Took</th>
                                    <th style="width: 100px;">Action</th>


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
     <!-- MODALS -- START -->
    
    <div id="prescription-form-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="c-grey-900">Add Prescription</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form method="POST" id='prescription-form' class="needs-validation" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <div class="row" style='padding:10px'>
                        <div class="col-md-12" >
                           
                            <div class="mT-30">
                                 
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
                                    <label class="col-sm-4 col-form-label font-xs">Drug per Schedule</label>
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
                                    <button id="prescription-form-submit" class="btn btn-danger push-right" style="color:white">Confirm</button>
                                </div>
            
    
                        </div>

                        <input type="hidden" name="id" id="patient_id" value="{{$users[0]->id}}">
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
<div id="prescription_edit_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="c-grey-900">Edit Prescription</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form method="POST" id='prescription-edit' class="needs-validation" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <div class="row" style='padding:10px'>
                        <div class="col-md-12" >
                           
                            <div class="mT-30">
                                 
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Generic Name</label>
                                    <div class="col-sm-8">
                                        <input name="generic_name" id="generic_name_edit" type="text" class="form-control font-xs"
                                            placeholder="Generic Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Brand Name</label>
                                    <div class="col-sm-8">
                                        <input name="brand_name" id="brand_name_edit" type="text" class="form-control font-xs"
                                            placeholder="Brand Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Dosage Form</label>
                                    <div class="col-sm-8">
                                        <input name="dosage_form" id="dosage_form_edit" type="text"  class="form-control font-xs"
                                            placeholder="Dosage Form">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Dosage Strength</label>
                                    <div class="col-sm-8">
                                        <input name="dosage_strength" id="dosage_strength_edit" type="text" class="form-control font-xs"
                                            placeholder="Dosage Strength">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Prescribed Quantity</label>
                                    <div class="col-sm-8">
                                        <input name="pres_quantity" id="pres_quantity_edit" type="number" class="form-control font-xs"
                                            placeholder="Prescribed Quantity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">On-Hand Quantity</label>
                                    <div class="col-sm-8">
                                        <input name="quantity" id="onhand_quantity_edit" type="number" class="form-control font-xs"
                                            placeholder="On-Hand Quantity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Signa</label>
                                    <div class="col-sm-8">
                                        <input name="signa" id="signa_edit" type="text" class="form-control font-xs"
                                            placeholder="Signa">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Allergy</label>
                                    <div class="col-sm-8">
                                        <input name="allergy" id="allergy_edit" type="text" class="form-control font-xs"
                                            placeholder="Allergy">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Time</label>
                                    <div class="col-sm-8">
                                        <input name="time" id="time_edit" type="text" class="form-control font-xs"
                                            placeholder="ex. 8:00am-1:00pm-5:30pm-9:45pm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Drug per Schedule</label>
                                    <div class="col-sm-8">
                                        <input name="per_day" id="per_day_edit" type="text" class="form-control font-xs"
                                            placeholder="ex. 2">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Prescription Took</label>
                                    <div class="col-sm-8">
                                        <input name="quantity_took" id="quantity_took" type="text" class="form-control font-xs"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Status</label>
                                    <div class="col-sm-8">
                                        <input name="status" id="status" type="text" class="form-control font-xs"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-xs">Refill Check</label>
                                    <div class="col-sm-8">
                                        <select name="refill_check" id="refill_check_edit" class="form-control font-xs" >
                                            <option value="Minor">Minor</option>
                                            <option value="Major">Major</option>
                                            <option value="Critical">Critical</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                
                     
                                <div class="pull-right">
                                    <a class="btn btn-default" data-dismiss="modal" id="employee-modal-cancel">Cancel</a>
                                    <button id="prescription-edit-submit" class="btn btn-danger push-right" style="color:white">Confirm</button>
                                </div>
            
    
                        </div>

                        <input type="hidden" name="id" id="patient_id" value="{{$users[0]->id}}">
                        <input type="hidden" name="drug_id" id="drug_id">
                        <input type="hidden" name="portion" id="portion">
                        <input type="hidden" name="role" id="role">
                    </div>           
                </form>
            </div>
            </div>
            </div>
            </div>
</section>
    
@endsection

@section('script')
<script type="text/javascript">
    var id= $("#id").val();
    console.log(id);
     var prescription = $('#prescription').DataTable({
            scrollCollapse: true,
            processing: true,
            scrollX: true,
            autoWidth: true,
            ajax: '/prescription/'+id,
            columns: [
                {data: 'generic_name', name: 'generic_name'},
                {data: 'brand_name', name: 'brand_name'},
                {data: 'dosage_form', name: 'dosage_form'},
                {data: 'dosage_strength', name: 'dosage_strength'},
                {data: 'pres_quantity', name: 'pres_quantity'},
                {data: 'quantity', name: 'quantity'},
                {data: 'signa', name: 'signa'},
                {data: 'allergy', name: 'allergy'},
                {data: 'time', name: 'time'},
                {data: 'refill_check', name: 'refill_check'},
                {data: 'status', name: 'status'},
                {data: 'quantity_took', name: 'quantity_took'},
                {data: "action", orderable:false,searchable:false}
                 
            ],
        });
$('#prescription-form-modal').on('hidden.bs.modal', function (e) {       
    document.getElementById("prescription-form").reset();
})

$(document).on("click","#prescription-form-submit", function(e) {
    e.preventDefault();
    var input = $(this);
    var button = input[0];
    button.disabled = true;
    input.html('Saving...'); 
        var formData = $('#prescription-form').serialize();
        $("#employee-form input").removeClass('is-invalid');
        console.log(formData);
            $.ajax({
                url: '/addPrescription',
                method: 'post',
                dataType:'json',
                data: formData,
            success: function(result){
                console.log(result);
                $("#prescription-form-modal").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').hide();
                 swal("Success!", "Record has been Added.", "success")
                prescription.ajax.reload(); 
                }, 
                error: function(data){
                        button.disabled = false;
                        input.html('Save');
                       swal("Oh no!", "Something went wrong, try again.", "error")
            }
             
        });
});

    $(document).on("click", ".prescription-edit", function(e){
            e.preventDefault();
            var id = $(this).attr("id");
                $.ajax({
                    url:"/prescriptionDetails",
                    method: 'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('#drug_id').val(data.id);
                        $('#generic_name_edit').val(data.generic_name);
                        $('#brand_name_edit').val(data.brand_name);
                        $('#dosage_form_edit').val(data.dosage_form);
                        $('#dosage_strength_edit').val(data.dosage_strength);
                        $('#pres_quantity_edit').val(data.pres_quantity);
                        $('#onhand_quantity_edit').val(data.quantity);
                        $('#signa_edit').val(data.signa);
                        $('#allergy_edit').val(data.allergy);
                        $('#time_edit').val(data.time);
                        $('#per_day_edit').val(data.per_day);
                        $('#quantity_took').val(data.quantity_took);
                        $('#status').val(data.status);
                        $('#refill_check_edit').val(data.refill_check);
                        // refresh_expense_table();
                    }
                })
        })     


$(document).on("click","#prescription-edit-submit", function(e) {
    e.preventDefault();
    var input = $(this);
    var button = input[0];
    button.disabled = true;
    input.html('Saving...'); 
        var formData = $('#prescription-edit').serialize();
      //  console.log(formData);
            $.ajax({
                url: '/updatePrescription',
                method: 'post',
                dataType:'json',
                data: formData,
            success: function(result){
                console.log(result);
                $("#prescription_edit_modal").modal('hide');
                $('.modal-backdrop').remove();
                 swal("Success!", "Record has been Updated.", "success")
                    prescription.ajax.reload();
                     button.disabled = false;
                    input.html('Save'); 
                }, error: function(data){
                        button.disabled = false;
                        input.html('Save');
                       swal("Oh no!", "Something went wrong, try again.", "error")
                    }
             
        });
});

$(document).on("click", ".delete_prescription", function(e){
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
                        url:"/deletePrescription",
                        method: "get",
                        data:{id:id},
                        success:function(data){
                            prescription.ajax.reload();
                             swal("Deleted!", "The record has been deleted.", "success");
                        }
                    })
                }
            })
               
})     
</script>
@endsection