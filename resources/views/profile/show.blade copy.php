@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Perfil</h3>
        </div>
        <div class="section-body">

            $id_user = {{Auth::user()->id }};

            <div class="container-md">
                <form action="{{ url('/user/update/profile/' . id_user) }}" method="POST" id="editProfileForm" enctype="multipart/form-data">
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
                    <div class="modal-body">
                        <div class="alert alert-danger d-none" id="editProfileValidationErrorsBox"></div>
                        <input type="hidden" name="user_id" id="pfUserId">
                        <input type="hidden" name="is_active" value="1">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Nombre:</label><span class="required text-danger">*</span>
                                <div class="input-group">
                                    <input type="text" name="name" id="pfName" class="form-control" required
                                        autofocus tabindex="1">
                                    <div class="input-group-append input-group__icon">
                                        <span class="input-group-text changeType">
                                            <i class="fa fa-keyboard"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                           {{--  <div class="form-group col-sm-6 d-flex">
                                <div class="col-sm-4 col-md-6 pl-0 form-group">
                                    <label>Foto del perfil:</label>
                                    <br>
                                    <label class="image__file-upload btn btn-primary text-white" tabindex="2">
                                        Buscar
                                        <input type="file" name="photo" id="pfImage" class="d-none">
                                    </label>
                                </div>
                                <div class="col-sm-3 preview-image-video-container float-right mt-1">
                                    <img id='edit_preview_photo'
                                        class="img-thumbnail user-img user-profile-img profilePicture"
                                        src="{{ asset('') }}" />
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Correo electrónico:</label><span class="required text-danger">*</span>
                                <div class="input-group">
                                    <input type="text" name="email" id="pfEmail" class="form-control" required
                                        tabindex="3">
                                    <span class="input-group-text changeType">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" id="btnPrEditSave"
                                data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."
                                tabindex="5">Guardar
                                <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px"
                                    fill="#FFFFFF">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path
                                        d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z" />
                                </svg>

                            </button>
                            <button type="button" class="btn btn-danger ml-1 edit-cancel-margin margin-left-5"
                                data-dismiss="modal">Cancelar
                                <i class="fa fa-ban" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="container-md">
                <form action="{{ url('store.section') }}" method="POST" id='changePasswordForm'>
                    <div class="alert alert-info">
                        <i class="fa fa-history fa-2x" aria-hidden="true" ></i> ACTUALICE O CAMBIE SU CONTRASEÑA
                    </div>
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="alert alert-danger d-none" id=""></div>
                        <input type="hidden" name="is_active" value="1">
                        <input type="hidden" name="user_id" id="editPasswordValidationErrorsBox">
                        {{ csrf_field() }}
                        <div class="row align-baseline">

                            <div class="form-group col-8">
                                <label>Contraseña actual:</label><span class="required confirm-pwd"></span><span
                                    class="required text-danger">*</span>
                                <div class="input-group">
                                    <input class="form-control input-group__addon" id="pfCurrentPassword" type="password"
                                        name="password_current" required>
                                    <div class="input-group-append input-group__icon">
                                        <span class="input-group-text changeType">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <label>Nueva contraseña:</label><span class="required confirm-pwd"></span><span
                                    class="required text-danger">*</span>
                                <div class="input-group">
                                    <input class="form-control input-group__addon" id="pfNewPassword" type="password"
                                        name="password" required>
                                    <div class="input-group-append input-group__icon">
                                        <span class="input-group-text changeType">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <label>Confirmar Contraseña:</label><span class="required confirm-pwd"></span><span
                                    class="required text-danger">*</span>
                                <div class="input-group">
                                    <input class="form-control input-group__addon" id="pfNewConfirmPassword"
                                        type="password" name="password_confirmation" required>
                                    <div class="input-group-append input-group__icon">
                                        <span class="input-group-text changeType">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" id="btnPrPasswordEditSave"
                                data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">
                                Guardar
                                <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24"
                                    width="18px" fill="#FFFFFF">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path
                                        d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z" />
                                </svg>
                            </button>
                            <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">Cancelar
                                <i class="fa fa-ban" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>



        </div>

    </section>
@endsection
