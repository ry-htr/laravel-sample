<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Article;

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

        $this->call('ArticlesTableSeeder');

        Model::reguard();
    }
}

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->delete();  // ④

        $faker = Faker::create('en_US');  // ⑤

        for ($i = 0; $i < 10; $i++) {  // ⑥
            Article::create([
                'title' => $faker->sentence(),
                'body' => $faker->paragraph(),
                'published_at' => Carbon::today()
            ]);
        }
    }
}
