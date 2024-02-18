@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Archivos</h3>
        </div>

        <div class="col-md-8">
            <div class="card border-primary">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="sm:flex">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                fill="#000000">
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
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                        fill="#FFFFFF">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-8-2h2v-4h4v-2h-4V7h-2v4H7v2h4z" />
                    </svg>
                    Agregar Archivos
                </div>
                <div class="card-body bg-dark text-white">



                    <form action="{{ route('store.files') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="sm:flex">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                    fill="#FFFFFF">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M2.5 4v3h5v12h3V7h5V4h-13zm19 5h-9v3h3v7h3v-7h3V9z" />
                                </svg>
                                <label for="exampleInputEmail1">Nombre del archivo</label>
                            </div>
                            <input type="text" name="file_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">

                            @error('file_name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <div class="sm:flex">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                    fill="#FFFFFF">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M2.5 4v3h5v12h3V7h5V4h-13zm19 5h-9v3h3v7h3v-7h3V9z" />
                                </svg>
                                <label for="exampleInputEmail1">Periodo</label>
                            </div>
                            {{-- <input type="text" name="period" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp"> --}}
                            <select class="custom-select" id="inputGroupSelect01" name="period"
                                aria-describedby="emailHelp">
                                <option>Selecciona el Periodo de Actualización</option>
                                <option value="Primer Trimestre">Primer Trimestre</option>
                                <option value="Segundo Trimestre">Segundo Trimestre</option>
                                <option value="Tercer Trimestre">Tercer Trimestre</option>
                                <option value="Cuarto Trimestre">Cuarto Trimestre</option>
                                <option value="Primer Semestre">Primer Semestre</option>
                                <option value="Segundo Semestre">Segundo Semestre</option>
                                <option value="Anual">Anual</option>
                                <option value="Tri Anual">Tri Anual</option>
                                <option value="Vigente">Vigentes</option>
                            </select>

                            @error('period')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <div class="sm:flex">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                                    viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                    <g>
                                        <rect fill="none" height="24" width="24" />
                                    </g>
                                    <g>
                                        <path
                                            d="M19,4h-1V2h-2v2H8V2H6v2H5C3.89,4,3.01,4.9,3.01,6L3,20c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V6C21,4.9,20.1,4,19,4z M19,20 H5V10h14V20z M19,8H5V6h14V8z M9,14H7v-2h2V14z M13,14h-2v-2h2V14z M17,14h-2v-2h2V14z M9,18H7v-2h2V18z M13,18h-2v-2h2V18z M17,18 h-2v-2h2V18z" />
                                    </g>
                                </svg>
                                <label for="exampleInputEmail1">Año de la información</label>
                            </div>
                            {{-- <input type="text" name="year_info" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp"> --}}

                            <select class="custom-select" id="inputGroupSelect01" name="year_info"
                                aria-describedby="emailHelp">
                                <option>Selecciona el Ejercicio Fiscal</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>

                            @error('year_info')
                                {{-- <span class="text-danger material-icons-outlined"> error_outline {{ $message }}</span> --}}
                                <span class="text-danger material-icons-outlined"> {{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <div class="sm:flex">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                    width="24px" fill="#FFFFFF">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path
                                        d="M16.5 6v11.5c0 2.21-1.79 4-4 4s-4-1.79-4-4V5c0-1.38 1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5v10.5c0 .55-.45 1-1 1s-1-.45-1-1V6H10v9.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5V5c0-2.21-1.79-4-4-4S7 2.79 7 5v12.5c0 3.04 2.46 5.5 5.5 5.5s5.5-2.46 5.5-5.5V6h-1.5z" />
                                </svg>
                                <label for="exampleInputEmail1">Archivo(s)</label>
                            </div>
                            <input type="file" name="type_file" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            {{-- accept="image/png, .jpeg, .jpg aplication/pdf, .xml, .xmlx, .doc, .docx text/csv, .xml" --}}
                            @error('type_file')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror

                        </div>

                        @can('create-file')
                            <button type="submit" class="btn btn-primary sm:flex">
                                <div class="sm:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                        width="24px" fill="#FFFFFF">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path
                                            d="M13 11h-2v3H8v2h3v3h2v-3h3v-2h-3zm1-9H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z" />
                                    </svg>
                                    Agregar archivo
                                </div>

                            </button>
                        @endcan
                    </form>

                </div>

            </div>
        </div>



    </section>
@endsection
