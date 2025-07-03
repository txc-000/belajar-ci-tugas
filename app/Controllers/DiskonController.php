<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskon;

    public function __construct()
    {
        $this->diskon = new DiskonModel();
    }

    public function index()
    {
        return view('diskon/index', [
            'diskon' => $this->diskon->findAll()
        ]);
    }

    public function create()
    {
        return view('diskon/create');
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (!$this->diskon->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->diskon->errors());
        }

        // ✅ Jika tanggal yang dimasukkan adalah hari ini, set session diskon
        if ($data['tanggal'] == date('Y-m-d')) {
            session()->set('diskon', $data['nominal']);
        }

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('diskon/edit', [
            'diskon' => $this->diskon->find($id)
        ]);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $data['id'] = $id;

        if (!$this->diskon->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->diskon->errors());
        }

        // ✅ Jika tanggal diskon yang diedit = hari ini, update session diskon
        if ($data['tanggal'] == date('Y-m-d')) {
            session()->set('diskon', $data['nominal']);
        }

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil diperbarui');
    }

    public function delete($id)
    {
        // Ambil data diskon dulu sebelum dihapus
        $diskon = $this->diskon->find($id);

        if ($diskon) {
            $this->diskon->delete($id);

            // ✅ Hapus session jika diskon hari ini yang dihapus
            if ($diskon['tanggal'] == date('Y-m-d')) {
                session()->remove('diskon');
            }

            return redirect()->to('/diskon')->with('success', 'Diskon berhasil dihapus');
        }

        return redirect()->to('/diskon')->with('error', 'Diskon tidak ditemukan');
    }
}
