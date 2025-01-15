@extends('collaborators.layouts.app_layout')

@section('title', 'Editer un rôle')

@section('content')

    {{--  start  --}}
    @if (auth()->user()->can('role-create'))
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ajouter un rôle</h1> 
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex w-100 justify-content-end">
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-primary btn-list-style" ><i class="fa fa-list-alt"></i> Liste des rôles</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <form method="POST" action=" {{ route('roles.store') }} ">
                    @csrf
                   
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <p>
                                    <strong>Nom:</strong>
                                </p>
                                <input type="text"  name="name"  class="form-control @error('job_label.en') is-invalid @enderror" value="{{ isset($job) ? $job_label_en : old('job_label.en') }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <p><strong>Permission:</strong></p>
                            
                                @foreach($permission as $value)
                                    <p>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}</p>
                                
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-4 mt-4">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @else
        @include('collaborator.unautorized_access')
    @endif  
    {{--  end  --}}
@endsection

  

       
        