<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Activity;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BookController extends BaseController
{

    public function __construct(){
        parent::__construct();
        $this->middleware('isAdmin')
            ->only([
                'destroy',
                'store',
                'update',
                'create',
                'edit'
            ]);
    }
    public function get_json(Request $request){
        if($request->ajax()){
            $books = Book::with('genre')->with('authors');

            if($request->genres){
                $books = $books->whereIn('genre_id',$request->genres);
            }

            if($request->search && !empty($request->search)){
                $search = $request->search;
                $books = $books->where(function($q) use ($search){

                    $q->whereHas("authors", function($q) use($search){
                        $q->where('name','like',"%".$search."%");
                    })
                        ->orWhere('book_name','like',"%".$search."%");
                });
            }

            if($request->sort){
                $column = explode('-',$request->sort)[0];
                $type = explode('-',$request->sort)[1];
                $books = $books->orderBy($column,$type);
            }


            header('Content-type:application/json');
            echo json_encode($books->paginate(12));
        }
        else{
            return redirect()->back();
        }
    }
    public function index()
    {
        $genres = Genre::with('books')->get();
        $this->data['genres']=$genres;
        return view('pages.books.index',$this->data);
    }


    public function create()
    {
        $genres = Genre::all();
        $this->data['genres']=$genres;
        return view('pages.admin.books.create',$this->data);
    }


    public function store(BookStoreRequest $request)
    {
        $title = $request->get('title');
        $author_1 = $request->get('author1');
        if(isset($request->author2)){
            $author_2 = $request->get('author2');
        }
        $price = $request->get('price');
        $publishYear = $request->get('publishYear');
        $description = $request->get('description');
        $genreId = $request->get('genreId');
        $extension = $request->image->extension();
        $imageName = strtolower(implode('_',explode(' ',str_replace(':','',$title)))).'.'.$extension;
        $request->image->move(public_path('img/books'), $imageName);

        try{
            $book = Book::create([
                'book_name'=>$title,
                'price' => $price,
                'description'=>$description,
                'image'=>$imageName,
                'publish_year'=>$publishYear,
                'genre_id'=>$genreId
            ]);
            $authors = [];
            $author = Author::firstOrCreate(['name'=>$author_1]);
            array_push($authors,$author->id);
            if(isset($author_2)){
                $author2 = Author::firstOrCreate(['name'=>$author_2]);
                array_push($authors,$author2->id);
            }
            $book->authors()->sync($authors);
            Activity::create([
                'type'=>'Added new book',
                'user_name'=>session()->get('user')->name
            ]);
            return redirect()->route('admin.products')->with('success','true');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with("error", $e->getMessage());
        }

    }


    public function show($id)
    {
        $this->data['book'] = Book::with('authors')->with('genre')->find($id);
        return view('pages.books.show',$this->data);
    }


    public function edit($id)
    {
        $genres = Genre::all();
        $this->data['genres']=$genres;
        $this->data['book'] = Book::with('authors')->with('genre')->find($id);
        return view('pages.admin.books.edit',$this->data);
    }


    public function update(BookUpdateRequest $request, $id)
    {
        $title = $request->get('title');
        $author_1 = $request->get('author1');
        if(isset($request->author2)){
            $author_2 = $request->get('author2');
        }
        $price = $request->get('price');
        $publishYear = $request->get('publishYear');
        $description = $request->get('description');
        $genreId = $request->get('genreId');


        try{
            $book = Book::with('authors')->with('genre')->find($id);
            $authors = [];
            $author = Author::firstOrCreate(['name'=>$author_1]);
            array_push($authors,$author->id);
            if(isset($author_2)){
                $author2 = Author::firstOrCreate(['name'=>$author_2]);
                array_push($authors,$author2->id);
            }
            $book->book_name = $title;
            $book->price = $price;
            $book->publish_year = $publishYear;
            $book->genre_id = $genreId;
            $book->description = $description;
            if(isset($request->image)){
                $oldImage = public_path("img/books/{$book->image}");
                if (File::exists($oldImage)) {
                    unlink($oldImage);
                }
                $extension = $request->image->extension();
                $imageName = strtolower(implode('_',explode(' ',str_replace(':','',$title)))).'.'.$extension;
                $request->image->move(public_path('img/books'), $imageName);
                $book->image = $imageName;
            }
            $book->save();
            $book->authors()->sync($authors);
            Activity::create([
                'type'=>'Updated book',
                'user_name'=>session()->get('user')->name
            ]);
            return redirect()->route('admin.products')->with('success','Updated book!');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with("error", $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $book = Book::find($id);
        $image_path = public_path("img/books/{$book->image}");
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        try{
            $book->authors()->detach();
            $book->delete();
            Activity::create([
                'type'=>'Deleted a book',
                'user_name'=>session()->get('user')->name
            ]);
            return redirect()->route('admin.products')->with('success','Book deleted!');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('admin.products')->with('error',"There was an error processing the request.");
        }
    }
}
