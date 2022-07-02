{{ Form::label('name') }}
{{ Form::text('name') }}<br>
{{ Form::label('description') }}
{{ Form::textarea('description') }}<br>
{{ Form::label('state') }}
{{ Form::select('state', $categoryState) }}<br>
