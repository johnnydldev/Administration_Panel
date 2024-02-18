@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Archivos</h3>
        </div>

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

                            <div class="card-header bg-success text-white sm:flex"><svg xmlns="http://www.w3.org/2000/svg"
                                    height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path
                                        d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z" />
                                </svg>
                                Editar Archivo
                            </div>
                            <div class="card-body  bg-dark text-white">



                                <form action="{{ url('file/update/' . $files->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="old_file" value="{{ $files->type_file }}">
                                    <div class="form-group">
                                        <div class="sm:flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                width="24px" fill="#FFFFFF">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path d="M2.5 4v3h5v12h3V7h5V4h-13zm19 5h-9v3h3v7h3v-7h3V9z" />
                                            </svg>
                                            <label for="exampleInputEmail1">Nombre del archivo</label>
                                        </div>
                                        <input type="text" name="file_name" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $files->file_name }}">

                                        @error('file_name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <div class="sm:flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                width="24px" fill="#FFFFFF">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path d="M2.5 4v3h5v12h3V7h5V4h-13zm19 5h-9v3h3v7h3v-7h3V9z" />
                                            </svg>
                                            <label for="exampleInputEmail1">Periodo</label>
                                        </div>
                                        {{-- <input type="text" name="period" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $files->period }}"> --}}

                                        <select class="custom-select" id="inputGroupSelect01" name="period"
                                            aria-describedby="emailHelp">
                                            <option value="{{ $files->period }}">{{ $files->period }}</option>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                                height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
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
                                            aria-describedby="emailHelp" value="{{ $files->year_info }}"> --}}

                                        <select class="custom-select" id="inputGroupSelect01" name="year_info"
                                            aria-describedby="emailHelp">
                                            <option value="{{ $files->year_info }}">{{ $files->year_info }}</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                        </select>

                                        @error('year_info')
                                            <span class="text-danger"> {{ $message }}</span>
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
                                        <input type="file" name="type_file" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                        {{-- accept="image/png, .jpeg, .jpg aplication/pdf, .xml, .xmlx, .doc, .docx text/csv, .xml" --}}
                                        @error('type_file')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group" enctype="multipart/form-data">
                                        {{--  <iframe width="200" height="200" src="{{ asset($files->type_file) }}" frameborder="0">
                                </iframe> --}}
                                        @php($file_ext)

                                        <a href="{{ asset($files->type_file) }}" style="width:400px; height:200px;"
                                            class="flex">
                                            {{ $file_ext = pathinfo($files->type_file, PATHINFO_EXTENSION) }}
                                            @switch($file_ext)
                                                @case('pdf')
                                                    <img src="{{ asset('files/imagenes/extensiones/pdf.jpg') }}"
                                                        style="width:150px; height:200px;">
                                                @break

                                                @case('xlsx')
                                                    <img src="{{ asset('files/imagenes/extensiones/excel.jpg') }}"
                                                        style="width:150px; height:200px;">
                                                @break

                                                @case('xls')
                                                    <img src="{{ asset('files/imagenes/extensiones/excel.jpg') }}"
                                                        style="width:150px; height:200px;">
                                                @break

                                                @case('doc')
                                                    <img src="{{ asset('files/imagenes/extensiones/word.jpg') }}"
                                                        style="width:150px; height:200px;">
                                                @break

                                                @case('docx')
                                                    <img src="{{ asset('files/imagenes/extensiones/word.jpg') }}"
                                                        style="width:150px; height:200px;">
                                                @break

                                                @default
                                                    <img src="{{ asset($files->type_file) }}" style="width:400px; height:200px;">
                                            @endswitch

                                        </a>
                                        {{-- <img src="{{ asset($files->type_file) }}" style="width:400px; height:200px;"> --}}
                                    </div>


                                    @can('edit-file')
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
                                                Actualizar archivo
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
