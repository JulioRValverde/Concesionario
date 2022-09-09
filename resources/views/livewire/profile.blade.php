<div>
    <title>Chevrolet | Mi Perfil</title>
    <div class="row mt-4">
        <div class="col-12 col-xl-8 mx-auto">
            @if($showSavedAlert)
            <div class="alert alert-success" role="alert">
                Saved!
            </div>
            @endif
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">General information</h2>
                <form wire:submit.prevent="save" action="#" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="first_name">Nombres</label>
                                <input wire:model="user.first_name" class="form-control @error('user.first_name') is-invalid @enderror" id="first_name" type="text"
                                required>
                            </div>
                            @error('user.first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <div class=" mt-3">
                                <label>Cédula</label>
                                <input wire:model="user.id_number" class="form-control @error('user.id_number') is-invalid @enderror" type="text"
                                     required>
                            </div>
                            @error('user.id_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Apellidos</label>
                                <input wire:model="user.last_name" class="form-control @error('user.last_name') is-invalid @enderror" id="last_name" type="text"
                                    >
                            </div>
                            @error('user.last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror

                            <div class="col-md-12 mb-3 mt-3">
                                <label for="gender">Género</label>
                                <select wire:model="user.gender" class="form-select mb-0 @error('user.gender') is-invalid @enderror" id="gender"
                                    aria-label="Gender select example">
                                    <option selected>Selecciona una opción...</option>
                                    <option value="Female">Femenino</option>
                                    <option value="Male">Masculino</option>
                                    <option value="Other">Otro</option>
                                </select>
                                @error('user.gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                    </div>
                    <h2 class="h5 my-4">Contacto</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input wire:model="user.email" class="form-control @error('user.email') is-invalid @enderror" id="email" type="email"
                                 disabled>
                            </div>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-sm-9 mb-3">
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input wire:model="user.address" class="form-control @error('user.address') is-invalid @enderror" id="address" type="text">
                            </div>
                            @error('user.address')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="form-group">
                                <label for="number">Número Teléfono</label>
                                <input wire:model="user.number" class="form-control @error('user.number') is-invalid @enderror " id="number" type="text">
                            </div>
                            @error('user.number')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Save All</button>
                    </div>
                </form>
                @if($showDemoNotification)
                <div class="alert alert-info mt-2" role="alert">
                    You cannot do that in the demo version.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>