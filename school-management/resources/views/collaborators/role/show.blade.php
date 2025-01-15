@extends('collaborators.layouts.app_layout')

@section('title', 'Détail sur rôle')

@section('content') 

    {{--  start  --}}
    @if (auth()->user()->can('role-show'))
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Détail sur un rôle</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex w-100 justify-content-end">
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-primary btn-list-style" title="Nouveau"><i class="fa fa-list-alt"></i> Liste des rôles</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
            
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Nom:</strong>
                                            <!-- {{ $role->name }} -->
                                                <p>{{ $role->name }}</p>
                                                <p></p>
                                            </div>
                                        </div>
                        
                                    </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <p><strong class="mb-4">Nombre de permissions: </strong>@if(!empty($rolePermissions)) {{ $rolePermissions->count() }} @endif</p>
                                        <p><strong class="mb-4">Liste des permissions: </strong></p>
                                        @if(!empty($rolePermissions))
                                            @foreach($rolePermissions as $v)
                                                <p class="label label-success mt-2">{{ $v->name }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                    {{--  @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <p class="col-sm-3">{{ $v->name }}</p>
                                        @endforeach
                                    @endif  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include('collaborator.unautorized_access')
    @endif  
    {{--  end  --}}
    
@endsection