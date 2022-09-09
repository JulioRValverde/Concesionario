<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <title>Chevrolet | Citas </title>
    @include('livewire.cliente.citas.confirm')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-header">
                    <h1>Citas agendadas</h1>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-hover align-items-center">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-bottom">#</th>
                                    <th class="border-bottom">Placa Vehiculo</th>
                                    <th class="border-bottom">Sede</th>
                                    <th class="border-bottom">Area</th>
                                    <th class="border-bottom">Puesto</th>
                                    <th class="border-bottom">Fecha Inicio</th>
                                    <th class="border-bottom">Fecha Final</th>
                                    <th class="border-bottom">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($citas as $key => $cita)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $cita->vehiculo->placa }}</td>
                                        <td>{{ $cita->puesto_trabajo->sede->nombre }}</td>
                                        <td class="text-uppercase">
                                            <span class="badge bg-{{ $cita->puesto_trabajo->area->color }}">{{ $cita->puesto_trabajo->area->nombre }} </span> 
                                        </td>
                                        <td>
                                            {{ $cita->puesto_trabajo->numero }}
                                        </td>
                                        <td>
                                            {{ $cita->fecha_inicial}}
                                        </td>
                                        <td>
                                            {{ $cita->fecha_final}}
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
                                                    <span class="visually-hidden">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                                   
                                                    <a class="dropdown-item d-flex align-items-center text-info" href="{{ route('citas.ver-detalle',$cita) }}">
                                                        <span class="fas fa-eye me-2"></span>
                                                        Ver detalle
                                                    </a>
                                                    
                                                    <button type="button" wire:click='remove({{$cita}})' data-bs-toggle="modal"  data-bs-target="#modal-confirmation" class="dropdown-item text-danger d-flex align-items-center" href="#">
                                                        <span class="fas fa-trash me-2"></span>
                                                        Cancelar
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </td>
                        
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="8">No hay citas programadas</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    @include('layouts.messages')
</div>
