<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash as FacadesHash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Anggota';
        $user->email = 'anggota@gmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = FacadesHash::make('anggota123');
        $user->isAdmin = false;
        $user->save();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = FacadesHash::make('admin123');
        $user->isAdmin = true;
        $user->save();
    }
}
