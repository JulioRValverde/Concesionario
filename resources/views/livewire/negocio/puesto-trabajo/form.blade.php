<form wire:submit.prevent="handleSubmitForm" action="#" class="mt-1" method="POST">
    <!-- Form -->
    <div class="form-group mb-1">
        <label for="name">
            Número:
        </label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-font"></i>
            </span>
            <input wire:model="puestoTrabajo.numero" type="text"
                class="form-control @error('puestoTrabajo.numero') is-invalid @enderror "
                placeholder="" id="name" autofocus required>
        </div>
        @error('puestoTrabajo.numero')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label class="my-1 me-2" for="sede">Sede:</label>
            <select wire:model='puestoTrabajo.sede_id' class="form-select @error('puestoTrabajo.sede_id') is-invalid @enderror " id="sede" aria-label="">
                <option value="">Seleccione una opción</option>
                @foreach ($sedes as $sede)
                    <option value="{{$sede->id}}">{{ $sede->nombre }}</option>
                @endforeach
            </select>
        @error('puestoTrabajo.sede_id')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label class="me-2" for="sede">Area:</label>
            <select wire:model='puestoTrabajo.area_id' class="form-select @error('puestoTrabajo.area_id') is-invalid @enderror " id="sede" aria-label="">
                <option value="">Seleccione una opción</option>
                @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{ $area->nombre }}</option>
                @endforeach
            </select>
        @error('puestoTrabajo.area_id')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label class="my-1 me-2" for="sede">Encargado:</label>
            <select wire:model='puestoTrabajo.user_id'class="form-select @error('puestoTrabajo.user_id') is-invalid @enderror " id="sede" aria-label="">
                <option value="">Selecciona una opción</option>
                @foreach ($tecnicos as $tecnico)
                    <option value="{{$tecnico->id}}">{{ $tecnico->first_name.' '.$tecnico->last_name }}</option>
                @endforeach
            </select>
        @error('puestoTrabajo.user_id')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    <div class="d-grid">
        <button type="button" wire:click='save' class="btn btn-gray-800" >
            {{ !$toEdit ? 'Crear' : 'Editar' }} Puesto De Trabajo
        </button>
    </div>
</form>