<div class="layout-px-spacing col-12">
    <div class="row sales layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-content">
                    <div class="table-responsive mb-4 mt-4">
                        <table class="table table-hover table-striped datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Capacitación</th>
                                    <th>Usuario a capacitar</th>
                                    <th>Capacitador</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($capacitacionesAsignadas as $asignada )
                                    <tr>
                                        <td>{{ $asignada->capacitacion->nombreDeCapacitacion }}</td>
                                        <td>{{ $asignada->user->name }}</td>
                                        <td>{{ $asignada->capacitador->name }}</td>
                                        <td>
                                            @if ($asignada->estado == 1)
                                                <span class="badge badge-success">Aprobado</span>
                                            @else
                                                <span class="badge badge-danger">Pendiente</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Capacitación</th>
                                    <th>Usuario a capacitar</th>
                                    <th>Capacitador</th>
                                    <th>Estado</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $capacitacionesAsignadas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
