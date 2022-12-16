<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new Book();
        $book->judul = 'Anatomi & Fisiologi untuk Paramedis';
        $book->deskripsi = 'Peningkatan kesehatan masyarakat merupakan tantangan bagi masyarakat berkembang, buku ini merupakan penunjang usaha tersebut. Pelajaran anatomi dan fisiologi terkenal sebagai pelajaran yang kering dan menbosankaan dan kurang menarik. ';
        $book->publikasi = '2019-01-01';
        $book->bahasa = 'Indonesia';
        $book->penulis = 'Evelyn C. Pearce';
        $book->penerbit = 'Gramedia';
        $book->halaman = '611';
        $book->kategori = 'Sains';
        $book->img = 'img/books/anatomi.jpg';
        $book->save();

        $book = new Book();
        $book->judul = 'Sebuah Seni untuk Bersikap Bodo Amat';
        $book->deskripsi = '"Selama beberapa tahun belakangan, Mark Manson—melalui blognya yang sangat populer—telah membantu mengoreksi harapan-harapan delusional kita, baik mengenai diri kita sendiri maupun dunia. Ia kini menuangkan.';
        $book->publikasi = '2005-20-05';
        $book->bahasa = 'Indonesia';
        $book->penulis = 'Mark Manson';
        $book->penerbit = 'Gramedia';
        $book->halaman = '256';
        $book->kategori = 'Lifestyle';
        $book->img = 'img/books/bodoamat.jpg';
        $book->save();

        $book = new Book();
        $book->judul = 'Nebula';
        $book->deskripsi = 'SELENA dan NEBULA adalah buku ke-8 dan ke-9 yang menceritakan siapa orangtua Raib dalam serial petualangan dunia paralel. Dua buku ini sebaiknya dibaca berurutan. Kedua buku ini juga bercerita tentang Akademi Bayangan Tingkat Tinggi, ';
        $book->publikasi = '2020-03-16';
        $book->bahasa = 'Indonesia';
        $book->penulis = 'Evelyn C. Pearce';
        $book->penerbit = 'Gramedia';
        $book->halaman = '376';
        $book->kategori = 'Novel';
        $book->img = 'img/books/nebula.jpg';
        $book->save();

        $book = new Book();
        $book->judul = 'Lukacita';
        $book->deskripsi = 'Untuk mereka yang berhasil menggapai cita-cita, tetapi masih terluka karenanya. Lukacita bercerita tentang para pemimpi yang dikhianati cita-cita mereka sendiri. Ada seorang pendiri perusahaan startup idealis bernama Javier dan seorang mantan atlet catur penakut bernama Utara. ';
        $book->publikasi = '2021-12-22';
        $book->bahasa = 'Indonesia';
        $book->penulis = 'Tere Liye';
        $book->penerbit = 'Bhuana Ilmu Populer';
        $book->halaman = '448';
        $book->kategori = 'Lifestyle';
        $book->img = 'img/books/lukacita.jpg';
        $book->save();

        $book = new Book();
        $book->judul = 'You Do You: Discovering Life through Experiments & Self-Awareness';
        $book->deskripsi = 'Mas, gimana kalau passion gue belum menghasilkan?” “Mas, apakah lebih baik jadi generalis atau spesialis?” “Mas, gue pengin bisa ganti haluan karier di bidang yang lain, bisakah? “Mas, gue lagi di tengah-tengah quarter-life crisis. Help me.”';
        $book->publikasi = '2020-12-23';
        $book->bahasa = 'Indonesia';
        $book->penulis = 'Fellexandro Ruby';
        $book->penerbit = 'Gramedia';
        $book->halaman = '252';
        $book->kategori = 'Novel';
        $book->img = 'img/books/youdoyou.jpg';
        $book->save();

        $book = new Book();
        $book->judul = 'Love for Imperfect Things';
        $book->deskripsi = 'Ketika kita sudah bisa mencintai diri sendiri, dunia akan mulai melihat bahwa kita memang layak untuk dicintai.';
        $book->publikasi = '2020-09-07';
        $book->bahasa = 'Indonesia';
        $book->penulis = 'Haemin Sunim';
        $book->penerbit = 'Gramedia';
        $book->halaman = '308';
        $book->kategori = 'Lifestyle';
        $book->img = 'img/books/imperfect.jpg';
        $book->save();
    }
}
