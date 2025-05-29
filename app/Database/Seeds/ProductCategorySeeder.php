<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_name' => 'Sepatu Pria',
                'description'   => 'Kategori sepatu untuk pria.',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => 'Sandal Wanita',
                'description'   => 'Kategori sandal untuk wanita.',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => 'Anak-anak',
                'description'   => 'Kategori untuk sepatu dan sandal anak-anak.',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('product_category')->insertBatch($data);
    }
}
