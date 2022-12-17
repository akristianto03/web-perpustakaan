@extends('layouts.app')
@section('title', 'Peminjaman')
@section('content')

    <div class="container-fluid">
        <div class="container">
            <h1 class="mt-4 mb-3">
                Peminjaman Buku Saya
            </h1>

            <div class="row">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Buku</th>
                            <th>Penulis</th>
                            <th>Jumlah Halaman</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pinjams as $pinjam)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pinjam->book->judul }}</td>
                                <td>{{ $pinjam->book->penulis }}</td>
                                <td>{{ $pinjam->book->halaman }}</td>
                                <td>{{ $pinjam->created_at->toDateString() }}</td>
                                <td>{{ $pinjam->tglKembali }}</td>
                                <td>{{ $pinjam->status }}</td>
                                <td class="text-center">
                                    <a class="nav-link text-black-50" type="button"
                                        id="dropdownMenuButton-{{ $pinjam->id }}" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-fw fa-ellipsis-h"></i>
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdownMenuButton-{{ $pinjam->id }}">
                                        <a class="dropdown-item" href="{{ route('katalog.show', $pinjam->book->id) }}">
                                            Info
                                        </a>
                                        @if ($pinjam->status == 'menunggu konfirmasi')
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('user.pinjam.destroy', $pinjam->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="dropdown-item text-danger">
                                                    Batalkan peminjaman
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    {{-- <i class="fa-solid fa-ellipsis"></i> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
