<form wire:submit.prevent="handleSubmitForm" action="#" class="mt-1" method="POST">
    <!-- Form -->
    <div class="form-group mb-2">
        <label class="me-2">Area:</label>
            <select wire:model='area_id' class="form-select @error('area_id') is-invalid @enderror " id="sede" aria-label="">
                <option value="">Seleccione una opción</option>
                @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{ $area->nombre }}</option>
                @endforeach
            </select>
        @error('area_id')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    <div class="d-grid">
        <button type="button" wire:click='asignarTecnico()' class="btn btn-gray-800" >
            Asignar
        </button>
    </div>
</form>