@extends('layouts.app')
@section('title', 'Koleksi Buku')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="mt-4 d-flex justify-content-between mb-4">
            <h1 class="">
                Manajemen Koleksi Buku
            </h1>
            <a data-bs-toggle="modal" data-bs-target="#tambahbuku" class="btn btn-success text-white">
                Tambah Koleksi Buku
            </a>
        </div>

        <div class="modal fade bd-example-modal-lg" id="tambahbuku" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-5">
                    <h2 class="mb-3">
                        Tambah Koleksi Buku
                    </h2>
                    <form action="{{ route('admin.book.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Judul:</label>
                            <input type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Deskripsi:</label>
                            <textarea type="text" class="form-control" name="deskripsi"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tanggal publikasi:</label>
                            <input type="date" class="form-control" name="publikasi" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Bahasa:</label>
                            <input type="text" class="form-control" name="bahasa" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Penulis:</label>
                            <input type="text" class="form-control" name="penulis" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Penerbit:</label>
                            <input type="text" class="form-control" name="penerbit" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Jumlah halaman:</label>
                            <input type="number" class="form-control" name="halaman" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Kategori:</label>
                            <input type="text" class="form-control" name="kategori" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tampilan Buku:</label>
                            <input type="file" class="form-control" name="img" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success text-white">Tambah Buku</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Buku</th>
                        <th>Tanggal Publikasi</th>
                        <th>Bahasa</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Jumlah Halaman</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('katalog.show', $book->id) }}">
                                {{ $book->judul }}
                            </a></td>
                        <td>{{ $book->publikasi }}</td>
                        <td>{{ $book->bahasa }}</td>
                        <td>{{ $book->penulis }}</td>
                        <td>{{ $book->penerbit }}</td>
                        <td>{{ $book->halaman }}</td>
                        <td>{{ $book->kategori }}</td>
                        <td class="text-center">
                            <a class="nav-link text-black-50" type="button" id="dropdownMenuButton-{{ $book->id }}"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-ellipsis-h"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right"
                                aria-labelledby="dropdownMenuButton-{{ $book->id }}">
                                <a class="dropdown-item text-primary" data-bs-toggle="modal"
                                    data-bs-target="#editbuku-{{ $book->id }}">
                                    Edit
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('admin.book.destroy', $book->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="dropdown-item text-danger"
                                        href="{{ route('admin.book.destroy', $book->id) }}">
                                        Hapus buku
                                    </button>
                                </form>
                            </div>
                            {{-- <i class="fa-solid fa-ellipsis"></i> --}}
                        </td>
                    </tr>


                    {{-- Modal edit soal --}}
                    <div class="modal fade bd-example-modal-lg" id="editbuku-{{ $book->id }}" tabindex="-1"
                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content p-5">
                                <h2 class="mb-3">
                                    Edit Buku
                                </h2>
                                <form action="{{ route('admin.book.update', $book->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PATCH">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label>Judul:</label>
                                        <input type="text" class="form-control" name="judul" value="{{ $book->judul }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Deskripsi:</label>
                                        <textarea type="text" class="form-control" name="deskripsi">{{ $book->deskripsi }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Tanggal publikasi:</label>
                                        <input type="date" class="form-control" name="publikasi" value="{{ $book->publikasi }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Bahasa:</label>
                                        <input type="text" class="form-control" name="bahasa" value="{{ $book->bahasa }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Penulis:</label>
                                        <input type="text" class="form-control" name="penulis" value="{{ $book->penulis }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Penerbit:</label>
                                        <input type="text" class="form-control" name="penerbit" value="{{ $book->penerbit }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Jumlah halaman:</label>
                                        <input type="number" class="form-control" name="halaman" value="{{ $book->halaman }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Kategori:</label>
                                        <input type="text" class="form-control" name="kategori" value="{{ $book->kategori }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Tampilan Buku:</label>
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary text-white">Update Buku</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
