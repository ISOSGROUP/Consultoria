<div class="table-responsive-sm">
    <table class="table table-striped" id="tests-table">
        <thead>
            <tr>
                <th>String</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tests as $test)
            <tr>
                <td>{{ $test->string }}</td>
                <td>
                    {!! Form::open(['route' => ['tests.destroy', $test->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tests.show', [$test->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('tests.edit', [$test->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>