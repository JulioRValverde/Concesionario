<div>
    {{-- Be like water. --}}
    @include('livewire.negocio.puesto-trabajo.modal')
    @include('livewire.negocio.puesto-trabajo.confirm')
    <title>Chevrolet | Puestos de trabajo </title>
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
                    <li class="breadcrumb-item active" aria-current="page">Puestos de trabajo</li>
                </ol>
            </nav>
            <h2 class="h4">Lista de puestos</h2>
            <p class="mb-0">Puestos disponibles en la base de datos</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" wire:click="create()" data-bs-toggle="modal" data-bs-target="#modal-states" class="btn btn-sm btn-success text-white d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Nuevo Puesto De Trabajo
            </button>
        </div>
    </div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light text-center">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Sede</th>
                            <th class="border-0">Numero</th>
                            <th class="border-0">Especialidad</th>
                            <th class="border-0 rounded-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                       @forelse ($puestos as $puesto)
                           <tr>
                                <td>{{ $puesto->id }}</td>
                                <td>{{ $puesto->sede->nombre }}</td>
                                <td>{{ $puesto->numero }}</td>
                                
                                <td class="text-uppercase">
                                    <span class="badge bg-{{$puesto->area->color}} badge-pill"> {{ $puesto->area->nombre }} </span> 
                                </td>
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
                                            <button type="button" wire:click='edit({{$puesto}})'  data-bs-toggle="modal" data-bs-target="#modal-states" class="dropdown-item text-info d-flex align-items-center" href="#">
                                                <span class="fas fa-edit me-2"></span>
                                                Editar
                                            </button>
                                             <button type="button" wire:click='remove({{$puesto}})' data-bs-toggle="modal"  data-bs-target="#modal-confirmation" class="dropdown-item text-danger d-flex align-items-center" href="#">
                                                <span class="fas fa-trash me-2"></span>
                                                Eliminar
                                            </button>
                                        </div>
                                    </div>
                                </td>
                           </tr>
                       @empty
                           <tr>
                                <td colspan="4">No hay puestos de trabajo</td>
                           </tr>
                       @endforelse
                        <!-- End of Item -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layouts.messages')
</div>
