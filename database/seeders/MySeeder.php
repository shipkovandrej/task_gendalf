<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Good;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // категории
        Category::create(array(
            'name' => "men clothing",
        ));
        Category::create(array(
            'name' => 'women clothing',
        ));
        Category::create(array(
            'name' => 'jewelery',
        ));
        Category::create(array(
            'name' => 'electronics',
        ));
        Category::create(array(
            'name' => 'children clothing',
        ));

        //товары
        Good::create(array(
            'name' => 'Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops',
            'desc' => 'Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday',
            'price' => 109.95,
            'category_id' => 1
        ));

        Good::create(array(
            'name' => 'Lock and Love Womens Removable Hooded Faux Leather Moto Biker Jacket',
            'desc' => '100% POLYURETHANE(shell) 100% POLYESTER(lining) 75% POLYESTER 25% COTTON (SWEATER), Faux leather material for style and comfort / 2 pockets of front, 2-For-One Hooded denim style faux leather jacket, Button detail on waist / Detail stitching at sides, HAND WASH ONLY / DO NOT BLEACH / LINE DRY / DO NOT IRON',
            'price' => 29.95,
            'category_id' => 2
        ));

        Good::create(array(
            'name' => 'Pierced Owl Rose Gold Plated Stainless Steel Double',
            'desc' => 'Rose Gold Plated Double Flared Tunnel Plug Earrings. Made of 316L Stainless Steel',
            'price' => 10.99,
            'category_id' => 3
        ));

        Good::create(array(
            'name' => 'WD 2TB Elements Portable External Hard Drive - USB 3.0',
            'desc' => 'USB 3.0 and USB 2.0 Compatibility Fast data transfers Improve PC Performance High Capacity; Compatibility Formatted NTFS for Windows 10, Windows 8.1, Windows 7; Reformatting may be required for other operating systems; Compatibility may vary depending on user’s hardware configuration and operating system',
            'price' => 64,
            'category_id' => 4
        ));

        Good::create(array(
            'name' => 'Opna children Short Sleeve Moisture',
            'desc' => '100% Polyester, Machine wash, 100% cationic polyester interlock, Machine Wash & Pre Shrunk for a Great Fit, Lightweight, roomy and highly breathable with moisture wicking fabric which helps to keep moisture away, Soft Lightweight Fabric with comfortable V-neck collar and a slimmer fit, delivers a sleek, more feminine silhouette and Added Comfort',
            'price' => 7.95,
            'category_id' => 5
        ));

        Good::create(array(
            'name' => 'Mens Casual Premium Slim Fit T-Shirts',
            'desc' => 'Slim-fitting style, contrast raglan long sleeve, three-button henley placket, light weight & soft fabric for breathable and comfortable wearing. And Solid stitched shirts with round neck made for durability and a great fit for casual fashion wear and diehard baseball fans. The Henley style round neckline includes a three-button placket.',
            'price' => 4.1,
            'category_id' => 1
        ));

        Good::create(array(
            'name' => 'Opna Womens Short Sleeve Moisture',
            'desc' => '100% Polyester, Machine wash, 100% cationic polyester interlock, Machine Wash & Pre Shrunk for a Great Fit, Lightweight, roomy and highly breathable with moisture wicking fabric which helps to keep moisture away, Soft Lightweight Fabric with comfortable V-neck collar and a slimmer fit, delivers a sleek, more feminine silhouette and Added Comfort',
            'price' => 7.95,
            'category_id' => 2
        ));

        Good::create(array(
            'name' => 'Solid Gold Petite Micropave',
            'desc' => 'Satisfaction Guaranteed. Return or exchange any order within 30 days.Designed and sold by Hafeez Center in the United States. Satisfaction Guaranteed. Return or exchange any order within 30 days.',
            'price' => 168,
            'category_id' => 3
        ));

        Good::create(array(
            'name' => 'Silicon Power 256GB SSD 3D NAND A55 SLC Cache Performance Boost SATA III 2.5',
            'desc' => '3D NAND flash are applied to deliver high transfer speeds Remarkable transfer speeds that enable faster bootup and improved overall system performance. The advanced SLC Cache Technology allows performance boost and longer lifespan 7mm slim design suitable for Ultrabooks and Ultra-slim notebooks. Supports TRIM command, Garbage Collection technology, RAID, and ECC (Error Checking & Correction) to provide the optimized performance and enhanced reliability.',
            'price' => 109,
            'category_id' => 4
        ));

        Good::create(array(
            'name' => 'Rain Jacket Children Windbreaker Striped Climbing Raincoats',
            'desc' => 'Lightweight perfet for trip or casual wear---Long sleeve with hooded, adjustable drawstring waist design. Button and zipper front closure raincoat, fully stripes Lined and The Raincoat has 2 side pockets are a good size to hold all kinds of things, it covers the hips, and the hood is generous but doesnt overdo it.Attached Cotton Lined Hood with Adjustable Drawstrings give it a real styled look.',
            'price' => 3.8,
            'category_id' => 5
        ));

        User::create([
            'name' => 'admin1',
            'email' => 'aa@example.com',
            'password' => bcrypt('aaaaaa')
        ]);

    }
}
