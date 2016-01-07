@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Book #{{ $book->id }}
                	<a href="{{ route('books.index') }}" class="pull-right">List of Books</a>
                </div>
                <div class="panel-body">
					<div class="row">
  						<div class="col-md-4">
  							<img src="../images/cover_books/{{ $book->cover }}" width="250" />
  						</div>
  						<div class="col-md-8">
  							<p class="lead"><strong>Title:</strong> {{ $book->title }}</p>
  						</div>
  						<div class="col-md-4">
  							<p class="lead"><strong>Bar Code:</strong> {{ $book->bar_code }}</p>
  						</div>
  						<div class="col-md-4">
  							<p class="lead"><strong>ISBN:</strong> {{ $book->isbn }}</p>
  						</div>
  						<div class="col-md-8">
  							<p class="lead"><strong>Author:</strong> {{ $book->author }}</p>
  						</div>
  						<div class="col-md-8">
  							<p class="lead"><strong>Translator:</strong> {{ $book->translator }}</p>
  						</div>
  						<div class="col-md-4">
  							<p class="lead"><strong>Origin:</strong> {{ $book->origin }}</p>
  						</div>
  						<div class="col-md-4">
  							<p class="lead"><strong>Language:</strong> {{ $book->language }}</p>
  						</div>
  						<div class="col-md-4">
  							<p class="lead"><strong>Binding:</strong> {{ $book->binding }}</p>
  						</div>
  						<div class="col-md-4">
  							<p class="lead"><strong>Publishing:</strong> {{ $book->publishing_companies_id }}</p>
  						</div>
  						<div class="col-md-4">
  							<p class="lead"><strong>Edition:</strong> {{ $book->edition }}</p>
  						</div>
  						<div class="col-md-4">
  							<p class="lead"><strong>Released in </strong>{{ $book->year }}</p>
  						</div>
  					</div>

					<div class="row">
  						<div class="col-md-3">
  							<p class="lead"><strong>Weight:</strong> {{ number_format($book->weight, 2, ',', '.') }}g</p>
  						</div>
  						<div class="col-md-3">
  							<p class="lead"><strong>Length:</strong> {{ number_format($book->length, 2, ',', '.') }}cm</p>
  						</div>
  						<div class="col-md-3">
  							<p class="lead"><strong>Width:</strong> {{ number_format($book->width, 2, ',', '.') }}cm</p>
  						</div>
  						<div class="col-md-3">
  							<p class="lead"><strong>Height:</strong> {{ number_format($book->height, 2, ',', '.') }}cm</p>
  						</div>
  					</div>

  					<div class="row">
  						<div class="col-md-12">
  							<p class="lead" style="text-align:justify"><strong>Synopsis:</strong><br /><br />{!! nl2br($book->synopsis) !!}</p>
  						</div>
  					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection