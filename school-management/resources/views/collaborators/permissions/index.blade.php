@extends('collaborators.layouts.app_layout')

@section('title', ' Liste des permissions')
    
@section('content')

    {{--  start  --}}
    @if (auth()->user()->can('permission-list')||auth()->user()->can('permission-create'))

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Permissions</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex w-100 justify-content-end">
                        {{--  start  --}}
                        {{-- @if (auth()->user()->can('permission-create'))
                            <a href="{{ route('collaborator.permissions.create') }}" class="btn btn-outline-primary" title="Nouveau"><i class="fa fa-plus"></i> Ajouter une permission</a>
                        @endif    --}}
                        {{--  end  --}}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--  start  --}}
                    @if (auth()->user()->can('permission-list'))
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Nom</th>
                                                <th style="text-align: center;">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $permissionItem)
                                                <tr>
                                                    <td>{{ $permissionItem->name}}</td>
                                                    <td style="text-align: center;">
                                                        <select class="form-control select-action" onchange="javascript:actionHandleSelect(this)" >
                                                            <option class="select-action-item" > Choisir une action</option>
                                                            {{--  start  --}}
                                                           
                                                                <option class="select-action-item"  value="show {{ Request::url() }}">
                                                                    Voir
                                                                </option>
                                                         
                                                            <option class="select-action-item"  value="edit {{ Request::url() }}">
                                                                Modifier
                                                            </option>
                                                          
                                                             
                                                        </select>
                                                        {{--  <a href="" class="btn btn-primary" title="Voir"><i class="fa fa-eye"></i></a>
                                                        <a href="" class="btn btn-info" title="Modier"><i class="fa fa-pencil-alt"></i></a>  --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                            @endif   
                            {{--  end  --}}
                            
                        </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
    @else
        @include('collaborator.unautorized_access')
    @endif  
    {{--  end  --}}
@endsection

