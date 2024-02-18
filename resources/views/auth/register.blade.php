@extends('layouts.auth_app')
@section('title')
    Registrar
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Registrar</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="first_name">Nombre completo:</label><span class="text-danger">*</span>

                            <div class="input-group">
                                <input id="firstName" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    tabindex="1" placeholder="Ingresa Nombre completo" value="{{ old('name') }}"
                                    autofocus required>
                                <span class="input-group-text changeType">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960"
                                            width="24">
                                            <path
                                                d="M280 896V376H80V256h520v120H400v520H280Zm360 0V576H520V456h360v120H760v320H640Z" />
                                        </svg>
                                    </i>
                                </span>
                            </div>


                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Email:</label><span class="text-danger">*</span>

                            <div class="input-group">
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    placeholder="Ingresa tu Email" name="email" tabindex="1" value="{{ old('email') }}"
                                    required autofocus>
                                <span class="input-group-text changeType">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                            width="24px" fill="#000000">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path
                                                d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z" />
                                        </svg></i>
                                </span>
                            </div>

                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password" class="control-label">Contraseña:
                            </label><span class="text-danger">*</span>

                            <div class="input-group">
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    placeholder="Ingresa tu Contraseña" name="password" tabindex="2" required>


                                <span class="input-group-text changeType">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960"
                                            width="24">
                                            <path
                                                d="M280 656q-33 0-56.5-23.5T200 576q0-33 23.5-56.5T280 496q33 0 56.5 23.5T360 576q0 33-23.5 56.5T280 656Zm0 160q-100 0-170-70T40 576q0-100 70-170t170-70q67 0 121.5 33t86.5 87h352l120 120-180 180-80-60-80 60-85-60h-47q-32 54-86.5 87T280 816Zm0-80q56 0 98.5-34t56.5-86h125l58 41 82-61 71 55 75-75-40-40H435q-14-52-56.5-86T280 416q-66 0-113 47t-47 113q0 66 47 113t113 47Z" />
                                        </svg>
                                    </i>

                                </span>
                            </div>


                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password_confirmation" class="control-label">Confirmar Contraseña:</label><span
                                class="text-danger">*</span>

                            <div class="input-group">
                                <input id="password_confirmation" type="password"
                                    placeholder="Confirma tu Contraseña de usuario"
                                    class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                    name="password_confirmation" tabindex="2">
                                <span class="input-group-text changeType">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960"
                                            width="24">
                                            <path
                                                d="M280 656q-33 0-56.5-23.5T200 576q0-33 23.5-56.5T280 496q33 0 56.5 23.5T360 576q0 33-23.5 56.5T280 656Zm0 160q-100 0-170-70T40 576q0-100 70-170t170-70q67 0 121.5 33t86.5 87h352l120 120-180 180-80-60-80 60-85-60h-47q-32 54-86.5 87T280 816Zm0-80q56 0 98.5-34t56.5-86h125l58 41 82-61 71 55 75-75-40-40H435q-14-52-56.5-86T280 416q-66 0-113 47t-47 113q0 66 47 113t113 47Z" />
                                        </svg>
                                    </i>

                                </span>
                            </div>

                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Registrar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        ¿Recordó su información de inicio de sesión? <a href="{{ route('login') }}">Ir al login</a>
    </div>
@endsection
