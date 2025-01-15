@extends('collaborators.layouts.app_layout')

@section('title', 'Liste des rôles')

@section('content')

    {{--  start  --}}
    @if (auth()->user()->can('role-show')||auth()->user()->can('role-edit')||auth()->user()->can('role-list')||auth()->user()->can('role-create')||auth()->user()->can('role-delete'))
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex w-100 justify-content-end">
                          {{--  start  --}}
                          @if (auth()->user()->can('role-create'))
                                 <a href="{{ route('roles.create') }}" class="btn btn-outline-primary btn-add-style" ><i class="fa fa-plus"></i> Ajouter un rôle</a>
                          @endif   
                        {{--  end  --}}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--  start  --}}
                    @if (auth()->user()->can('role-show')||auth()->user()->can('role-edit')||auth()->user()->can('role-list')||auth()->user()->can('role-delete'))
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Role</th>
                                                {{--  start  --}}
                                                @if (auth()->user()->can('role-show')||auth()->user()->can('role-edit')||auth()->user()->can('role-delete'))
                                                    <th style="text-align: center;">{{ __('Action') }}</th>
                                                @endif   
                                                {{--  end  --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $roleItem)
                                                <tr>
                                                    <td>{{ $roleItem->name}}</td>
                                                    {{--  start  --}}
                                                    @if (auth()->user()->can('role-show')||auth()->user()->can('role-edit')||auth()->user()->can('role-delete'))
                                                        <td style="text-align: center;">
                                                            <select class="form-control select-action" onchange="javascript:actionHandleSelect(this)" >
                                                                <option class="select-action-item" > Choisir une action</option>
                                                                {{--  start  --}}
                                                                @if(auth()->user()->can('role-show')) 
                                                                    <option class="select-action-item"  value="show {{ route('roles.show', \Crypt::encrypt($roleItem->id)) }}">
                                                                        Voir
                                                                    </option>
                                                                @endif
                                                                {{--  end  --}}
                                                                {{--  start  --}}
                                                                 @if (auth()->user()->can('role-delete'))
                                                                <option class="select-action-item"  value="edit {{ route('roles.edit', \Crypt::encrypt($roleItem->id)) }}">
                                                                    Modifier
                                                                </option>
                                                                @endif  
                                                                {{--  end  --}}
                                                            </select>
                                                        </td>
                                                    @endif   
                                                    {{--  end  --}}
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

