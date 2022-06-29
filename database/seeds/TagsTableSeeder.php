<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['vegetariano','senza glutine','carne','pesce'];
        for($i = 0; $i < count($tags);$i++){
            $newTag = new Tag();
            $newTag->name = $tags[$i];
            $newTag->slug = Str::of($newTag->name)->slug('-');
            //Str::slug($newTag->name);
            $newTag->save();

        }
    }
}
