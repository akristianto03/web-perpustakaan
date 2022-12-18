<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'publikasi' => $this->publikasi,
            'bahasa' => $this->bahasa,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit,
            'halaman' => $this->halaman,
            'kategori' => $this->kategori,
            'img' => $this->img,
        ];
    }
}
