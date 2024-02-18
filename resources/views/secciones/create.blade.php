@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Agregar Sección</h3>
        </div>
        <div class="section-body">

            <div class="py-12">
                <div class="container">
                    <div class="row">


                        <div class="col-md-8">
                            <div class="card border-primary ">


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




                                <div class="card-header bg-success text-white sm:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                        width="24px" fill="#FFFFFF">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path
                                            d="M19 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-8-2h2v-4h4v-2h-4V7h-2v4H7v2h4z" />
                                    </svg>
                                    Agregar Sección
                                </div>
                                <div class="card-body bg-dark text-white">



                                    <form action="{{ route('store.section') }}" method="POST">
                                        @csrf
                                        <div class="form-group ">
                                            <div class="sm:flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                    width="24px" fill="#FFFFFF">
                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M2.5 4v3h5v12h3V7h5V4h-13zm19 5h-9v3h3v7h3v-7h3V9z" />
                                                </svg>
                                                <label for="exampleInputEmail1">Nombre de la sección</label>
                                            </div>
                                            <input type="text" name="section_name" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">

                                            @error('section_name')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror

                                        </div>

                                        @can('create-section')
                                            <button type="submit" class="btn btn-primary">
                                                <div class="sm:flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                                        height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                                        <g>
                                                            <rect fill="none" height="24" width="24" />
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="M14,10H3v2h11V10z M14,6H3v2h11V6z M18,14v-4h-2v4h-4v2h4v4h2v-4h4v-2H18z M3,16h7v-2H3V16z" />
                                                        </g>
                                                    </svg>
                                                    Agregar Sección
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

        </div>

    </section>
@endsection
