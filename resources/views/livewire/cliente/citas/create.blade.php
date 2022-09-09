<div>

    {{-- The Master doesn't talk, he acts. --}}
    <title>Chevrolet | Cita </title>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-header">
                    <h1>Agendamiento de citas</h1>
                </div>
                <div class="card-body">     
                    <div class="row mb-4">
                        <div class="col-lg-4 col-sm-6">
                            <!-- Form -->
                            <div class="mb-4">
                                <label for="">Placa:</label>
                                <input type="text" value="{{ $vehiculo->placa }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-4">
                                <label for="">Marca:</label>
                                <input type="text" value="{{ $vehiculo->marca }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 d-flex justify-content-between">
                            <div class="mb-4">
                                <label for="">Estilo:</label>
                                <input type="text" value="{{ $vehiculo->estilo }}" class="form-control" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="">Modelo:</label>
                                <input type="text" value="{{ $vehiculo->modelo }}" class="form-control" readonly>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="birthday">Birthday</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </span>
                                    <input data-datepicker="" class="form-control" id="birthday" type="text" placeholder="dd/mm/yyyy" required>                                               
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <hr class="shadow">
                    <h3>Ubicación</h3>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-sm-6">
                            <!-- Form -->
                            <div class="mb-4">
                                <label class="my-1 me-2" for="sede">Sede:</label>
                                <select wire:model='sede_id' class="form-select @error('sede_id') is-invalid @enderror " id="sede" aria-label="">
                                    <option value="">Seleccione una opción</option>
                                    @foreach ($sedes as $sede)
                                        <option value="{{$sede->id}}">{{ $sede->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('sede_id')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="mb-4">
                                <label class="me-2" for="sede">Especialidad:</label>
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
                        </div>
                        <div class="col-lg-5 col-sm-5 d-flex justify-content-between">
                            <div class="mb-4 mr-3">
                                <div class="mb-3 col-lg-12 col-sm-12">
                                    <label for="">Fecha Entrada:</label>
                                    <div class="input-group">
                                        <input wire:model='fecha_inicial' min="{{ $hoy }}" class="form-control @error('fecha_inicial') is-invalid @enderror " type="datetime-local" >
                                    </div>
                                    @error('fecha_inicial')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div> 
                            </div>
                            <div class="mb-4 mr-3">
                                <div class="mb-3 col-lg-12 col-sm-12">
                                    <label for="">Fecha Salida:</label>
                                    <div class="input-group">
                                        <input wire:model='fecha_final' min="{{ $hoy }}" class="form-control @error('fecha_final') is-invalid @enderror " type="datetime-local">                                               
                                    </div>
                                    @error('fecha_final')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div> 
                            </div>
                            {{-- <div class="mb-3">
                                <label for="birthday">Birthday</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </span>
                                    <input data-datepicker="" class="form-control" id="birthday" type="text" placeholder="dd/mm/yyyy" required>                                               
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-lg btn-primary" wire:click='save' type="button">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.messages')
</div>


