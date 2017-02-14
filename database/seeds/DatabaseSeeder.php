<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Article;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableseeder::class);
        $this->call(ArticleTableSeeder::class);
    }
}

class UsersTableseeder extends Seeder
{
  public function run()
  {
    DB::table('articles')->delete();

    User::create([
            'name' => 'root',
            'email' => 'root@sample.com',
            'password' => bcrypt('password')
        ]);
  }
}

class ArticleTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('articles')->delete();

    $user = User::all()->first();
    $faker = Faker::create('en_US');

    for($i = 0; $i < 10; $i++) {
      $article = new Article([
        'title' => $faker->sentence(),
        'body' => $faker->paragraph(),
        'published_at' => Carbon::now()
      ]);
      $user->articles()->save($article);
    }
  }
}
