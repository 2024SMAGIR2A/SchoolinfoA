@extends('collaborators.layouts.app_layout')

@section('title', ' Editer un permission')
    
@section('content')

    {{--  start  --}}
    @if (auth()->user()->can('permission-create'))
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Permission</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex w-100 justify-content-end">
                        {{--  start  --}}
                        @if (auth()->user()->can('permission-list'))
                            <a href="{{ route('permissions.index') }}" class="btn btn-outline-primary btn-list-style" ><i class="fa fa-list-alt"></i> Liste des permissions</a>
                        @endif   
                        {{--  end  --}}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <form method="POST" action="{{route('permissions.store') }}">
            
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="job_label_en">Nom <span class="text-danger">*</span></label>
                                            <input type="text"  name="name"  class="form-control @error('job_label.en') is-invalid @enderror" value="{{ isset($job) ? $job_label_en : old('job_label.en') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-outline-primary">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
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

  

       
        