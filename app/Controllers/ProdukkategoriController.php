<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class ProdukkategoriController extends BaseController
{
    protected $product_category;

    function __construct()
    {
        $this->product_category = new KategoriModel();
    }

    public function index()
    {
        $product_category = $this->product_category->findAll();
        $data['product_category'] = $product_category;

        return view('v_kategori', $data);
    }

    public function create()
    {

        $dataForm = [
            'kategori' => $this->request->getPost('kategori'),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->product_category->insert($dataForm);

        return redirect('kategori')->with('success', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $dataForm = [
            'kategori' => $this->request->getPost('kategori'),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->product_category->update($id, $dataForm);

        return redirect('kategori')->with('success', 'Data Berhasil Diubah');
    }


    public function delete($id)
    {
        $kategori = $this->product_category->find($id);

        if (!$kategori) {
            return redirect('kategori')->with('error', 'Kategori tidak ditemukan');
        }

        $this->product_category->delete($id);

        return redirect('kategori')->with('success', 'Data berhasil dihapus');
    }
}
