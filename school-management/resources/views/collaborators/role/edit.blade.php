@extends('collaborators.layouts.app_layout')

@section('title', 'Editer un rôle')
    
@section('content')

    {{--  start  --}}
    @if (auth()->user()->can('role-edit'))
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex w-100 justify-content-end">
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-primary btn-list-style" ><i class="fa fa-list-alt"></i> Liste des rôles</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <form method="POST" action="{{route('roles.update', \Crypt::encrypt($role->id)) }}">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Role :</strong>
                                <input type="text"  name="name"  class="form-control " value="{{$role->name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permission :</strong>
                                <br/>
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                        {{ $value->name }}
                                    </label>
                                    <br/>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-4 mt-4">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
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

  

       
