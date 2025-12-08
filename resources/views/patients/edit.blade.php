@extends('layouts.app')

@section('title', 'Edit patient')

@section('content')
<h1 class="h3 mb-4">Edit patient</h1>

<form action="{{ route('patients.update', $patient) }}" method="POST">
    @method('PUT')
    @include('patients._form', ['submitLabel' => 'Actualizar'])
</form>
@endsection
