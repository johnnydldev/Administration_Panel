@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Secciones</h3>
        </div>

        <div class="section-body">

            <div class="py-12">
                <div class="container-fluid">
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

                                @can('create-section')
                                    <a href="{{ url('/section/create') }}" class="btn text-white btn-warning">
                                        <div class="sm:flex">
                                            Nueva Sección
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
                                        </div>
                                    </a>
                                @endcan

                                <div class="card-header bg-success text-white sm:flex p-3"> <svg
                                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                        fill="#FFFFFF">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path
                                            d="M4 10.5c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zm0-6c-.83 0-1.5.67-1.5 1.5S3.17 7.5 4 7.5 5.5 6.83 5.5 6 4.83 4.5 4 4.5zm0 12c-.83 0-1.5.68-1.5 1.5s.68 1.5 1.5 1.5 1.5-.68 1.5-1.5-.67-1.5-1.5-1.5zM7 19h14v-2H7v2zm0-6h14v-2H7v2zm0-8v2h14V5H7z" />
                                    </svg>
                                    Todas las Secciones
                                </div>


                                <table class="table ">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nombre de sección</th>
                                            <th scope="col">Usuario</th>
                                            <th scope="col">Creado</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-dark text-white">


                                        {{-- @php($i = 1)  --}}
                                        @foreach ($sections as $section)
                                            <tr>
                                                <th scope="row"> {{ $sections->firstItem() + $loop->index }} </th>
                                                <td> {{ $section->section_name }} </td>
                                                <td> {{ $section->user->name }} </td>
                                                <td>
                                                    @if ($section->created_at == null)
                                                        <span class="text-danger"> No Date Set</span>
                                                    @else
                                                        {{ Carbon\Carbon::parse($section->created_at)->diffForHumans() }}
                                                    @endif
                                                </td>
                                                <td>

                                                    @can('edit-section')
                                                        <a href="{{ url('section/edit/' . $section->id) }}"
                                                            class="btn text-white btn-warning">
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


                                                    @can('erase-section')
                                                        <a href="{{ url('softdelete/section/' . $section->id) }}"
                                                            class="btn btn-danger">
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

                                {{ $sections->links() }}

                            </div>
                        </div>






                    </div>
                </div>



                <!-- Trash Part -->

                <div class="container-fluid p-3">
                    <div class="row">


                        <div class="col-md-8">
                            <div class="card border-success">




                                <div class="card-header bg-success text-white sm:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                        width="24px" fill="#FFFFFF">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path
                                            d="M14.12 10.47L12 12.59l-2.13-2.12-1.41 1.41L10.59 14l-2.12 2.12 1.41 1.41L12 15.41l2.12 2.12 1.41-1.41L13.41 14l2.12-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z" />
                                    </svg>
                                    Eliminados
                                </div>


                                <table class="table">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nombre de sección</th>
                                            <th scope="col">Usuario</th>
                                            <th scope="col">Creado</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-dark text-white">
                                        {{--  @php($i = 1)  --}}
                                        @foreach ($trachSec as $section)
                                            <tr>
                                                <th scope="row"> {{ $sections->firstItem() + $loop->index }} </th>
                                                <td> {{ $section->section_name }} </td>
                                                <td> {{ $section->user->name }} </td>
                                                <td>
                                                    @if ($section->created_at == null)
                                                        <span class="text-danger"> No Date Set</span>
                                                    @else
                                                        {{ Carbon\Carbon::parse($section->created_at)->diffForHumans() }}
                                                    @endif
                                                </td>
                                                <td>



                                                    @can('restore-section')
                                                        <a href="{{ url('section/restore/' . $section->id) }}"
                                                            class="btn btn-info">

                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                                viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                                <path
                                                                    d="M15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm2-5V9h8v10H8v-5zm2 4h4v-4h2l-4-4-4 4h2z" />
                                                            </svg>
                                                            Restaurar

                                                        </a>
                                                    @endcan


                                                    @can('delete-section')
                                                        <a href="{{ url('pdelete/section/' . $section->id) }}"
                                                            class="btn btn-danger">

                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                                viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                                <path
                                                                    d="M14.12 10.47L12 12.59l-2.13-2.12-1.41 1.41L10.59 14l-2.12 2.12 1.41 1.41L12 15.41l2.12 2.12 1.41-1.41L13.41 14l2.12-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z" />
                                                            </svg>
                                                            Eliminar

                                                        </a>
                                                    @endcan

                                                </td>


                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                {{ $trachSec->links() }}

                            </div>
                        </div>


                        <div class="col-md-4">

                        </div>



                    </div>
                </div>

                <!-- End Trush -->



            </div>
        </div>

    </section>
@endsection
