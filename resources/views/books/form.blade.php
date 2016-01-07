@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Book
                	<a href="{{ route('books.index') }}" class="pull-right">List of Books</a>
                </div>
                <div class="panel-body">

					@if($errors->any())
						<div class="alert alert-danger" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Oops! Something went wrong:<br />
							<ul>
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					@if ($book)
						{!! Form::model($book, ['method' => 'PUT', 'route' => ['books.update', $book->id], 'files' => true]) !!}
					@else
						{!! Form::open(['route' => 'books.store', 'files' => true]) !!}
					@endif

						<div class="form-group">
							<div class="row">
								<div class="col-sm-3">
									{!! Form::label('bar_code', 'Bar Code') !!}
									{!! Form::text('bar_code', (($book) ? $book->bar_code : ''), ['class' => 'form-control']) !!}
								</div>
								<div class="col-sm-3">
									{!! Form::label('isbn', 'ISBN') !!}
									{!! Form::text('isbn', (($book) ? $book->isbn : ''), ['class' => 'form-control']) !!}
								</div>
								<div class="col-sm-6">
									{!! Form::label('title', 'Title') !!}
									{!! Form::text('title', (($book) ? $book->title : ''), ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									{!! Form::label('publishing_companies_id', 'Publishing Companie') !!}
									{!! Form::select('publishing_companies_id', $datas['publishingCompanies'], (($book) ? $book->publishing_companies_id : ''), ['class' => 'form-control']) !!}
								</div>
								<div class="col-sm-6">
									{!! Form::label('cover', 'Cover') !!}
									{!! Form::file('cover', '', ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									{!! Form::label('author', 'Author') !!}
									{!! Form::text('author', (($book) ? $book->author : ''), ['class' => 'form-control']) !!}
								</div>
								<div class="col-sm-6">
									{!! Form::label('translator', 'Translator') !!}
									{!! Form::text('translator', (($book) ? $book->translator : ''), ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									{!! Form::label('origin', 'Origin') !!}
									{!! Form::text('origin', (($book) ? $book->orgin : ''), ['class' => 'form-control']) !!}
								</div>
								<div class="col-sm-6">
									{!! Form::label('language', 'Language') !!}
									{!! Form::text('language', (($book) ? $book->language : ''), ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									{!! Form::label('edition', 'Edition') !!}
									{!! Form::text('edition', (($book) ? $book->edition : ''), ['class' => 'form-control']) !!}
								</div>
								<div class="col-sm-6">
									{!! Form::label('binding', 'Binding') !!}
									{!! Form::text('binding', (($book) ? $book->binding : ''), ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="row">
								<div class="col-sm-2">
									{!! Form::label('year', 'Year') !!}
									{!! Form::text('year', (($book) ? $book->year : ''), ['class' => 'form-control']) !!}
								</div>
								<div class="col-sm-2">
									{!! Form::label('height', 'Height') !!}
									{!! Form::text('height', (($book) ? $book->height : ''), ['class' => 'form-control']) !!}
								</div>
								<div class="col-sm-2">
									{!! Form::label('width', 'Width') !!}
									{!! Form::text('width', (($book) ? $book->width : ''), ['class' => 'form-control']) !!}
								</div>
								<div class="col-sm-2">
									{!! Form::label('number_pages', 'Pages') !!}
									{!! Form::text('number_pages', (($book) ? $book->number_pages : ''), ['class' => 'form-control']) !!}
								</div>
								<div class="col-sm-2">
									{!! Form::label('length', 'Length') !!}
									{!! Form::text('length', (($book) ? $book->length : ''), ['class' => 'form-control']) !!}
								</div>
								<div class="col-sm-2">
									{!! Form::label('weight', 'Weight') !!}
									{!! Form::text('weight', (($book) ? $book->weight : ''), ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									{!! Form::label('genus', 'Gender') !!}
									{!! Form::select('genus[]', $datas['genus'], '', ['class' => 'form-control', 'multiple' => 'multiple']) !!}
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									{!! Form::label('synopsis', 'Synopsis') !!}
									{!! Form::textarea('synopsis', (($book) ? $book->synopsis : ''), ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									{!! Form::submit('Submit', ['class' => 'btn btn-default pull-right']) !!}
								</div>
							</div>
						</div>

					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ URL::to('js/jquery.maskregex.min.js') }}"></script>
<script>
	$(document).ready(function(){
		$('#bar_code').mask('9 999999 999999');
		$('#isbn').mask('999-99-9999-999-9');
		$('#year').mask('9999');
		$('#height').mask({currencySymbol: ''});
		$('#width').mask({currencySymbol: ''});
		$('#length').mask({currencySymbol: ''});
		$('#weight').mask({currencySymbol: ''});
		$('#number_pages').mask('9999');
	});
</script>
@endsection
