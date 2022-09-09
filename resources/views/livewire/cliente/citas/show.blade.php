<div>
    {{-- Success is as dangerous as failure. --}}
    <title>Chevrolet | Cita </title>
    <div class="row">
        <div class="col-6 mb-4 mx-auto">
            <div class="card border-0 shadow components-section text-center">
                <div class="card-header">
                    <h1>Cita #{{ $cita->id }}</h1>
                    <h5 class="text-mute">Agendada {{ $cita->created_at->diffForHumans() }}</h5>
                </div>
                <div class="card-body ">
                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-6 mx-auto">
                            <!-- Form -->
                            <div class="mb-4">
                                <label for="">Placa:</label>
                                <input type="text" value="{{ $cita->vehiculo->placa }}" class="form-control" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="">Estilo:</label>
                                <input type="text" value="{{ $cita->vehiculo->estilo }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 mx-auto">
                            <div class="mb-4">
                                <label for="">Marca:</label>
                                <input type="text" value="{{ $cita->vehiculo->marca }}" class="form-control" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="">Modelo:</label>
                                <input type="text" value="{{ $cita->vehiculo->modelo }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <hr class="shadow"> 
                    <div class="row mb-4">
                        <h3>Ubicación</h3>
                        <div class="col-lg-6 col-sm-6 mx-auto">
                            <label for="">Sede:</label>
                            <input type="text" value="{{ $cita->puesto_trabajo->sede->nombre.' Dirección '.$cita->puesto_trabajo->sede->direccion }}" class="form-control mb-1" readonly>
                            <label for="">Area:</label>
                            <br>
                            <span class="badge bg-{{ $cita->puesto_trabajo->area->color }}">
                                {{ $cita->puesto_trabajo->area->nombre }} 
                            </span>
                            <br>
                            <label for="">Puesto:</label>
                            <input type="text" value="{{ $cita->puesto_trabajo->numero }}" class="form-control" readonly>

                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <label for="">Fecha Inicial:</label>
                            <input type="text" value="{{ $cita->fecha_inicial }}" class="form-control mb-1" readonly>

                            <label for="">Fecha Final:</label>
                            <input type="text" value="{{ $cita->fecha_final }}" class="form-control" readonly>
                        </div>
                    </div>
                    <hr class="shadow">
                    <div class="row mb-4">
                        <h3>Propietario</h3>
                        <div class="col-lg-6 col-sm-6 mx-auto">
                            <label for="">Nombre Completo:</label>
                            <input type="text" value="{{ $cita->vehiculo->user->first_name.' '.$cita->vehiculo->user->last_name }}" class="form-control mb-1" readonly>
                            <label for="">Correo:</label>
                            <input type="text" value="{{ $cita->vehiculo->user->email }}" class="form-control mb-1" readonly>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <label for="">Cédula:</label>
                            <input type="text" value="{{ $cita->vehiculo->user->id_number }}" class="form-control mb-1" readonly>

                            <label for="">Telefono:</label>
                            <input type="text" value="{{ $cita->vehiculo->user->number }}" class="form-control" readonly>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    @include('layouts.messages')
</div>
