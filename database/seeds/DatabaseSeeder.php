<?php

use App\Article;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        Model::unguard();

        $this->call('UsersTableSeeder');
        $this->call('ArticlesTableSeeder');

        Model::reguard();
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name'     => 'root',
            'email'    => 'root@sample.com',
            'password' => bcrypt('password'),
        ]);
    }
}

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->delete();

        $user = User::all()->first();
        $faker = Faker::create('en_US');

        for ($i = 0; $i < 10; $i++) {
            $article = new Article([
                'title'        => $faker->sentence(),
                'body'         => $faker->paragraph(),
                'published_at' => Carbon::now(),
            ]);
            $user->articles()->save($article);
        }
    }
}
