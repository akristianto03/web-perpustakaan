<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.book', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'img' => 'image|mimes:png,jpg,jpeg,svg'
        ]);

        $imgName = $data['img']->getClientOriginalName().'-'.time().'.'.$data['img']->extension();
        $data['img']->move(public_path('/img/books'), $imgName);

        Book::create([
            'judul' => $request->judul,
            'deskripsi'=> $request->deskripsi,
            'publikasi'=> $request->publikasi,
            'bahasa'=> $request->bahasa,
            'penulis'=> $request->penulis,
            'penerbit'=> $request->penerbit,
            'halaman'=> $request->halaman,
            'kategori'=> $request->kategori,
            'img'=> '/img/books/'.$imgName,
        ]);

        return redirect(route('admin.book.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        if ($request->img != null) {
            $data = $request->validate([
                'img' => 'image|mimes:png,jpg,jpeg,svg'
            ]);
    
            $imgName = $data['img']->getClientOriginalName().'-'.time().'.'.$data['img']->extension();
            $data['img']->move(public_path('/img/books'), $imgName);

            $book->update([
                'img'=> '/img/books/'.$imgName,
            ]);
        }

        $book->update([
            'judul' => $request->judul,
            'deskripsi'=> $request->deskripsi,
            'publikasi'=> $request->publikasi,
            'bahasa'=> $request->bahasa,
            'penulis'=> $request->penulis,
            'penerbit'=> $request->penerbit,
            'halaman'=> $request->halaman,
            'kategori'=> $request->kategori,
        ]);
        return redirect()->route('admin.book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('admin.book.index');
    }
}
