<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Book extends Model
{

	protected $table = 'books';
	protected $fillable = ['cover', 'title', 'author', 'translator', 'synopsis', 'origin', 'publishing_companies_id', 'language', 'edition', 'year', 'bar_code', 'isbn', 'binding', 'height', 'width', 'length', 'weight', 'number_pages'];
	protected $hidden = ['id', 'created_at', 'updated_at'];

	public static $rules = [
		'bar_code' => 'required|min:15',
		'isbn' => 'required|min:17',
		'title' => 'required',
		'author' => 'required'
	];

	/**
	 * The genera of which this book is part
	 */
	public function genus()
	{
		return $this->belongsToMany('App\Models\Gender');
	}

	public function saveBook(Request $request)
	{
		\DB::beginTransaction();

		$this->cover = $this->upload($request);
        $this->title = $request->input('title');
        $this->author = $request->input('author');
        $this->translator = $request->input('translator');
        $this->synopsis = $request->input('synopsis');
        $this->origin = $request->input('origin');
        $this->publishing_companies_id = $request->input('publishing_companies_id');
        $this->language = $request->input('language');
        $this->edition = $request->input('edition');
        $this->year = $request->input('year');
        $this->bar_code = $request->input('bar_code');
        $this->isbn = $request->input('isbn');
        $this->binding = $request->input('binding');
        $this->height = floatval(str_replace(',', '.', $request->input('height')));
        $this->width = floatval(str_replace(',', '.', $request->input('width')));
        $this->length = floatval(str_replace(',', '.', $request->input('length')));
        $this->weight = floatval(str_replace(',', '.', $request->input('weight')));
        $this->number_pages = $request->input('number_pages');
        if ($this->save()) {
            $this->genus()->sync($request->input('genus'));
            $success = true;
        }

        if ($success) {
            \DB::commit();
            return true;
        } else {
            \DB::rollback();
            return false;
        }
	}

	public function upload(Request $request)
	{
		if ($request->hasFile('cover')) {
            $fileName = $request->input('title') . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->move('images/cover_books', $fileName);
            return $fileName;
        } else {
        	return '';
        }
	}

}
