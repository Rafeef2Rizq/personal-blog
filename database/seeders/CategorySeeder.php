<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('categories')->insert([
        'name'=>'Technology',
        'slug'=>'technology',
        'description'=>'the practical application of scientific knowledge and engineering principles for various purposes, including problem-solving, innovation, and the creation of tools, systems,
         and processes that improve human life and our understanding of the world.',
      ]);
      DB::table('categories')->insert([
        'name'=>'Sports',
        'slug'=>'sports',
        'description'=>'physical activities or games that involve skill, competition, and physical \
        exertion. Sports are often organized into various categories and disciplines, each with its own rules, equipment, and objectives. They play a significant role in promoting
         physical fitness, teamwork, entertainment, and often have a cultural and social impact.',
      ]);
      DB::table('categories')->insert([
        'name'=>'Automotive',
        'slug'=>'automotive',
        'description'=>'The automotive industry is a vast and multifaceted sector that encompasses the design, manufacturing, marketing, and maintenance of vehicles. It plays a crucial role in transportation,
         driving economic growth, technological innovation, and environmental considerations.',
      ]);
      DB::table('categories')->insert([
        'name'=>'Finance',
        'slug'=>'finance',
        'description'=>'Finance is a broad field that encompasses the management of money, assets, investments, and financial transactions. 
        It plays a fundamental role in both individual and organizational financial well-being.',
      ]);
      DB::table('categories')->insert([
        'name'=>'Politics',
        'slug'=>'politics',
        'description'=>'Politics is the process of governing or managing a community,
         state, or nation. It encompasses the activities, policies, and decisions that individuals, 
         groups, and governments use to allocate resources, make laws, and address societal issues.',
      ]);
      DB::table('categories')->insert([
        'name'=>'Culture',
        'slug'=>'culture',
        'description'=>'Culture refers to the shared beliefs, values, customs, behaviors,
         and artifacts that characterize a group or society. It encompasses the way people
          live, think, interact, and express themselves. Culture plays a significant role
           in shaping individual and
         collective identities, influencing art, literature, religion, social norms, and traditions.',
      ]);
    }
}
