@extends('layouts.app')
@section('title', 'Katalog Buku')
@section('content')

<div class="container-fluid">
    <div class="container">
        <h1 class="mt-4">
            Katalog Buku
        </h1>
        <p>
            Katalog buku perpustakaan, klik buku yang dituju untuk melihat tampilan yang lebih detail
        </p>
        <div class="py-3">
            {{-- katalog --}}
            <div class="row">
                <!-- distribusi array buku -->
                @foreach ($books as $book)
                    
                
                <div class="card mx-2 mb-4 col-lg-4" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset($book->img) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->judul }}</h5>
                        <p class="card-text">{{ $book->deskripsi }}</p>
                        <a href="{{ route('katalog.show', $book->id) }}" class="stretched-link"></a>
                    </div>
                </div>
                
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
