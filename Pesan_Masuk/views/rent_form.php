<h2>Formulir Sewa</h2>
<div style="background: #f1f2f6; padding: 15px; margin-bottom: 15px; border-radius: 10px;">
    <h3><?= htmlspecialchars($vehicle['nama_kendaraan']) ?></h3>
    <p>Harga: Rp <?= number_format($vehicle['harga_sewa']) ?> / hari</p>
</div>

<form action="index.php?page=pesan_masuk&action=store" method="POST">
    <input type="hidden" name="vehicle_id" value="<?= $vehicle['id'] ?>">
    <input type="hidden" name="harga_per_hari" value="<?= $vehicle['harga_sewa'] ?>">

    <div>
        <label>Nama Penyewa</label>
        <input type="text" name="nama" required>
    </div>

    <div style="display:flex; gap:10px;">
        <div style="flex:1">
            <label>Mulai</label>
            <input type="date" name="tgl_mulai" required>
        </div>
        <div style="flex:1">
            <label>Selesai</label>
            <input type="date" name="tgl_selesai" required>
        </div>
    </div>
    
    <div style="margin-top:15px;">
        <button type="submit" class="btn btn-primary">Konfirmasi Sewa</button>
        <a href="index.php?page=armada" class="btn btn-danger">Batal</a>
    </div>
</form>