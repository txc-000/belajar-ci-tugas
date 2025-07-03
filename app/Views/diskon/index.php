<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2>Data Diskon</h2>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif ?>

<a href="<?= site_url('diskon/create') ?>" class="btn btn-success mb-3">Tambah Diskon</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nominal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($diskon as $i => $d): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $d['tanggal'] ?></td>
                <td>Rp <?= number_format($d['nominal'], 0, ',', '.') ?></td>
                <td>
                    <a href="<?= site_url('diskon/edit/' . $d['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?= base_url('diskon/delete/' . $d['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus diskon ini?')">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>

            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>