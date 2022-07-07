<div class="table-responsive-sm">
    <table class="table table-striped" id="curricula-table">
        <thead>
            <tr>
                <th>Education</th>
        <th>Training</th>
        <th>Work Experience</th>
        <th>Certificates</th>
        <th>Dni Frontal Posterior</th>
        <th>Antecedentes</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($curricula as $curriculum)
            <tr>
                <td  class="cell">{{ $curriculum->education }}</td>
            <td class="cell">{{ $curriculum->training }}</td>
            <td class="cell">{{ $curriculum->work_experience }}</td>
            <td class="cell">{{ $curriculum->certificates }}</td>
            <td class="cell">{{ $curriculum->dni_frontal_posterior }}</td>
            <td class="cell">{{ $curriculum->antecedentes }}</td>
                <td>
                    {!! Form::open(['route' => ['curricula.destroy', $curriculum->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('curricula.show', [$curriculum->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('curricula.edit', [$curriculum->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
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