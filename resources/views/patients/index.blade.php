@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Pacientes</h1>
        <a class="btn btn-primary" href="{{ route('patients.create') }}">
            Nuevo Paciente
        </a>
    </div>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-light">
            <tr>
               <th>Documento</th>
                <th>Nombre Completo</th>
                <th>Celular</th>
                <th>EPS</th>
                <th>Estado</th>
                <th style="width:180px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($patients as $patient)
            <tr>
                <td>{{$patient->id_type}} {{$patient->id_number}}</td>
                <td>{{$patient->full_name}}</td>
                <td>{{$patient->cellphone}}</td>
                <td>{{$patient->eps}}</td>
                <td>
                    @if ($patient->status === 'active')
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-secondary">Inactivo</span>
                    @endif
                </td>

                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('patients.edit', $patient) }}">Editar</a>

                <form   class="d-inline" 
                        action="{{ route('patients.destroy', $patient)}}"
                        method="POST"
                        onsubmit="return confirm('¿Seguro que quiere desactivar este paciente?');">
                        @csrf {{-- Protección contra CSRF --}}
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">
                            Desactivar
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="6">Pacientes no encontrados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
{{ $patients->links() }}
@endsection