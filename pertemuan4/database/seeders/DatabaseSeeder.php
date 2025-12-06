<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat User Admin
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);

        // Membuat User Biasa (Sesuai Request)
        User::create([
            'name' => 'Pengguna Biasa',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => false
        ]);

        User::create([
            'name' => 'desi',
            'username' => 'desi',
            'email' => 'desi@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => false
        ]);

        // Membuat User Dummy Lainnya dengan nama Indonesia (via Factory id_ID)
        User::factory(3)->create();

        // Membuat Kategori dengan Bahasa Indonesia
        $cat1 = Category::create([
            'name' => 'Pemrograman Web',
            'slug' => 'pemrograman-web'
        ]);

        $cat2 = Category::create([
            'name' => 'Desain Web',
            'slug' => 'desain-web'
        ]);

        $cat3 = Category::create([
            'name' => 'Gaya Hidup',
            'slug' => 'gaya-hidup'
        ]);
        
        $cat4 = Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi'
        ]);

        // Membuat Postingan Dummy
        // Menggunakan factory yang sudah diupdate dengan judul Indonesia
        Post::factory(25)->recycle([
            $cat1, $cat2, $cat3, $cat4,
            User::all()
        ])->create();
    }
}
