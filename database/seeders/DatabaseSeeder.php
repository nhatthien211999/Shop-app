<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $role=array('admin','user','partner');
        foreach($role as $value){
            DB::table('roles')->insert([
                'type'=>$value,
            ]);
        }
        \App\Models\User::factory(10)->create();



        for($i=1;$i<=10;$i++)
        {
            if($i<4){
                DB::table('user_role')->insert(
                    [
                        'user_id' => $i,
                        'role_id' => 1,
                    ]);
            }else if($i<3 && $i<6){
                DB::table('user_role')->insert(
                    [
                        'user_id' => $i,
                        'role_id' => 2,
                    ]);
                $shop= new Shop;
                $shop->shop_name="nguyễn văn $i";
                $shop->user_id=$i;
                $shop->status='active';
                $shop->save();
            }else{
                DB::table('user_role')->insert(
                    [
                        'user_id' => $i,
                        'role_id' => 3,
                    ]);
            }



        }
        $category= array('đặc sản', 'ăn chay', 'trứng thịt', 'trái cây', 'hải sản','rau củ', 'gia vị', 'đồ ăn vặt','đồ nhậu', 'đồ uống');

        foreach($category as $value)
        {
            $cate= new Category;
            $cate->type=$value;
            $cate->save();
        }

        $menus= [array('bánh gạo', 'lẩu', 'mì'), array('tea', 'trà sữa', 'sinh tố'),array('thịt heo', 'thịt bò', 'thịt gia cầm')];
        $typeMenu= array(array(1,9,9), array(10,10,10 ), array(3,3,3));
        $i=1;
        foreach($menus as $key1=> $menu){//độ dài mảng menu đã lưu là 3
            //ở trên đã lưu 3 user nhà hàng chủ quán
            foreach($menu as $key2=> $value){
                $menu= new Menu;
                $menu->type=$value;
                $menu->category_id= $typeMenu[$key1][$key2];
                $menu->shop_id=$i;
                $menu->save();
            }
            $i++;
           //mảng có độ dài bằng 3 nên bằng với số lượng user nhà hàng chủ quán nên ko bị lỗi relationship
        }
        $products= array(array('bánh gạo hàn quốc','bánh gạo truyền thống','lẩu thái', 'lẩu bò','mì ramen','mì bay'),
        array('trà đào', 'trà trái cây', 'trà sữa bánh plan', 'trà sữa truyền thống','sinh tố dâu','sinh tố cà chua'),
        array('thịt heo quay', 'thịt đùi heo', 'đuôi bò', 'thịt bò', 'thịt gà', 'thịt vịt'));

        $img= array(array('/image/banh-gao-han-quoc.jpg', '/image/banh-gao-truyen-thong.jpg', '/image/lau-thai.jpg', '/image/lau-bo.jpg','/image/mi-ramen.jpg', '/image/mi-bay.webp'),
        array('/image/tra-dao.jpg', '/image/tra-trai-cay', '/image/tra-sua-banh-plan.jpeg', '/image/tra-truyen-thong.jpg', '/image/sinh-to-chuoi-dau-tay.jpg', '/image/sinh-to-ca-chua.jpg'),
        array('/image/thit-heo-quay.jfif', '/image/thit-dui-heo.jpg','/image/duoi-bo.jpg','/image/thit-bo.jpg','/image/thit-ga.jpg','/image/thit-vit.jpg'));

        $menuID=1;
        foreach($products as $key1 => $product){

            foreach($product as $key2 => $value){
                $pro= new Product;
                $pro->price=rand(60000,100000);
                $pro->status= 'active';
                $pro->name=$value;
                $pro->image=$img[$key1][$key2];
                $pro->menu_id=$menuID;
                $pro->save();
                if($key2%2!=0)//bắt đầu từ 1
                    $menuID++;
            }
        }






    }
}
