@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Secciones</h3>
        </div>
        <div class="section-body">

            <div class="py-12">
                <div class="container">
                    <div class="row">




                        <div class="col-md-8">
                            <div class="card border-primary">

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <div class="sm:flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                width="24px" fill="#000000">
                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                <path
                                                    d="M18 7l-1.41-1.41-6.34 6.34 1.41 1.41L18 7zm4.24-1.41L11.66 16.17 7.48 12l-1.41 1.41L11.66 19l12-12-1.42-1.41zM.41 13.41L6 19l1.41-1.41L1.83 12 .41 13.41z" />
                                            </svg>
                                            <strong>{{ session('success') }}</strong>
                                        </div>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="card-header bg-success text-white sm:flex"><svg
                                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                        fill="#FFFFFF">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path
                                            d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z" />
                                    </svg>
                                    Editar Sección </div>
                                <div class="card-body bg-dark text-white">


                                    <form action="{{ url('section/update/' . $sections->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="sm:flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                    width="24px" fill="#FFFFFF">
                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M2.5 4v3h5v12h3V7h5V4h-13zm19 5h-9v3h3v7h3v-7h3V9z" />
                                                </svg>
                                                <label for="exampleInputEmail1">Nombre de la sección</label>
                                            </div>
                                            <input type="text" name="section_name" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $sections->section_name }}">

                                            @error('section_name')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror

                                        </div>

                                        @can('edit-section')
                                            <button type="submit" class="btn btn-primary">
                                                <div class="sm:flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                                        height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                                        <g>
                                                            <rect fill="none" height="24" width="24" />
                                                        </g>
                                                        <g>
                                                            <g>
                                                                <path
                                                                    d="M11,8v5l4.25,2.52l0.77-1.28l-3.52-2.09V8H11z M21,10V3l-2.64,2.64C16.74,4.01,14.49,3,12,3c-4.97,0-9,4.03-9,9 s4.03,9,9,9s9-4.03,9-9h-2c0,3.86-3.14,7-7,7s-7-3.14-7-7s3.14-7,7-7c1.93,0,3.68,0.79,4.95,2.05L14,10H21z" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    Actualizar sección
                                                </div>
                                            </button>
                                        @endcan
                                    </form>

                                </div>

                            </div>
                        </div>



                    </div>
                </div>

            </div>

    </section>
@endsection
