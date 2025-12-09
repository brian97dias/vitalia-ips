@csrf

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label" for="id_type">Tipo de documento</label>
        <select class="form-select" name="id_type" id="id_type" required>
            <option value="">Tipo de identificación</option>
            @php
                $types = [
                    'CC'  => 'Cédula de ciudadanía',
                    'TI'  => 'Tarjeta de identidad',
                    'RC'  => 'Registro civil',
                    'CE'  => 'Cédula de extranjería',
                    'PA'  => 'Pasaporte',
                    'TE'  => 'Tarjeta de extranjería',
                    'PEP' => 'Permiso especial de permanencia',
                ];
                $selectedType = old('id_type', $patient->id_type ?? '');
            @endphp
                @foreach ($types as $key => $value)
                    <option value="{{ $key }}" @selected($selectedType === $key)>
                        {{ $value }}    
                    </option>
                @endforeach  
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label" for="id_number">Numero</label>
        <input 
            class="form-control"
            type="text"
            name="id_number"
            id="id_number"
            value="{{ old('id_number', $patient->id_number ?? '') }}"
            required>    
    </div>
    
    <div class="col-md-4 mb-3">
        <label class="form-label" for="first_name">Nombres</label>
        <input
            class="form-control" 
            type="text"
            name="first_name"
            id="first_name"
            value="{{ old('first_name', $patient->first_name ?? '') }}"
            required>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label" for="last_name">Apellidos</label>
        <input
            class="form-control"
            type="text"
            name="last_name"
            id="last_name"
            value="{{ old('last_name', $patient->last_name ?? '') }}"
            required 
            >
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label" for="cellphone">Celular</label>
        <input
            class="form-control"
            type="text"
            name="cellphone"
            id="cellphone"
            value="{{ old('cellphone', $patient->cellphone ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="eps">EPS</label>
        <input
            class="form-control"
            type="text"
            name="eps"
            id="eps"
            value="{{ old('eps', $patient->eps ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label" for="status">Estado</label>
        @php
            $selectedStatus = old('status', $patient->status ?? 'active');
        @endphp
        <select class="form-select" name="status" id="status" required>
            <option value="active" @select($selectedStatus === 'active')>Activo</option>
            <option value="inactive" @select($selectedStatus === 'inactive')>Inactivo</option>
        </select>
    </div>
</div>

<div class="mt-3">
    <button class="btn btn-primary" type="submit">
        {{ $submitLabel ?? 'Guardar' }}
    </button>
    <a class="btn btn-secondary" href="{{ route('patients.index') }}">Cancelar</a>
</div>