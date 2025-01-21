<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Data Beasiswa</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Beasiswa</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->load->view('template/notifikasi');
        ?>
        <div class="card">
            <div class="card-header">
                <?php if ($this->session->userdata('peran') != 'USER') : ?>
                <a href="<?= base_url('beasiswa/tambah') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i> Tambah Data</a>
                <a href="<?= base_url('beasiswa/cetak') ?>" target="_blank" class="btn btn-sm btn-info mr-1 float-right"><i class="fas fa-print"></i> Cetak</a>
                <?php endif; ?>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Beasiswa</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Jenis Beasiswa</th>
                            <?php if ($this->session->userdata('peran') != 'USER') : ?>
                            <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($beasiswa as $b): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $b->nama_beasiswa ?></td>
                                <td><?= $b->tanggal_mulai ?></td>
                                <td><?= $b->tanggal_selesai ?></td>
                                <td><?= $b->nama_jenis ?></td>
                                <?php if ($this->session->userdata('peran') != 'USER') : ?>
                                <td>
                                    <a href="<?= base_url('beasiswa/ubah/' . $b->id) ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Ubah</a>
                                    <a href="<?= base_url('beasiswa/hapus/' . $b->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
