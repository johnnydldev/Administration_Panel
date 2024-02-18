@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-rol')
                                <a class="btn btn-warning" href="{{ route('roles.create') }}">Nuevo
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                </a>
                            @endcan


                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Rol</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td class="">

                                                <div class="">
                                                    @can('editar-rol')
                                                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">


                                                            Editar
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                                viewBox="0 0 24 24" width="14px" fill="#FFFFFF">
                                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                                <path
                                                                    d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z" />
                                                            </svg>

                                                        </a>
                                                    @endcan

                                                    @can('borrar-rol')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                        {{-- {!! Form::submit('Borrar ', ['class' => 'btn btn-danger']) !!}
                                                --}}
                                                        {{ Form::button('Borrar <i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) }}

                                                        {!! Form::close() !!}
                                                    @endcan

                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $roles->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
