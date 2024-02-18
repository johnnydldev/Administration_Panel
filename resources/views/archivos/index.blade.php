@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Archivos</h3>
        </div>

        <div class="container-fluid">
            <div class="row">


                <div class="card-deck">
                    <div class="col-md-14">
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

                            @can('create-file')
                                <a href="{{ url('/file/create') }}" class="btn text-white btn-warning">
                                    <div class="sm:flex">
                                        Nuevo Archivo
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                            width="24px" fill="#FFFFFF">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path
                                                d="M13 11h-2v3H8v2h3v3h2v-3h3v-2h-3zm1-9H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z" />
                                        </svg>
                                    </div>
                                </a>
                            @endcan

                            <div class="card-header bg-success text-white sm:flex"> <svg xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px"
                                    fill="#FFFFFF">
                                    <g>
                                        <rect fill="none" height="24" width="24" />
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M20,2H4C3,2,2,2.9,2,4v3.01C2,7.73,2.43,8.35,3,8.7V20c0,1.1,1.1,2,2,2h14c0.9,0,2-0.9,2-2V8.7c0.57-0.35,1-0.97,1-1.69V4 C22,2.9,21,2,20,2z M19,20H5V9h14V20z M20,7H4V4h16V7z" />
                                            <rect height="2" width="6" x="9" y="12" />
                                        </g>
                                    </g>
                                </svg>Todos los Archivos </div>


                            <table class="table">
                                <thead class="bg-primary text-white">
                                    <tr class="bg-info text-white">
                                        <th scope="col">No.</th>
                                        <th scope="col">Nombre Archivo</th>
                                        <th scope="col">Periodo</th>
                                        <th scope="col">Año info</th>
                                        <th scope="col">Extensión</th>
                                        <th scope="col">Cargado</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-dark text-white">
                                    {{-- @php($i = 1) --}}

                                    @php($file_ext)



                                    @foreach ($files as $file)
                                     

                                        {{-- $file_ext=strtolower($file->type_file->getClientOriginalExtension()) --}}

                                        <tr>
                                            <th scope="row"> {{ $files->firstItem() + $loop->index }} </th>
                                            <td> {{ $file->file_name }} </td>
                                            <td> {{ $file->period }} </td>
                                            <td> {{ $file->year_info }} </td>
                                            <td>
                                                {{ $file_ext = pathinfo($file->type_file, PATHINFO_EXTENSION); }}
                                                @switch($file_ext)
                                                    @case('pdf')
                                                        <img src="{{ asset('files/imagenes/extensiones/pdf.jpg') }}"
                                                            style="height:70px; width:68px;">
                                                    @break

                                                    @case('xlsx')
                                                        <img src="{{ asset('files/imagenes/extensiones/excel.jpg') }}"
                                                        style="height:70px; width:64px;">
                                                    @break

                                                    @case('xls')
                                                        <img src="{{ asset('files/imagenes/extensiones/excel.jpg') }}"
                                                        style="height:70px; width:60px;">
                                                    @break

                                                    @case('doc')
                                                        <img src="{{ asset('files/imagenes/extensiones/word.jpg') }}"
                                                        style="height:70px; width:60px;">
                                                    @break

                                                    @case('docx')
                                                        <img src="{{ asset('files/imagenes/extensiones/word.jpg') }}"
                                                        style="height:70px; width:60px;">
                                                    @break

                                                    @default
                                                        <img src="{{ asset($file->type_file) }}" style="height:70px; width:70px;">
                                                @endswitch
                                            </td>
                                            <td>
                                                @if ($file->created_at == null)
                                                    <span class="text-danger"> No Date Set</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($file->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td> {{ $file->user->name }} </td>
                                            <td>

                                                @can('edit-file')
                                                    <a href="{{ url('file/edit/' . $file->id) }}" class="btn btn-info">
                                                        <div class="sm:flex">
                                                            Editar
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                                viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                                <path
                                                                    d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z" />
                                                            </svg>
                                                        </div>
                                                    </a>
                                                @endcan



                                                @can('delete-file')
                                                    <a href="{{ url('file/delete/' . $file->id) }}" class="btn btn-danger">
                                                        <div class="sm:flex">
                                                            Borrar
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                                viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                                <path
                                                                    d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z" />
                                                            </svg>
                                                        </div>
                                                    </a>
                                                @endcan

                                            </td>


                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            {{ $files->links() }}

                        </div>
                    </div>



                </div>



            </div>
        </div>



        <!-- Trash Part -->

        {{-- <div class="container-fluid">
            <div class="row">


                <div class="col-md-8">
                    <div class="card">




                        <div class="card-header">Eliminados</div>


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- @php($i = 1) -->
                                @foreach ($trachCat as $category)
                                    <tr>
                                        <th scope="row"> {{ $categories->firstItem() + $loop->index }} </th>
                                        <td> {{ $category->category_name }} </td>
                                        <td> {{ $category->user->name }} </td>
                                        <td>
                                            @if ($category->created_at == null)
                                                <span class="text-danger"> No Date Set</span>
                                            @else
                                                {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('category/restore/' . $category->id) }}"
                                                class="btn btn-info">Restaurar</a>
                                            <a href="{{ url('pdelete/category/' . $category->id) }}"
                                                class="btn btn-danger">Borrar</a>
                                        </td>


                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        {{ $trachCat->links() }}

                    </div>
                </div>


                <div class="col-md-4">

                </div>



            </div>
        </div> --}}

        <!-- End Trush -->




    </section>
@endsection
