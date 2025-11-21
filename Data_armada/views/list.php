<h2>Data Armada Kendaraan</h2>

<div style="margin-bottom: 20px;">
    <form action="index.php" method="GET" style="display: flex; gap: 10px; flex-direction: row;">
        <input  type="hidden" name ="page" value="armada">
        <input  type="text"   name ="search" placeholder="Cari Nama / Jenis / Tahun..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" style="width: 300px;">
        <button type="submit" class="btn btn-primary">Cari</button>
        <?php if(isset($_GET['search'])): ?>
            <a href="index.php?page=armada" class="btn btn-danger" style="text-decoration:none;">Reset</a>
        <?php endif; ?>
    </form>
</div>


<div style="margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center;">
    <span style="color: #b9b9c3;">Total Kendaraan: <?= count($vehicles) ?> unit</span>
    <a href="index.php?page=armada&action=create" class="btn btn-primary">+ Tambah Unit Baru</a>
</div>

<div class="table-responsive">
    <table cellspacing="0">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="25%">KENDARAAN</th> 
                <th width="15%">JENIS</th>
                <th width="15%">TAHUN</th>
                <th width="15%">PLAT NOMOR</th>
                <th width="15%">HARGA SEWA</th>
                <th width="20%" style="text-align: center;">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $row): ?>
            <?php 
                $badgeClass = 'badge-mobil';
                if ($row['jenis'] == 'Motor') $badgeClass = 'badge-motor';
                if ($row['jenis'] == 'Truk') $badgeClass = 'badge-truk';
            ?>
            <tr>
                <td style="font-weight: bold; color: #ff9f43;">#<?= $row['id'] ?></td>
                <td style="font-weight: 600;"><?= htmlspecialchars($row['nama_kendaraan']) ?></td>
                <td><span class="badge <?= $badgeClass ?>"><?= htmlspecialchars($row['jenis']) ?></span></td>
                <td><?= htmlspecialchars($row['tahun']) ?></td>
                <td style="font-family: monospace; letter-spacing: 1px;"><?= htmlspecialchars($row['nomor_plat']) ?></td>
                <td style="color: #28c76f; font-weight: 600;">Rp <?= number_format($row['harga_sewa'], 0, ',', '.') ?></td>
                <td style="text-align: center;">
                    <div style="display: flex; justify-content: center; gap: 8px;">
                        <a href="index.php?page=pesan_masuk&action=create&vehicle_id=<?= $row['id'] ?>" class="btn btn-action" style="background: #00b894; color: white;">Sewa</a>    
                        <a href="index.php?page=armada&action=edit&id=<?= $row['id'] ?>" class="btn btn-primary btn-action">Edit</a>
                        <a href="index.php?page=armada&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-action" onclick="return confirm('Hapus data ini?')">Delete</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>