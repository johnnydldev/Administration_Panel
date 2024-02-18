@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Perfil</h3>
        </div>
        <div class="section-body">

            @if ($errors->any())
                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <strong>¡Revise los campos!</strong>
                    @foreach ($errors->all() as $error)
                        <span class="badge badge-danger">{{ $error }}</span>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            {{-- $user = Auth::user()->id --}}

            <div class="container-md">

                <div class="alert alert-info">

                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 0 24 24" width="36px"
                            fill="#FFFFFF">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z" />
                        </svg>
                    </i>
                    EDITE SU PERFIL DE USUARIO
                </div>

                {!! Form::open([
                    'method' => 'PATCH',
                    'route' => ['update.userProfile', Auth::user()->id],
                ]) !!}
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <div class="input-group">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                <div class="input-group-append input-group__icon">
                                    <span class="input-group-text changeType">
                                        <i class="fa fa-keyboard"></i>
                                    </span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-8 ">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <div class="input-group">
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                <span class="input-group-text changeType">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">

                        <button type="submit" class="btn btn-primary">
                            Guardar
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                fill="#FFFFFF">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z" />
                            </svg>

                        </button>

                    </div>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="container-md py-5">
                <div class="alert alert-info">
                    <i class="fa fa-history fa-2x" aria-hidden="true"></i> ACTUALICE O CAMBIE SU CONTRASEÑA
                </div>

                {!! Form::open([
                    'method' => 'PATCH',
                    'route' => ['update.userPassword', Auth::user()->id],
                ]) !!} <div class="row">
                    
                    <div class="col-md-8 ">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                <div class="input-group-append input-group__icon">
                                    <span class="input-group-text changeType">
                                        <i class="fa fa-key"></i>
                                    </span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-8  ">
                        <div class="form-group">
                            <label for="confirm-password">Confirmar Password</label>
                            <div class="input-group">
                                {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
                                <div class="input-group-append input-group__icon">
                                    <span class="input-group-text changeType">
                                        <i class="fa fa-key"></i>
                                    </span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                       
                            <button type="submit" class="btn btn-primary">
                                Guardar
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                    fill="#FFFFFF">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path
                                        d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z" />
                                </svg>

                            </button>
                       
                    </div>
                </div>
                {!! Form::close() !!}
            </div>



        </div>

    </section>
@endsection
