<?php

use Illuminate\Database\Seeder;

class TownSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $town=[
            ['name'=>'Adams','slug'=>'Ad','lat'=>18.4591,'long'=>120.9188],
            ['name'=>'Bacarra','slug'=>'Bc','lat'=>18.2704,'long'=>120.6085],
            ['name'=>'Badoc','slug'=>'Bd','lat'=>17.9085,'long'=>120.4934],
            ['name'=>'Bangui','slug'=>'Bg','lat'=>18.5127,'long'=>120.7350],
            ['name'=>'Banna','slug'=>'Ba','lat'=>17.9568,'long'=>120.6430],
            ['name'=>'Batac City','slug'=>'BC','lat'=>18.0460,'long'=>120.5941],
            ['name'=>'Burgos','slug'=>'Br','lat'=>18.4660,'long'=>120.6430],
            ['name'=>'Carasi','slug'=>'Cr','lat'=>18.2130,'long'=>120.8729],
            ['name'=>'Currimao','slug'=>'Cu','lat'=>18.0029,'long'=>120.5101],
            ['name'=>'Dingras','slug'=>'Dn','lat'=>18.0805,'long'=>120.7235],
            ['name'=>'Dumalneg','slug'=>'Du','lat'=>18.4756,'long'=>120.8269],
            ['name'=>'Laoag City','slug'=>'LC','lat'=>18.1960,'long'=>120.5927],
            ['name'=>'Marcos','slug'=>'Mc','lat'=>18.0209,'long'=>120.7005],
            ['name'=>'Neveva Era','slug'=>'NE','lat'=>17.9408,'long'=>120.7350],
            ['name'=>'Pagudpud','slug'=>'Pg','lat'=>18.5875,'long'=>120.8221],
            ['name'=>'Paoay','slug'=>'Pa','lat'=>18.0742,'long'=>120.5164],
            ['name'=>'Pasuquin','slug'=>'PS','lat'=>18.3386,'long'=>120.6430],
            ['name'=>'Piddig','slug'=>'Pd','lat'=>18.1869,'long'=>120.7810],
            ['name'=>'Pinili','slug'=>'Pn','lat'=>17.9429,'long'=>120.5394],
            ['name'=>'San Nicolas','slug'=>'Sn','lat'=>18.1471,'long'=>120.5855],
            ['name'=>'Sarrat','slug'=>'Sr','lat'=>18.1138,'long'=>120.6545],
            ['name'=>'Solsona','slug'=>'Sl','lat'=>18.1022,'long'=>120.7810],
            ['name'=>'Vintar','slug'=>'Vn','lat'=>18.3141,'long'=>120.7810],
        ];
        foreach ($town as $t){
            DB::table('towns')
                ->insert([
                    'name'=>$t['name'],
                    'slug'=>$t['slug'],
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now(),
                    'lat'=>$t['lat'],
                    'long'=>$t['long'],
                ]);
        }

    }
}
