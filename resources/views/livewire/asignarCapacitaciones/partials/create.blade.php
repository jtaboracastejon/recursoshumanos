<div class="layout-px-spacing col-12">
    <div class="row sales layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-content col-12 row">
                    <div class="col-6">

                        <div class="row no-gutters">
                            <div class="form-group w-100">
                                <label>Buscar Capacitación</label>
                                <div class="search-input-group-style input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65">
                                                </line>
                                            </svg></span>
                                    </div>
                                    <input type="text" wire:keydown="searchCapacitacion()"
                                        wire:model="searchCapacitacion" placeholder="Buscar Capacitacion"
                                        class="form-control">
                                    <input type="hidden" wire:model="capacitacion_id">
                                </div>
                            </div>
                            @if ($capacitacion_id != '')
                                <div class="form-group mr-2">
                                    <label>Nombre de la capacitación</label>
                                    <input type="text" wire:model="nombreDeCapacitacion" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group mr-2">
                                    <label>Descripción</label>
                                    <input type="text" wire:model="descripcion" class="form-control" readonly>
                                </div>
                                <div class="form-group mr-2">
                                    <label>Enlace de YouTube</label>
                                    <input type="text" wire:model="enlaceDeYoutube" class="form-control" readonly>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            @if (/* $searchIngredient != null ||  */ $showTableCapacitacion == true)
                                <div class="table-responsive mb-4 mt-4">
                                    <table class="table table-hover table-striped datatable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nombre de la capacitación</th>
                                                <th>Descripción</th>
                                                <th>Enlace de YouTube</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($dataCapacitacion) < 1)
                                                <tr>
                                                    <td colspan="3">
                                                        <h5>Sin Resultados</h5>
                                                    </td>
                                                </tr>
                                            @endif
                                            {{-- Convertimos el array en un stdclass Object para poder iterarlo y seleccionar sus propiedades con -> --}}
                                            @php
                                                $capacitaciones = json_decode($dataCapacitacion, false);
                                            @endphp
                                            @foreach ($capacitaciones as $capacitacion)
                                                <tr>
                                                    <td>{{ $capacitacion->nombreDeCapacitacion }}</td>
                                                    <td>{{ $capacitacion->descripcion }}</td>
                                                    <td><a href="{{ $capacitacion->enlaceDeYoutube }}"
                                                            target="_blank">Ver video</a></td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="btn" title="Asignar"
                                                            wire:click="selectedCapacitacion({{ $capacitacion->id }})">
                                                            <i class="fa fa-plus fa-xl"></i></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre de la capacitación</th>
                                                <th>Descripción</th>
                                                <th>Enlace de YouTube</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                {{-- --}}
                                {{-- Array Original
                                {{$dataSearchIngredient}} --}}
                            @endif
                        </div>
                    </div>

                    {{-- Asignar a usuario --}}
                    <div class="col-6">
                        <div class="row no-gutters">
                            <div class="form-group w-100">
                                <label>Buscar Usuario a Capacitar</label>
                                <div class="search-input-group-style input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65">
                                                </line>
                                            </svg></span>
                                    </div>
                                    <input type="text" wire:keydown="searchUsuario()" wire:model="searchUsuario"
                                        placeholder="Buscar usuario por nombre" class="form-control">
                                    <input type="hidden" wire:model="usuario_id">
                                </div>
                            </div>
                            @if ($usuario_id != '')
                                <div class="form-group mr-2">
                                    <label>Nombre de usuario a capacitar</label>
                                    <input type="text" wire:model="nombreDeUsuario" class="form-control" readonly>
                                </div>
                                <div class="form-group mr-2">
                                    <label>Correo</label>
                                    <input type="text" wire:model="email" class="form-control" readonly>
                                </div>
                                <div class="form-group mr-2">
                                    <label>Rol</label>
                                    <input type="text" wire:model="rol" class="form-control" readonly>
                                </div>
                                <div class="form-group mr-2">
                                    <label>Estado Campaña</label>
                                    <select name="" id="" wire:model.lazy="statusCapacitacion"
                                        class="form-control">
                                        <option value="Elegir">Seleccionar</option>
                                        <option value="ASIGNADA">ASIGNADA</option>
                                        <option value="FINALIZADO">FINALIZADO</option>
                                    </select>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            @if (/* $searchIngredient != null ||  */ $showTableUsuarios == true)
                                <div class="table-responsive mb-4 mt-4">
                                    <table class="table table-hover table-striped datatable" style="width:100%">

                                        <thead>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Estado</th>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                            @if (count($dataUsuarios) < 1)
                                                <tr>
                                                    <td colspan="3">
                                                        <h5>Sin Resultados</h5>
                                                    </td>
                                                </tr>
                                            @endif
                                            {{-- Convertimos el array en un stdclass Object para poder iterarlo y seleccionar sus propiedades con -> --}}
                                            @php
                                                $usuarios = json_decode($dataUsuarios, false);
                                            @endphp
                                            @foreach ($usuarios as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->status }}</td>
                                                    <td>{{ $user->rol }}</td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="btn" title="Asignar"
                                                            wire:click="selectedUsuario({{ $user->id }})">
                                                            <i class="fa fa-plus fa-xl"></i></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Estado</th>
                                                <th>Rol</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                {{-- --}}
                                {{-- Array Original
                                {{$dataSearchIngredient}} --}}
                            @endif
                        </div>

                    </div>
                </div>
                <div class="row col-12">
                    @if($capacitacion_id>0 && $usuario_id>0)
                        <button type="button" wire:click.prevent="Store()" class="btn btn-dark">Guardar</button>
                    @endif
                    @if ($selectedId > 1)
                        <button type="button" wire:click.prevent="Update()" class="btn btn-dark close-modal">Actualizar</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
