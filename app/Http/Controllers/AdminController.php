<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Book;
use App\Models\Contact;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends BaseController
{
    public function index(Request $request){
        $qs=[];
        $activities = new Activity();
        if($request->has('sortBy')){
            $qs['sort'] = $request->get('sortBy');
            $sort=explode('-',$request->get('sortBy'));
            $activities = $activities->orderBy($sort[0],$sort[1]);
        }
        $this->data['qs'] = $qs;
        $this->data['activities'] = $activities->paginate(9)->withQueryString();
        return view('pages.admin.index',$this->data);
    }

    public function products(Request $request){
        $genres = Genre::with('books')->get();
        $books =Book::with('authors')->with('genre');
        $qs =[];

        if($request->has('chbGenres') && $request->get('chbGenres')){
            $qs['chbGenres'] = $request->chbGenres;
            $books = $books->whereIn("genre_id", $request->get("chbGenres"));
        }

        if($request->has('search') && $request->get('search')){
            $search = $request->search;
            $qs['search'] = $search;
            $books = $books->where(function($q) use ($search){

                $q->whereHas("authors", function($q) use($search){
                    $q->where('name','like',"%".$search."%");
                })
                ->orWhere('book_name','like',"%".$search."%");
            });

        }

        if($request->has('sortBy') && $request->get('sortBy')){
            $qs['sortBy'] = $request->get('sortBy');
            $sort = explode("-", $request->get("sortBy"));

            $books = $books->orderBy($sort[0], $sort[1]);
        }
        $this->data['qs'] = $qs;
        $this->data['genres'] = $genres;
        $this->data['books'] = $books->paginate(12)->withQueryString();
        return view('pages.admin.books.products',$this->data);
    }

    public function users(){
        $this->data['users'] = User::with('role')->get();
        return view('pages.admin.users.index',$this->data);
    }

    public function destroy_user($id){
        $user = User::find($id);
        try{
            $user->delete();
            Activity::create([
                'type'=>'Deleted a user',
                'user_name'=>session()->get('user')->name
            ]);
            return redirect()->back()->with('success','User deleted!');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error','There was an error processing the request.');

        }
    }

    public function messages(){
        $this->data['messages'] = Contact::all();
        return view('pages.admin.messages',$this->data);
    }
}
