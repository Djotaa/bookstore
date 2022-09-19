<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreStoreRequest;
use App\Http\Requests\GenreUpdateRequest;
use App\Models\Activity;
use App\Models\Genre;
use Illuminate\Support\Facades\Log;

class GenreController extends BaseController
{
    public function index(){
        $genres = Genre::with('books')->get();
        $this->data['genres'] = $genres;
        return view('pages.admin.genres.index',$this->data);
    }

    public function create(){
        return view('pages.admin.genres.create');
    }

    public function store(GenreStoreRequest $request){
        $name = $request->genreName;
        try{
            Genre::create([
                'genre_name'=>$name
            ]);
            Activity::create([
                'type'=>'Added a new genre',
                'user_name'=>session()->get('user')->name
            ]);
            return redirect()->route('admin.genres')->with('success',"New genre added!");

        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error',"There was an error processing the request.");

        }
    }

    public function edit($id){
        $this->data['genre'] = Genre::find($id);
        return view('pages.admin.genres.edit',$this->data);
    }

    public function update(GenreUpdateRequest $request,$id){
        $genre = Genre::find($id);
        $name = $request->genreName;
        if($genre->genre_name != $name){
            $request->validate(['genreName' => 'unique:genres,genre_name']);
        }
        try{
            $genre->genre_name = $name;
            $genre->save();
            Activity::create([
                'type'=>'Updated a genre',
                'user_name'=>session()->get('user')->name
            ]);
            return redirect()->route('admin.genres')->with('success','Updated genre');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error','There was an error processing your request.');
        }
    }

    public function destroy($id){
        $genre = Genre::with('books')->find($id);
        if(count($genre->books) > 0){
            return redirect()->back()->with('error',"Genre has books associated with it, can't delete.");
        }
        try{
            $genre->delete();
            Activity::create([
                'type'=>'Deleted a genre',
                'user_name'=>session()->get('user')->name
            ]);
            return redirect()->back()->with('success',"Genre deleted!");
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error',"There was an error processing the request.");

        }
    }
}
