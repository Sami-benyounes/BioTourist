<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert(array(
            array(
                'user_name' => 'tourist',
                'user_surname' => 'tourist',
                'user_adress' => '20 avenue de la rotonde',
                'user_postal_code' => '98272',
                'user_phone' => '0276373828',
                'email' => 'tourist@tourist.fr',
                'password' => Hash::make('azertyuiop'),
                'api_token' => Str::random(80),
            ),
            array(
                'user_name' => 'controller',
                'user_surname' => 'controller',
                'user_adress' => '20 avenue des champs',
                'user_postal_code' => '98272',
                'user_phone' => '0276373829',
                'email' => 'controller@controller.fr',
                'password' => Hash::make('azertyuiop'),
                'api_token' => Str::random(80),
            ),
            array(
                'user_name' => 'seller',
                'user_surname' => 'seller',
                'user_adress' => '12 rue balec',
                'user_postal_code' => '98272',
                'user_phone' => '0276373869',
                'email' => 'seller@seller.fr',
                'password' => Hash::make('azertyuiop'),
                'api_token' => Str::random(80),
            ),
            array(
                'user_name' => 'touristSeller',
                'user_surname' => 'touristSeller',
                'user_adress' => '12 rue balec',
                'user_postal_code' => '75011',
                'user_phone' => '0643566343',
                'email' => 'touristSeller@touristSeller.fr',
                'password' => Hash::make('azertyuiop'),
                'api_token' => Str::random(80),
            ),
            array(
                'user_name' => 'admin',
                'user_surname' => 'admin',
                'user_adress' => '12 rue balec',
                'user_postal_code' => '98272',
                'user_phone' => '0246373829',
                'email' => 'admin@admin.fr',
                'password' => Hash::make('azertyuiop'),
                'api_token' => 'XBxgy8DbH1Hbp1hQ12FDciR6QGit8wbMZdIGOYwU5R21hEdtaTwcYfiMoDAEycFHVBJ9j78kyz6QoQxw',
            ),
            array(
                'user_name' => 'Jean',
                'user_surname' => 'Seller',
                'user_adress' => '12 rue du marché',
                'user_postal_code' => '75015',
                'user_phone' => '0643566342',
                'email' => 'JeanSeller@gmail.com',
                'password' => Hash::make('azertyuiop'),
                'api_token' => Str::random(80),
            ),
            array(
                'user_name' => 'Martine',
                'user_surname' => 'Seller',
                'user_adress' => '20 avenue des champs',
                'user_postal_code' => '75015',
                'user_phone' => '0643567898',
                'email' => 'MatineSeller@gmail.com',
                'password' => Hash::make('azertyuiop'),
                'api_token' => Str::random(80),
            ),
            array(
                'user_name' => 'Paul',
                'user_surname' => 'Souche',
                'user_adress' => '10 rue de tournon',
                'user_postal_code' => '75009',
                'user_phone' => '0643567809',
                'email' => 'PaulSouche@gmail.com',
                'password' => Hash::make('azertyuiop'),
                'api_token' => Str::random(80),
            ),
            array(
                'user_name' => 'Thomas',
                'user_surname' => 'Louro',
                'user_adress' => '11 rue de tournon',
                'user_postal_code' => '75012',
                'user_phone' => '0743567809',
                'email' => 'ThomasLouro@gmail.com',
                'password' => Hash::make('azertyuiop'),
                'api_token' => Str::random(80),
            ),
        ));
    }
}
