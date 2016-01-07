@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	List of Books
                	<a href="{{ route('books.create') }}" class="pull-right">Add New Book</a>
                </div>
                <div class="panel-body">
					<table class="table table-striped">
						<tr>
							<td>Bar Code</td>
							<td>ISBN</td>
							<td>Book</td>
							<td>Author</td>
							<td>Action</td>
						</tr>
						@if (count($books))
							@foreach ($books as $book)
								<tr>
									<td>{{ $book->bar_code }}</td>
									<td>{{ $book->isbn }}</td>
									<td>{{ $book->title }}</td>
									<td>{{ $book->author }}</td>
									<td>
										<div class="btn-group btn-group-xs" role="group" aria-label="...">
											<a href="{{ route('books.show', $book->id) }}" type="button" class="btn btn-default">
												<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
											</a>
											<a href="{{ route('books.edit', $book->id) }}" type="button" class="btn btn-default">
												<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
											</a>
											{!! Form::open(['url' => route('books.destroy', $book->id), 'method' => 'DELETE']) !!}
												<button type="submit" class="btn btn-default">
													<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
												</button>
											{!! Form::close() !!}
										</div>
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="5">No book found!</td>
							</tr>
						@endif
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection