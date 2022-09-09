<form wire:submit.prevent="handleSubmitForm" action="#" class="mt-1" method="POST">
    <!-- Form -->
    <div class="form-group mb-1">
        <label for="name">
            Nombre:
        </label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-font"></i>
            </span>
            <input wire:model="sede.nombre" type="text"
                class="form-control @error('sede.nombre') is-invalid @enderror "
                placeholder="" id="name" autofocus required>
        </div>
        @error('sede.nombre')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <div class="form-group mb-4">
        <label for="name">
            Dirección:
        </label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-font"></i>
            </span>
            <input wire:model="sede.direccion" type="text"
                class="form-control @error('sede.direccion') is-invalid @enderror "
                placeholder="" id="name" autofocus required>
        </div>
        @error('sede.direccion')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="name">
            Centro de costo:
        </label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-font"></i>
            </span>
            <input wire:model="sede.centro_costo" type="text"
                class="form-control @error('sede.centro_costo') is-invalid @enderror "
                placeholder="" id="name" autofocus required>
        </div>
        @error('sede.centro_costo')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-gray-800" >
            {{ !$toEdit ? 'Crear' : 'Editar' }} Sede
        </button>
    </div>
</form>