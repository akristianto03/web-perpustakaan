@extends('layouts.app')
@section('title', 'Detail Buku')
@section('content')

<div class="container-fluid">
    <div class="container">
        <h1 class="mt-4">
            Detail Buku
        </h1>

        <div class="row">
            <div class="card mx-2 col-lg-4 mb-3" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset($book->img) }}" alt="Card image cap">
            </div>
            <div class="w-75">
                <h2>
                    {{ $book->judul }}
                </h2>
                <hr>
                <div class="d-flex">
                    <p class="">
                        Tanggal publikasi <br>
                        Bahasa <br>
                        Penulis <br>
                        Penerbit <br>
                        Jumlah halaman <br>
                        Kategori
                    </p>
                    <p class="mx-3">
                        : {{ $book->publikasi }}<br>
                        : {{ $book->bahasa }}<br>
                        : {{ $book->penulis }}<br>
                        : {{ $book->penerbit }}<br>
                        : {{ $book->halaman }}<br>
                        : {{ $book->kategori }}
                    </p>
                </div>
                <h4>
                    Deskripsi
                </h4>
                <p>
                    {{ $book->deskripsi }}
                </p>

                {{-- if belum pinjam --}}
                @if (Auth::check() && Auth::user()->isAdmin == 1)
                    
                @elseif (Auth::check() && Auth::user()->isAdmin == 0)
                <form action="{{ route('user.pinjam.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="bookId" value="{{ $book->id }}">
                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-success text-white">
                        Pinjam
                    </button>    
                </form>
                @else
                <a href="{{ route('login') }}" class="btn btn-success text-white">Pinjam</a>
                @endif
                
            </div>
        </div>
    </div>
</div>

@endsection
