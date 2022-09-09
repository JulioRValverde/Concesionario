<form wire:submit.prevent="handleSubmitForm" action="#" class="mt-1" method="POST">
    <!-- Form -->
    <div class="form-group mb-1">
        <label for="name">
            Placa:
        </label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-font"></i>
            </span>
            <input wire:model="vehiculo.placa" type="text"
                class="form-control @error('vehiculo.placa') is-invalid @enderror "
                placeholder="" id="name" autofocus required>
        </div>
        @error('vehiculo.placa')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <div class="form-group mb-4">
        <label for="name">
            Marca:
        </label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-font"></i>
            </span>
            <input wire:model="vehiculo.marca" type="text"
                class="form-control @error('vehiculo.marca') is-invalid @enderror "
                placeholder="" id="name" autofocus required>
        </div>
        @error('vehiculo.marca')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="name">
           Estilo:
        </label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-font"></i>
            </span>
            <input wire:model="vehiculo.estilo" type="text"
                class="form-control @error('vehiculo.estilo') is-invalid @enderror "
                placeholder="" id="name" autofocus required>
        </div>
        @error('vehiculo.estilo')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="name">
           Modelo:
        </label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-font"></i>
            </span>
            <input wire:model="vehiculo.modelo" type="text"
                class="form-control @error('vehiculo.modelo') is-invalid @enderror "
                placeholder="" id="name" autofocus required>
        </div>
        @error('vehiculo.modelo')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    
    @if($isEmpleado)
        <div class="form-check form-switch">
            <input wire:model='isPropio' class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Vehiculo Propio</label>
        </div>
        @if(!$isPropio)
            <div class="form-group mb-2">
                <label class="me-2" for="sede">Propietario::</label>
                    <select wire:model='vehiculo.user_id' class="form-select @error('vehiculo.user_id') is-invalid @enderror " id="sede" aria-label="">
                        <option value="">Seleccione una opción</option>
                        @foreach ($propietarios as $propietario)
                            <option value="{{$propietario->id}}">{{ $propietario->first_name.' '.$propietario->last_name }}</option>
                        @endforeach
                    </select>
                @error('vehiculo.user_id')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        @endif
            
    @endif
    <div class="d-grid">
        <button type="button" wire:click='save' class="btn btn-gray-800" >
            {{ !$toEdit ? 'Crear' : 'Editar' }} Vehiculo
        </button>
    </div>
</form>