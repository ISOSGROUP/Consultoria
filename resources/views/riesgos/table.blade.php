<div class="table-responsive-sm">


 

    <table class="table table-striped" id="riesgos-table">
        <thead>
            <tr>
        <th>Riesgo / Oportunidad</th>
        <th>Proceso</th>
        <th>Probabilidad</th>
        <th>Impacto</th>
        <th>Nivel de riesgo</th>
        {{--

        <th>Partes Interesadas</th>
        <th>Foda Referencia</th>
        <th>Acción a tomar</th>
        <th>Responsible</th>
        <th>Resources</th>
        <th>Execution Time</th>
        <th>Responsible For Monitoring</th>
        <th>Tracking Status</th>
        <th>Is Effective</th> 
        <th>Comment On Effectiveness</th> 
        
        --}}
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($riesgos as $riesgos)
            <tr>
                <td>{{ (($riesgos->risk_chance_radio == "R") ?"Riesgo": (($riesgos->risk_chance_radio == "O") ?"Oportunidad":"") ) }}</td>
            <td>{{ $riesgos->process }}</td>
            <td>{{ $probability[$riesgos->probability] }}</td>
            <td>{{ $impact[$riesgos->impact] }}</td>
            <td>{{ $riesgos->risk_level }}</td>

            {{-- 

            <td>{{ $riesgos->interested_part }}</td>
            <td>{{ $riesgos->foda_reference }}</td>
            <td>{{ $riesgos->action_to_take }}</td>
            <td>{{ $riesgos->responsible }}</td>
            <td>{{ $riesgos->resources }}</td>
            <td>{{ $riesgos->execution_time }}</td>
            <td>{{ $riesgos->responsible_for_monitoring }}</td>
            <td>{{ $riesgos->tracking_status }}</td>
            <td>{{ $riesgos->is_effective }}</td>
            <td>{{ $riesgos->comment_on_effectiveness }}</td> 
            
            --}}
                <td>
                    {!! Form::open(['route' => ['riesgos.destroy', $riesgos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('riesgos.show', [$riesgos->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('riesgos.edit', [$riesgos->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>