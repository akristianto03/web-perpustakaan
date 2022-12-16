@extends('layouts.app')
@section('title', 'Peminjaman')
@section('content')

<div class="container-fluid">
    <div class="container">
        <h1 class="mt-4 mb-3">
            Koleksi Buku yang Dipinjam
        </h1>

        <div class="row">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Buku</th>
                        <th>Jumlah Halaman</th>
                        <th>Peminjam</th>
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
                        <td><a href="{{ route('katalog.show', $pinjam->book->id) }}">
                            {{ $pinjam->book->judul }}
                        </a></td>
                        <td>{{ $pinjam->book->halaman }}</td>
                        <td>{{ $pinjam->user->name }}</td>
                        <td>{{ $pinjam->created_at->toDateString() }}</td>
                        <td>{{ $pinjam->tglKembali }}</td>
                        <td>{{ $pinjam->status }}</td>
                        <td class="text-center">
                            <a class="nav-link text-black-50" type="button" id="dropdownMenuButton-{{ $pinjam->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-ellipsis-h"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right"
                                aria-labelledby="dropdownMenuButton-{{ $pinjam->id }}">
                                @if ($pinjam->status == 'menunggu konfirmasi')
                                <form action="{{ route('admin.pinjam.terima', $pinjam->id) }}" method="post">
                                    @csrf
                                    <button class="dropdown-item text-primary">
                                        Terima
                                    </button>
                                </form>
                                
                                <div class="dropdown-divider text-danger"></div>
                                <form action="{{ route('admin.pinjam.tolak', $pinjam->id) }}" method="post">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        Tolak
                                    </button>
                                </form>
                                <div class="dropdown-divider"></div>
                                @elseif ($pinjam->status == 'diterima')
                                <form action="{{ route('admin.pinjam.selesai', $pinjam->id) }}" method="post">
                                    @csrf
                                    <button class="dropdown-item text-success">
                                        Selesaikan
                                    </button>
                                </form>
                                <div class="dropdown-divider"></div>
                                @elseif ($pinjam->status == 'ditolak')
                                <form action="{{ route('admin.pinjam.terima', $pinjam->id) }}" method="post">
                                    @csrf
                                    <button class="dropdown-item text-primary">
                                        Terima
                                    </button>
                                </form>
                                <div class="dropdown-divider"></div>
                                @endif
                                <form action="{{ route('admin.pinjam.destroy', $pinjam->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="dropdown-item text-danger">
                                        Hapus data
                                    </button>                                        
                                </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection