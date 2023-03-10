<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PinjamResource extends JsonResource
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
            'book' => $this->book,
            'idPeminjam' => $this->user->id,
            'peminjam' => $this->user->name,
            'status' => $this->status,
            'tglPinjam' => $this->created_at->toDateString(),
            'tglKembali' => $this->tglKembali,
        ];
    }
}
