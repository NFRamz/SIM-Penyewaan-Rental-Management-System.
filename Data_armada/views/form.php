<?php 
$isEdit = isset($vehicle); 
?>

<h2><?= $isEdit ? 'Edit Kendaraan' : 'Tambah Kendaraan' ?></h2>

<form action="index.php?page=armada&action=<?= $isEdit ? 'update&id='.$vehicle['id'] : 'store' ?>" method="POST">
    
    <div>
        <label>Nama Kendaraan</label>
        <input type="text" name="nama" value="<?= $isEdit ? $vehicle['nama_kendaraan'] : '' ?>" required>
    </div>

    <div>
        <label>Jenis</label>
        <select name="jenis" required>
            <option value="">-- Pilih --</option>
            <option value="Mobil" <?= ($isEdit && $vehicle['jenis'] == 'Mobil') ? 'selected' : '' ?>>Mobil</option>
            <option value="Motor" <?= ($isEdit && $vehicle['jenis'] == 'Motor') ? 'selected' : '' ?>>Motor</option>
            <option value="Truk" <?= ($isEdit && $vehicle['jenis'] == 'Truk') ? 'selected' : '' ?>>Truk</option>
        </select>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
        <div>
            <label>Tahun</label>
            <input type="number" name="tahun" value="<?= $isEdit ? $vehicle['tahun'] : '' ?>" required>
        </div>
        <div>
            <label>Nomor Plat</label>
            <input type="text" name="plat" value="<?= $isEdit ? $vehicle['nomor_plat'] : '' ?>" required>
        </div>
    </div>

    <div>
        <label>Harga Sewa</label>
        <input type="number" name="harga" value="<?= $isEdit ? $vehicle['harga_sewa'] : '' ?>" required>
    </div>

    <div style="margin-top: 10px; display: flex; gap: 10px;">
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="index.php?page=armada" class="btn btn-danger" style="background: rgba(255,255,255,0.1); color: white; border: none;">Batal</a>
    </div>
</form>