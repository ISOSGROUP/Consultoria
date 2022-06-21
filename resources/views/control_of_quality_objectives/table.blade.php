@php
    $measurement_frequency = ["1"=>"Mensual","2"=>"Bimestral","3"=>"Trimestral","4"=>"cuatrimestre","6"=>"Semestral","12"=>"Anual"];
@endphp
<div class="table-responsive-sm">
    <table class="table table-striped" id="controlOfQualityObjectives-table">
        <thead>
            <tr>
                <th>Política de Calidad</th>
        <th>Objetivos</th>
        <th>Indicador</th>
        <th>Formula</th>
        <th>Frecuencia de medición</th>
        <th>Meta</th>
        <th>Estado hasta la fecha</th>


                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($controlOfQualityObjectives as $controlOfQualityObjectives)
            <tr>
                <td class="cell">{{ $controlOfQualityObjectives->quality_politics }}</td>
                <td class="cell">{{ $controlOfQualityObjectives->objectives }}</td>
                <td class="cell">{{ $controlOfQualityObjectives->indicator }}</td>
                <td class="cell">{{ $controlOfQualityObjectives->formula }}</td>
                <td class="cell">{{ $measurement_frequency[$controlOfQualityObjectives->measurement_frequency]  }}</td>
                <td class="cell">{{ $controlOfQualityObjectives->goals.'%' }}</td>
                <td class="cell">{{ $controlOfQualityObjectives->status_to_date }}</td>
                <td>
                    {!! Form::open(['route' => ['controlOfQualityObjectives.destroy', $controlOfQualityObjectives->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('controlOfQualityObjectives.show', [$controlOfQualityObjectives->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('controlOfQualityObjectives.edit', [$controlOfQualityObjectives->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<style>

    .cell {
        max-width: 5px; 
        white-space : nowrap;
        overflow : hidden;
    }

</style>