@extends('layouts.app')

@section('title', 'Crear Paciente')

@section('content')

<h1 class="h3 mb-4">Nuevo paciente</h1>

<form action="{{ route('patients.store') }}" method="POST">
    @include('patients._form', ['patient' => new \App\Models\Patient(), 'submitLabel' => 'Crear'])
</form>

@endsection