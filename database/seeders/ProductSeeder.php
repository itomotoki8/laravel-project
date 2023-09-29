<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(
            [
                [
                    'name' => 'ガム',
                    'price' => '10',
                    'text' => 'かめば噛むほど味が出てくるガムです
                    １０００種類の味があり、どんな人でも食べれるガムがみつかるでしょう。',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ラムネ',
                    'price' => '80',
                    'text' => '集中力が１０００倍になる魔法のラムネです
                    目がバキバキに覚醒して３日間ねなくてよくなります。',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'チョコパイ',
                    'price' => '100',
                    'text' => '特性のチョコソースをふんだんに使用し作られたチョコパイです。
                    ',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ポテトチップス',
                    'price' => '250',
                    'text' => 'メルシーの特性ポテトチップスです
                    おいしすぎて手が止まらず、体重が３０キロ増えます。',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'キャラメル',
                    'price' => '120',
                    'text' => 'アルプス山脈で採取した水と砂糖で作られたキャラメルです
                    繊細な甘さが病みつきになるキャラメルになりました。',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'つぶぐみ',
                    'price' => '180',
                    'text' => '市販のつぶぐみ
                    普通の味です',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]
        );
    }
}
