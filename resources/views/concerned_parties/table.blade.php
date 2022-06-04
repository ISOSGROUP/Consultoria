<div class="table-responsive-sm">
    <table class="table table-striped" id="concernedParties-table">
        <thead>
            <tr>
                <th>Tipo</th>
        <th>Partes interesadas</th>
        <th>Necesidades</th>
        <th>Expectativas</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($concernedParties as $concernedParties)
            <tr>
                <td>{{ (($concernedParties->type == "internal")?"interno":"externo") }}</td>
            <td class="cell">{{ $concernedParties->concerned_parties }}</td>
            <td class="cell">{{ $concernedParties->needs }}</td>
            <td class="cell">{{ $concernedParties->Expectations }}</td>
                <td>
                    {!! Form::open(['route' => ['ConcernedParties.destroy', $concernedParties->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ConcernedParties.show', [$concernedParties->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('ConcernedParties.edit', [$concernedParties->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
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