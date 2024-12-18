@extends('collaborators.layouts.app_layout')

@section('css')

@section('title')
    Enseignants
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <h5 class="mb-4 pt-4">Enseignants</h5>
            <div class="row">
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
                
                
            </div>
            <!-- /.row -->
            <div class="row mb-2">
                <div class="col-sm-6">
                   
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex w-100 justify-content-end">
                    {{--  start  --}}
                   
                        <a href="
                        {{--  {{ route('teacher.create') }}  --}}
                         " class="btn btn-outline-primary btn-add-style" title="Nouveau"><i class="fa fa-plus"></i> Ajouter un enseignant</a>
                      
                    {{--  end  --}}
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mt-2">
    
                <div class="col-12">
               
                    <div class="card">
    
                        <div class="card-body">
    
                            <table id="example1" class="table table-bordered table-striped">
    
                                <thead>
    
                                    <tr>
    
                                        <th>Date</th>
    
                                        <th>Nom</th>
    
                                        <th>Prénom</th>
    
                                        <th>Email</th>
    
                                        <th>Téléphone</th>
                                        
                                        <th>Action</th>
                                        
                                    </tr>
    
                                </thead>
    
                                <tbody>
    
                                  
                                </tbody>
    
                            </table>
    
                        </div><!-- /.card-body -->
    
                    </div><!-- /.card -->
                  
                    
    
                </div><!-- /.col -->
    
            </div><!-- /.row -->
    


        </div><!-- /.container-fluid -->
      

            
       
    </section>
@endsection

@section('js')

@endsection
