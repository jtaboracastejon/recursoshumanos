<div class="layout-px-spacing col-12">
    <div class="row sales layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-content col-12 row">
                    {{-- Asignar a usuario --}}
                    <div class="col-6 mx-auto">
                        <div class="row no-gutters">
                            <div class="form-group w-100">
                                <label>Buscar Usuario a Capacitar</label>
                                <div class="search-input-group-style input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
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
                            @endif
                        </div>

                        <div class="row">
                            @if (/* $searchIngredient != null || */ $showTableUsuarios == true)
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
                                        @if (count($dataUsuarios) < 1) <tr>
                                            <td colspan="3">
                                                <h5>Sin Resultados</h5>
                                            </td>
                                            </tr>
                                            @endif
                                            {{-- Convertimos el array en un stdclass Object para poder iterarlo y
                                            seleccionar sus propiedades con -> --}}
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
                                                    <a href="javascript:void(0)" class="btn btn-success" title="Asignar"
                                                        wire:click="selectedUsuario({{ $user->id }})">
                                                        Evaluar</i>
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
                <div class="row col-6 mx-auto">
                    @if ($usuario_id > 0)
                    <div class="row">
                        <div class="form-group">
                            <h3 class="p-2">Nivel de iniciativa
                                <select name="" id="" wire:model.lazy="niveldeIniciativa" class="form-control">
                                    <option value="Elegir">Seleccione</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </h3>
                            @error('niveldeIniciativa') <span class="text-danger er">{{$message}}</span>@enderror
                        </div>

                        <div>
                            <h3 class="p-2">Generación de ideas
                                <select name="" id="" wire:model.lazy="generaciondeIdeas" class="form-control">
                                    <option value="Elegir" disabled>Seleccione</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </h3>
                            @error('generaciondeIdeas') <span class="text-danger er">{{$message}}</span>@enderror
                        </div>

                        <div>
                            <h3 class="p-2">Resolución de problemas
                                <select name="" id="" wire:model.lazy="resoluciondeProblemas" class="form-control">
                                    <option value="Elegir" disabled>Seleccione</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </h3>
                            @error('resoluciondeProblemas') <span class="text-danger er">{{$message}}</span>@enderror
                        </div>

                        <div>
                            <h3 class="p-2">Cumplimiento de objetivos
                                <select name="" id="" wire:model.lazy="cumplimientodeObjetivo" class="form-control">
                                    <option value="Elegir" disabled>Seleccione</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </h3>
                            @error('cumplimientodeObjetivo') <span class="text-danger er">{{$message}}</span>@enderror
                        </div>

                        <div>
                            <h3 class="p-2">Calidad de trabajo
                                <select name="" id="" wire:model.lazy="calidaddeTrabajo" class="form-control">
                                    <option value="Elegir" disabled>Seleccione</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </h3>
                            @error('calidaddeTrabajo') <span class="text-danger er">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <button type="button" wire:click.prevent="Store()" class="btn btn-dark">Guardar</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
