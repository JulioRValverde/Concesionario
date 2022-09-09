<div>
    {{-- Be like water. --}}
    <title>Chevrolet | Usuarios </title>
   @include('livewire.usuarios.modal')
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
        <div class="d-flex align-items-center form-check form-switch">
            <input wire:model='filtrarTecnicos' class="form-check-input m-2" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Técnicos</label>
        </div>
    </div>
    
    
    <div class="mt-3 card card-body shadow border-0 table-wrapper table-responsive">
        <table class="table user-table table-hover align-items-center">
            <thead>
                <tr>
                    <th class="border-bottom">Documento</th>
                    <th class="border-bottom">Nombre Completo</th>
                    <th class="border-bottom">Rol</th>
                    @if($filtrarTecnicos)
                        <th class="border-bottom">Area</th>
                        <th class="border-bottom">Estado</th>
                    @endif
                    <th class="border-bottom">Fecha de creado</th>
                    <th class="border-bottom">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                    <tr>
                        <td>
                            {{ $usuario->id_number }}
                        </td>
                        <td>
                            <a href="#" class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name={{$usuario->first_name.' '.$usuario->last_name }}" class="avatar rounded-circle me-3"
                                    alt="Avatar">
                                <div class="d-block">
                                    <span class="fw-bold">{{ $usuario->first_name.' '.$usuario->last_name }}</span>
                                    <div class="small text-gray">{{ $usuario->email }}</div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <ul>
                                @foreach ($usuario->roles as $role)
                                <li>{{ $role->name }}</li>
                                @endforeach
                            </ul>
                            
                        </td>
                        @if($filtrarTecnicos)
                            <td>
                                <span class="badge bg-{{$usuario->tecnico->area->color}} badge-pill">
                                     {{ $usuario->tecnico->area->nombre }} 
                                </span> 
                            </td>
                            <td>
                                @if ($usuario->tecnico->estado==1)
                                    <span class="badge bg-success badge-pill">
                                      Activo 
                                    </span> 
                                @else
                                <span class="badge bg-warning badge-pill">
                                    Inactivo 
                                  </span> 
                                @endif
                            </td>
                        @endif
                        <td><span class="fw-normal d-flex align-items-center">{{ $usuario->created_at }}</span></td>
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
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                    @if ($usuario->hasRole('Tecnico'))
                                    <a wire:click='quitarTecnico({{ $usuario }})'class="dropdown-item d-flex align-items-center" href="#">
                                        <span class="fas fa-user-shield me-2"></span>
                                        Quitar tecnico
                                    </a>
                                    @else
                                        <button type="button" data-bs-toggle="modal" wire:click='prepararAsignacion({{ $usuario }})' data-bs-target="#modal-states" class="dropdown-item text-dark d-flex align-items-center" href="#">
                                            <span class="fas fa-user-shield me-2"></span>
                                            Convertir en tecnico
                                        </button>
                                    @endif
                                    
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay usuarios registrados</td> 
                    </tr>
                @endforelse
                
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $usuarios->links() }}
    </div>
    @include('layouts.messages')
</div>
