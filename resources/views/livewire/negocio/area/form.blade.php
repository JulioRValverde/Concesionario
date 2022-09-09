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
            <input wire:model="area.nombre" type="text"
                class="form-control @error('area.nombre') is-invalid @enderror "
                placeholder="" id="name" autofocus required>
        </div>
        @error('area.nombre')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    <div class="form-group mb-4">
        <label for="name">
            Color:
        </label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-font"></i>
            </span>
            <input wire:model="area.color" type="text"
                class="form-control @error('area.color') is-invalid @enderror "
                placeholder="" id="name" autofocus required>
        </div>
        @error('area.color')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    <div class="d-grid">
        <button type="button" wire:click='save' class="btn btn-gray-800" >
            {{ !$toEdit ? 'Crear' : 'Editar' }} Area
        </button>
    </div>
</form>