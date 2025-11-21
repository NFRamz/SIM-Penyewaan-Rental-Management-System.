<h2>Daftar Sewa Masuk (Transaksi)</h2>

<div class="table-responsive">
    <table cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Penyewa</th>
                <th>Kendaraan</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($messages)): ?>
                <tr><td colspan="6" style="text-align:center; padding:20px;">Belum ada data.</td></tr>
            <?php else: ?>
                <?php foreach ($messages as $row): ?>
                <tr>
                    <td>#<?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['nama_penyewa']) ?></td>
                    <td><?= htmlspecialchars($row['nama_kendaraan']) ?> <br> <small><?= $row['nomor_plat'] ?></small></td>
                    <td><?= $row['tanggal_mulai'] ?> s/d <?= $row['tanggal_selesai'] ?></td>
                    <td>Rp <?= number_format($row['total_biaya']) ?></td>
                    <td>
                        <a href="index.php?page=pesan_masuk&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-action" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>