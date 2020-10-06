<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();
        DB::table('orders')->insert(
            [
                ['id'=>1,'name'=>'Luu Minh Quang','address'=>'Ha Noi','email'=>'quanglm98@gmail.com','phone'=>'0866250298','total'=>110000,'state'=>1],
                ['id'=>2,'name'=>'Ta Cao Canh','address'=>'Ha Noi','email'=>'tacaocanh98@gmail.com','phone'=>'0866250291','total'=>150000,'state'=>1],
                ['id'=>3,'name'=>'Le Thanh Tuyen','address'=>'Ha Noi','email'=>'tuyen98@gmail.com','phone'=>'0866250292','total'=>180000,'state'=>1],
                ['id'=>4,'name'=>'Nguyen Huu Giang','address'=>'Ha Noi','email'=>'giang98@gmail.com','phone'=>'0866250293','total'=>170000,'state'=>1],
                ['id'=>5,'name'=>'Nguyen Van Tu','address'=>'Ha Noi','email'=>'nguyentu98@gmail.com','phone'=>'0866250294','total'=>210000,'state'=>1],
                ['id'=>6,'name'=>'Phan Huynh Ke Thanh','address'=>'Ha Noi','email'=>'kethanh98@gmail.com','phone'=>'0866250295','total'=>100000,'state'=>1],
            ]
            );
    }
}
