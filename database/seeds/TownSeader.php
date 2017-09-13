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
            ['name'=>'Adams','slug'=>'adams'],
            ['name'=>'Bacarra','slug'=>'bacarra'],
            ['name'=>'Badoc','slug'=>'badoc'],
            ['name'=>'Bangui','slug'=>'bangui'],
            ['name'=>'Banna','slug'=>'Banna'],
            ['name'=>'Batac City','slug'=>'batac'],
            ['name'=>'Burgos','slug'=>'burgos'],
            ['name'=>'Carasi','slug'=>'carasi'],
            ['name'=>'Currimao','slug'=>'currimao'],
            ['name'=>'Dingras','slug'=>'dingras'],
            ['name'=>'Dumalneg','slug'=>'dumalneg'],
            ['name'=>'Laoag City','slug'=>'lc'],
            ['name'=>'Marcos','slug'=>'marcos'],
            ['name'=>'Neveva Era','slug'=>'nueva-era'],
            ['name'=>'Pagudpud','slug'=>'pagudpud'],
            ['name'=>'Paoay','slug'=>'paoay'],
            ['name'=>'Pasuquin','slug'=>'pasuquin'],
            ['name'=>'Piddig','slug'=>'piddig'],
            ['name'=>'Pinili','slug'=>'pinili'],
            ['name'=>'San Nicolas','slug'=>'sn'],
            ['name'=>'Sarrat','slug'=>'sarrat'],
            ['name'=>'Solsona','slug'=>'solsona'],
            ['name'=>'Vintar','slug'=>'vintar'],
        ];
        foreach ($town as $t){
            DB::table('towns')
                ->insert([
                    'name'=>$t['name'],
                    'slug'=>bcrypt($t['slug']),
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now(),

                ]);
        }

    }
}
