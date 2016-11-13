<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory('App\User')->create([
            'username' => 'super',
            'name' => 'Super Administrator',
            'email' => 'super@example.com',
        ]);

        factory('App\User')->create([
            'username' => 'someone',
            'name' => 'Someone',
            'email' => 'someone@example.com',
        ]);

        factory('App\Role')->create([
            'name' => 'super',
            'label' => 'Super Administrator',
        ]);

        factory('App\Role')->create([
            'name' => 'dosen',
            'label' => 'Dosen',
        ]);

        factory('App\Role')->create([
            'name' => 'mahasiswa',
            'label' => 'Mahasiswa',
        ]);

        factory('App\Permission')->create([
            'name' => 'post.view',
            'label' => 'Baca post',
        ]);

        factory('App\Permission')->create([
            'name' => 'post.create',
            'label' => 'Tulis post baru',
        ]);

        factory('App\Permission')->create([
            'name' => 'post.update',
            'label' => 'Ubah post',
        ]);

        factory('App\Permission')->create([
            'name' => 'post.delete',
            'label' => 'Hapus post',
        ]);

        factory('App\Post', 32)->create();

        factory('App\Menu', 10)->create();
    }
}
