<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $table = 'books';

    protected $fillable = [
        'id',
        'judul',
        'deskripsi',
        'publikasi',
        'bahasa',
        'penulis',
        'penerbit',
        'halaman',
        'kategori',
        'img',
    ];

    public function pinjam(){
        return $this->hasMany(Pinjam::class, 'bookId', 'id');
    }
}
