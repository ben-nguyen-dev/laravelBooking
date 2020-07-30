<?php

use Illuminate\Database\Seeder;

class ProductsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['id', 'homestay_id', 'room_type_id','amount','date','prices','discount','avatar','description','status'],
            ['1', '1', '1','1','2020-07-27','200000','0','uploads/room/img.jpg','Với tầm nhìn ra biển, suite rộng rãi có ban công lớn, máy lạnh và phòng tắm riêng kèm vòi sen nước nóng.','1'],           
            ['2', '1', '2','2','2020-07-29','400000','5','uploads/room/img3.jpg','','1'],           
            ['3', '2', '3','1','2020-08-01','300000','10','uploads/room/img4.jpg','This double room has a satellite TV.','1'],           
            ['4', '2', '1','5','2020-08-06','250000','5','uploads/room/img8.jpg','Phòng Giường Đôi này có tầm nhìn ra hồ nước, ấm đun nước điện và ghế sofa.','0'],           
            ['5', '3', '3','1','2020-08-01','500000','15','uploads/room/img.jpg','This double room has a satellite TV.','1'],           
        ];

        foreach($data as $key=> $val){
            DB::table('products')->insert(
                [
                    'id' => $data[$key][0],
                    'homestay_id' => $data[$key][1],
                    'room_type_id' => $data[$key][2],
                    'amount' => $data[$key][3],
                    'date' => $data[$key][4],
                    'prices' => $data[$key][5],
                    'discount' => $data[$key][6],
                    'avatar' => $data[$key][7],
                    'description' => $data[$key][8],
                    'status' => $data[$key][9]
                ]
            );
        }
    }
}
