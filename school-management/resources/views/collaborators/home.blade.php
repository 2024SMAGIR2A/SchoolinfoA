@extends('collaborators.layouts.app_layout')

@section('css')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
        <h5 class="mb-4 pt-4">Tableau de bord</h5>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="nav-icon fas fa-user-graduate"></i></span>
    
                <div class="info-box-content">
                <span class="info-box-text">Etudiant</span>
                <span class="info-box-number">43</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="nav-icon fas fa-user-tie"></i></span>
    
                <div class="info-box-content">
                <span class="info-box-text">Enseignant</span>
                <span class="info-box-number">23</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning">
                
                <i class="nav-icon fas fa-school"></i>
            </span>
    
                <div class="info-box-content">
                <span class="info-box-text">Classes</span>
                <span class="info-box-number">12</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="nav-icon fas fa-book"></i></span>
    
                <div class="info-box-content">
                <span class="info-box-text">Cours </span>
                <span class="info-box-number"> 100</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    
    
    
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('js')

@endsection