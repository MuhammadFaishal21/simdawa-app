<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Tambah Beasiswa</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('beasiswa') ?>" class="breadcrumb-link">Beasiswa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama_beasiswa">Nama Beasiswa</label>
                        <input type="text" name="nama_beasiswa" required class="form-control" placeholder="Nama Beasiswa">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jenis_id">Jenis Beasiswa</label>
                        <select name="jenis_id" required class="form-control">
                            <option value="">Pilih Jenis Beasiswa</option>
                            <?php foreach ($jenis as $j): ?>
                                <option value="<?= $j->id ?>"><?= $j->nama_jenis ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <a href="<?= base_url('beasiswa') ?>" class="btn btn-danger float-right">Batal</a>
                    <button type="submit" name="create" class="btn btn-info float-right mr-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>