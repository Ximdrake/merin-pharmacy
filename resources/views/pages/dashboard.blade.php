@extends('layouts.master')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-heartbeat"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Patients</span>
                <span class="info-box-number">{{count($patients)}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-user-md"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Doctors</span>
                <span class="info-box-number">{{count($doctors)}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>

        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-plus-square"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Prescription</span>
                <span class="info-box-number">{{count($prescriptions)}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
         
        <!-- /.info-box -->
    </div>
     
    <!-- /.col -->

    <div class="row">
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection