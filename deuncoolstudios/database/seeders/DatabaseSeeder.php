<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'id' => 1,
                'first_name' => 'CodeLean',
                'email' => 'gc123580@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 2,
                // 'status'=> 1,
                'description' => null,
            ],
            [
                'id' => 2,
                'first_name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 1,
                'description' => null,
            ],
            [
                'id' => 3,
                'first_name' => 'Shane Lynch',
                'email' => 'ShaneLynch@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-0.png',
                'level' => 1,
                'description' => 'Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud amodo'
            ],
            [
                'id' => 4,
                'first_name' => 'Brandon Kelley',
                'email' => 'BrandonKelley@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-1.png',
                'level' => 1,
                'description' => null,
            ],
            [
                'id' => 5,
                'first_name' => 'Roy Banks',
                'email' => 'RoyBanks@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-2.png',
                'level' => 1,
                'description' => null,
            ],
        ]);

        DB::table('blogs')->insert([
            [
                'user_id' => 3,
                'title' => 'The Personality Trait That Makes People Happier',
                'image' => 'blog-1.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'This was one of our first days in Hawaii last week.',
                'image' => 'blog-2.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Last week I had my first work trip of the year to Sonoma Valley',
                'image' => 'blog-3.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Happppppy New Year! I know I am a little late on this post',
                'image' => 'blog-4.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Absolue collection. The Lancome team has been one…',
                'image' => 'blog-5.jpg',
                'category' => 'MODEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Writing has always been kind of therapeutic for me',
                'image' => 'blog-6.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
        ]);

        DB::table('brands')->insert([
            [
                'name' => 'Deuncoolstudios',
            ]
        ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'T-Shirt',
            ],
            [
                'name' => 'Hoddie',
            ],
            [
                'name' => 'Áo khoác nỉ',
            ],
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'brand_id' => 1,
                'product_category_id' => 3,
                'name' => 'Áo khoác nỉ form rộng hoodiezip chất liệu nỉ bông siêu ấm DEUNCOOL',
                'description' => '<p>DEUNCOOL STUDIOS HOODIE</p>

                <p>Chất liệu : Nỉ cotton 100% (l&oacute;t b&ocirc;ng).</p>
                
                <p>&ldquo; Với trường hợp &aacute;o chật bạn h&atilde;y nhắn tin cho shop để shop hỗ trợ đổi size cho bạn nh&eacute;, đừng vội đ&aacute;nh gi&aacute; sản phẩm, tội shop lắm ạ 🥺&ldquo;</p>
                
                <p>_________________</p>
                
                <p>📦 HƯỚNG DẪN SỬ DỤNG:</p>
                
                <p>- Giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm</p>
                
                <p>- Giặt trước khi sử dụng để ko bị d&iacute;nh l&ocirc;ng khi mang do sản phẩm nỉ mới</p>
                
                <p>- Giặt mặt trong để bảo quản h&igrave;nh in, th&ecirc;u giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm</p>
                
                <p>_________________</p>
                
                <p>FORM &Aacute;O:</p>
                
                <p>-Size M: D&agrave;i 58cm</p>
                
                <p>-Size M: D&agrave;i 63cm</p>
                
                <p>-Size L: D&agrave;i 68cm</p>
                
                <p>-Size XL: D&agrave;i 72cm</p>
                
                <p>&reg;️ Designed by UNCOOL TEAMS.</p>
                
                <p>📎 Instagram: @Deuncoolstudios.</p>
                
                <p>AVAILABLE NOW 🛒</p>
                
                <p>Mua ngay đi kẻo hết lạnh b&acirc;y giờ #hoodie #hoodiezip #hoodieformrong #aokhoac #aolanh #aohoodiezipdep</p>',
                'content' => '',
                'price' => 420000,
                'qty' => 20,
                'discount' => 320000,
                'weight' => 1.3,
                'sku' => '00012',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 2,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Áo hoodie nỉ bông DEUNCOOL BASIC ver 1.0 - Màu Grey Light - 100% cotton mềm mịn cho nam nữ - ẢNH THẬT',
                'description' => '♥️ CHÀO CẬU Ạ ! MẪU HOODIE BÊN SHOP CHỈ CÒN LẺ VÀI CHIẾC - VÀ BÊN SHOP MỚI VỀ MẪU HOODIEZIP BẠN NHA - HOODIEZIP THÌ VẪN SẼ CÓ TAG MŨ VÀ HÌNH IN SAU LƯNG NHƯ ÁO HOODIE CẬU NHA - MẶT TRƯỚC HOODIEZIP SẼ LÀ TRƠN GIỐNG ẢNH Ạ - VÌ HOODIEZIP MỚI VỀ NÊN CHƯA CÓ ẢNH MẪU MONG CẬU THÔNG CẢM Ạ ♥️ CẬU ĐỌC KỸ PHẦN PHÂN LOẠI SẢN PHẨM ĐỂ TRÁNH ĐẶT NHẦM NHA 🧸
                DEUNCOOL STUDIOS HOODIE - Màu Grey Light
                Chất liệu : Nỉ cotton 100% (lót bông).
                Size: M/L/XL. “ Với trường hợp áo chật bạn hãy nhắn tin cho shop để shop hỗ trợ đổi size cho bạn nhé, đừng vội đánh giá sản phẩm, tội shop lắm ạ  🥺“
                - Năm nay shop dùng dây bản tròn giống trong video nhé ♥️
                _________________
                📦  HƯỚNG DẪN SỬ DỤNG: 
                - Giặt bằng tay để giữ chất lượng, màu sắc & độ bền của sản phẩm 
                - Giặt trước khi sử dụng để ko bị dính lông khi mang do sản phẩm nỉ mới 
                - Giặt mặt trong để bảo quản hình in, thêu giặt bằng tay để giữ chất lượng, màu sắc & độ bền của sản phẩm
                _________________
                
                FORM ÁO:             
                -Size M: Dài 63cm
                -Size L: Dài 68cm
                -Size XL: Dài 72cm
                
                ®️ Designed by UNCOOL TEAMS.
                📎 Instagram: @Deuncoolstudios.
                AVAILABLE NOW
                🛒 Mua ngay đi kẻo hết lạnh bây giờ ',
                'content' => null,
                'price' => 420000,
                'qty' => 20,
                'discount' => 320000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 3,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Guangzhou sweater',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'content' => null,
                'price' => 100000,
                'qty' => 20,
                'discount' => 80000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 4,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Microfiber Wool Scarf',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'content' => null,
                'price' => 120000,
                'qty' => 20,
                'discount' => 80000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Accessories',
            ],
            [
                'id' => 5,
                'brand_id' => 1,
                'product_category_id' => 3,
                'name' => "Men's Painted Hat",
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'content' => null,
                'price' => 200000,
                'qty' => 20,
                'discount' => 100000,
                'weight' => null,
                'sku' => null,
                'featured' => false,
                'tag' => 'Accessories',
            ],
            [
                'id' => 6,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Converse Shoes',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'content' => null,
                'price' => 330000,
                'qty' => 20,
                'discount' => 280000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 7,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Pure Pineapple',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'content' => null,
                'price' => 1000000,
                'qty' => 20,
                'discount' => 400000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'HandBag',
            ],
            [
                'id' => 8,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => '2 Layer Windbreaker',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'content' => null,
                'price' => 100000,
                'qty' => 20,
                'discount' => 70000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 9,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Converse Shoes',
                'description' => 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor',
                'content' => null,
                'price' => 100000,
                'qty' => 20,
                'discount' => 80000,
                'weight' => null,
                'sku' => null,
                'featured' => true,
                'tag' => 'Shoes',
            ],
        ]);

        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => 'product-1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-2.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9.jpg',
            ],
        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 4,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 4,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 4,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 4,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 6,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 6,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 6,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 6,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 8,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 8,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 8,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 8,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 9,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 9,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 9,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 9,
                'size' => 'XL',
                'qty' => 5,
            ],
        ]);

        DB::table('product_comments')->insert([
            [
                'product_id' => 1,
                'user_id' => 4,
                'email' => 'BrandonKelley@gmail.com',
                'name' => 'Brandon Kelley',
                'messages' => 'Nice !',
                'rating' => 5,
            ],
            [
                'product_id' => 1,
                'user_id' => 5,
                'email' => 'RoyBanks@gmail.com',
                'name' => 'Roy Banks',
                'messages' => 'Nice !',
                'rating' => 6,
            ],
        ]);
    }
}

