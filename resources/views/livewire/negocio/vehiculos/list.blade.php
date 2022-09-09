<div>
    {{-- The whole world belongs to you. --}}
    @include('livewire.negocio.vehiculos.modal')
    @include('livewire.negocio.vehiculos.confirm')
    <title>Chevrolet | Vehiculos </title>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vehiculos</li>
                </ol>
            </nav>
            <h2 class="h4">Lista de vehiculos</h2>
            <p class="mb-0">Vehiculos disponibles en la base de datos</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" wire:click="create()" data-bs-toggle="modal" data-bs-target="#modal-states" class="btn btn-sm btn-success text-white d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Nuevo vehiculo
            </button>
        </div>
    </div>
    <div class="card border-0 shadow mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-start w-100" id="navbarSupportedContent">
                <div class="d-flex align-items-center">
                    <div class="input-group input-group-merge search-bar">
                        <span class="input-group-text" id="topbar-addon"><svg class="icon icon-xs"
                            x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                        </svg></span></span>
                        <input  wire:model='buscar' type="text" class="form-control" placeholder="Buscar">
                    </div>    
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light text-center">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Placa</th>
                            <th class="border-0">Marca</th>
                            <th class="border-0">Estilo</th>
                            <th class="border-0">Modelo</th>
                            <th class="border-0 rounded-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                       @forelse ($vehiculos as $vehiculo)
                           <tr>
                                <td>{{ $vehiculo->id }}</td>
                                <td>{{ $vehiculo->placa }}</td>
                                <td>{{ $vehiculo->marca }}</td>
                                <td>{{ $vehiculo->estilo }}</td>
                                <td>{{ $vehiculo->modelo }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                                </path>
                                            </svg>
                                            <span class="visually-hidden">Mostrar opciones</span>
                                        </button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                            <a href="{{ route('agendar-cita',$vehiculo) }}"  class="dropdown-item text-dark d-flex align-items-center">
                                                <span class="fas fa-calendar me-2"></span>
                                                Programar Cita
                                            </a>
                                            <button type="button" wire:click='edit({{$vehiculo}})'  data-bs-toggle="modal" data-bs-target="#modal-states" class="dropdown-item text-info d-flex align-items-center" href="#">
                                                <span class="fas fa-edit me-2"></span>
                                                Editar
                                            </button>
                                            @if(auth()->user()->hasRole('Administrador'))
                                                <button type="button" wire:click='remove({{$vehiculo}})' data-bs-toggle="modal"  data-bs-target="#modal-confirmation" class="dropdown-item text-danger d-flex align-items-center" href="#">
                                                    <span class="fas fa-trash me-2"></span>
                                                    Eliminar
                                                </button>
                                            @endif
                                             
                                        </div>
                                    </div>
                                </td>
                           </tr>
                       @empty
                           <tr>
                                <td colspan="4">No hay vehiculos</td>
                           </tr>
                       @endforelse
                        <!-- End of Item -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-4">
        {{ $vehiculos->links() }}
    </div>
    @include('layouts.messages')
</div>

