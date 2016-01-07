<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\PublishingCompanies;
use App\Models\Gender;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::All();

        return \View::make('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$publishingCompanies = PublishingCompanies::orderBy('name')->get();
        $publishingCompanies = ['' => 'Select...'] + PublishingCompanies::lists('name', 'id')->toArray();
        $genus = Gender::lists('label', 'id');

        return \View::make('books.form')
            ->with('datas', [
                'publishingCompanies' => $publishingCompanies, 
                'genus' => $genus
            ])
            ->with('book', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), Book::$rules);

        if ($validator->fails()) {
            return \Redirect::to('books')->withErrors($validator);
        } else {
            $book = new Book;

            if ($book->saveBook($request)) {
                return \Redirect::to('books');
            } else {
                return \Redirect::back()->withErrorMessage('Something went wrong');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return \View::make('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publishingCompanies = ['' => 'Select...'] + PublishingCompanies::lists('name', 'id')->toArray();
        $genus = Gender::lists('label', 'id');
        $book = Book::find($id);

        return \View::make('books.form')
            ->with('datas', [
                'publishingCompanies' => $publishingCompanies, 
                'genus' => $genus
            ])
            ->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        /*echo '<pre>';
        print_r($request->all());
        die('</pre>');*/
        $validator = \Validator::make($request->all(), Book::$rules);

        if ($validator->fails()) {
            return \Redirect::to('books/' . $id . '/edit')->withErrors($validator);
        } else {
            $book = Book::find($id);
            $book->cover = $book->upload($request);
            $book->title = $request->input('title');
            $book->author = $request->input('author');
            $book->translator = $request->input('translator');
            $book->synopsis = $request->input('synopsis');
            $book->origin = $request->input('origin');
            $book->publishing_companies_id = $request->input('publishing_companies_id');
            $book->language = $request->input('language');
            $book->edition = $request->input('edition');
            $book->year = $request->input('year');
            $book->bar_code = $request->input('bar_code');
            $book->isbn = $request->input('isbn');
            $book->binding = $request->input('binding');
            $book->height = floatval(str_replace(',', '.', $request->input('height')));
            $book->width = floatval(str_replace(',', '.', $request->input('width')));
            $book->length = floatval(str_replace(',', '.', $request->input('length')));
            $book->weight = floatval(str_replace(',', '.', $request->input('weight')));
            $book->number_pages = $request->input('number_pages');
            if ($book->save()) {
                if (count($request->input('genus'))) {
                    $book->genus()->sync($request->input('genus'));
                }
                return \Redirect::to('books');
            } else {
                return \Redirect::back()->withErrorMessage('Something went wrong');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if ($book->cover != '') {
            unlink("images/cover_books/{$book->cover}");
        }

        $book->genus()->detach();
        $book->delete();
        return \Redirect::to('books');
    }
}
