{{ Form::label('name', 'Title') }}
{{ Form::text('name') }}<br>
{{ Form::label('body', 'Content') }}
{{ Form::textarea('body') }}<br>
{{ Form::label('category_id', 'Category')}}
{{ Form::select('category_id', $articleCategories) }}</br>
{{ Form::label('state', 'State')}}
{{ Form::select('state', $articleState) }}</br>
