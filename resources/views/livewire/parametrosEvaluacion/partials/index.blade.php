<div class="layout-px-spacing col-12">
    <div class="row sales layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-content">
                    <div class="table-responsive mb-4 mt-4">
                        <table class="table table-hover table-striped datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Usuario Evaluado</th>
                                    <th>Nivel de iniciativa</th>
                                    <th>Generación de ideas</th>
                                    <th>Resolución de problemas</th>
                                    <th>Cumplimiento de objetivos</th>
                                    <th>Calidad de trabajo</th>
                                    <th>Evaluador</th>
                                    <th>Fecha y hora</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evaluaciones as $evaluacion)
                                    <tr>
                                        <td>{{ $evaluacion->nombreDeUsuarioEvaluado }}</td>
                                        <td>{{ $evaluacion->niveldeIniciativa }}</td>
                                        <td>{{ $evaluacion->generaciondeIdeas }}</td>
                                        <td>{{ $evaluacion->resoluciondeProblemas }}</td>
                                        <td>{{ $evaluacion->cumplimientodeObjetivo }}</td>
                                        <td>{{ $evaluacion->calidaddeTrabajo }}</td>
                                        <td>{{ $evaluacion->nombreDeUsuarioEvaluador }}</td>
                                        <td>{{ $evaluacion->created_at }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Usuario Evaluado</th>
                                    <th>Nivel de iniciativa</th>
                                    <th>Generación de ideas</th>
                                    <th>Resolución de problemas</th>
                                    <th>Cumplimiento de objetivos</th>
                                    <th>Calidad de trabajo</th>
                                    <th>Evaluador</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
