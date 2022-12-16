<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'pinjams';

    protected $fillable = [
        'id',
        'userId',
        'bookId',
        'status',
        'tglKembali',
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function book(){
        return $this->belongsTo(Book::class, 'bookId', 'id');
    }
}
