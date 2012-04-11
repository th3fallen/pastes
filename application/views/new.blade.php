@layout('layouts.main')

@section('buttons')
	<li><a href="javascript: createPaste()" class="save">Save</a></li>
@endsection

@section('content')
	{{ Form::open('/', 'POST', array('id' => 'paster')) }}
		{{ Form::textarea('paste', Input::old('paste', $fork)) }}
	{{ Form::close() }}
@endsection
