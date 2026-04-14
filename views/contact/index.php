<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<div class="col-10 p-0">

<!-- TOP BAR -->
<div class="d-flex justify-content-between align-items-center p-3 border-bottom bg-white">
  <h5 class="mb-0">CRM Dashboard</h5>
  <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalAdd">
    + Tambah Client
  </button>
</div>

<div class="row g-0" style="height: calc(100vh - 60px);">

<!-- LEFT PANEL -->
<div class="col-4 border-end bg-white" style="overflow-y:auto;">

  <div class="p-3">
    <input id="searchInput" class="form-control" placeholder="Search client...">
  </div>

  <?php while($row = $data->fetch_assoc()): ?>
    
    <div class="client-item px-3 py-2"
         data-nama="<?= strtolower($row['nama_usaha']) ?>"
         onclick="showDetail(
            '<?= $row['id'] ?>',
            '<?= addslashes($row['nama_usaha']) ?>',
            '<?= $row['email'] ?>',
            '<?= $row['notelp'] ?>',
            '<?= $row['status'] ?>',
            '<?= $row['project_status'] ?>'
         )">

      <div class="fw-semibold"><?= $row['nama_usaha'] ?></div>
      <small class="text-muted"><?= $row['notelp'] ?></small><br>

      <span class="badge <?= $row['status']=='sudah'?'bg-success':'bg-secondary' ?>">
        <?= $row['status'] ?>
      </span>

    </div>

  <?php endwhile; ?>

</div>

<!-- RIGHT PANEL -->
<div class="col-8 bg-light p-4">

  <div id="detailBox" class="detail-card text-center text-muted">
    Pilih client di kiri… atau tambah dulu kalau hidup masih kosong.
  </div>

</div>

</div>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalAdd" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg">

      <form method="POST" action="index.php?action=store">

        <div class="modal-header border-0 pb-0">
          <div>
            <h5 class="fw-bold mb-0">Tambah Client Baru</h5>
            <small class="text-muted">Masukkan data usaha</small>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <div class="row g-3">

            <div class="col-md-6">
              <input name="nama" class="form-control" placeholder="Nama Usaha" required>
            </div>

            <div class="col-md-6">
              <input name="email" class="form-control" placeholder="Email">
            </div>

            <div class="col-md-6">
              <input name="telp" class="form-control" placeholder="62..." required>
            </div>

            <div class="col-md-6">
              <input name="sosmed" class="form-control" placeholder="Sosial Media">
            </div>

          </div>

        </div>

        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-dark">Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- STYLE -->
<style>
.client-item {
  border-bottom: 1px solid #eee;
  cursor: pointer;
  transition: all 0.2s ease;
}
.client-item:hover {
  background: #f8f9fa;
}

.detail-card {
  background: white;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}
</style>

<!-- SCRIPT -->
<script>

// DETAIL
function showDetail(id, nama, email, telp, status, project) {

  let waMsg = `Selamat Pagi/Siang/Malam owner dari ${nama}, Saya lihat usaha Bapak/Ibu di Google Maps belum punya website, padahal reviewnya sudah bagus. Saya bisa bantu buat landing page sederhana biar pelanggan lebih mudah menemukan info lengkap..`;

  document.getElementById("detailBox").innerHTML = `
    <div class="detail-card text-start">
      
      <h4 class="mb-3">${nama}</h4>

      <p><b>Email:</b> ${email || '-'}</p>
      <p><b>Telp:</b> ${telp}</p>

      <p>
        <b>Status:</b> 
        <span class="badge ${status=='sudah'?'bg-success':'bg-secondary'}">${status}</span>
      </p>

      <p>
        <b>Project:</b> 
        <span class="badge bg-info">${project}</span>
      </p>

      <!-- ACTION CONTACT -->
      <div class="mb-3">
        <a href="https://wa.me/${telp}?text=${encodeURIComponent(waMsg)}" 
           target="_blank" class="btn btn-success btn-sm">WhatsApp</a>

        <a href="mailto:${email}" 
           class="btn btn-primary btn-sm">Email</a>
      </div>

      <hr>

      <!-- STATUS ACTION -->
      <div class="mb-2">
        <a href="index.php?action=status&id=${id}&status=sudah"
          class="btn btn-warning btn-sm">Sudah Dihubungi</a>

        <a href="index.php?action=status&id=${id}&status=belum"
          class="btn btn-secondary btn-sm">Belum</a>
      </div>

      <!-- PROJECT ACTION -->
      <div class="mb-3">
        <a href="index.php?action=project&id=${id}&project=berjalan"
          class="btn btn-info btn-sm">Project Berjalan</a>

        <a href="index.php?action=project&id=${id}&project=selesai"
          class="btn btn-dark btn-sm">Project Selesai</a>
      </div>

      <hr>

      <!-- DELETE -->
      <a href="index.php?action=delete&id=${id}"
        class="btn btn-danger btn-sm"
        onclick="return confirm('Yakin hapus client ini?')">
        Hapus Client
      </a>

    </div>
  `;
}

// SEARCH
document.getElementById("searchInput").addEventListener("keyup", function() {
  let keyword = this.value.toLowerCase();
  let items = document.querySelectorAll(".client-item");

  items.forEach(item => {
    let nama = item.getAttribute("data-nama");

    if (nama.includes(keyword)) {
      item.style.display = "block";
    } else {
      item.style.display = "none";
    }
  });
});

</script>

<?php include 'views/layout/footer.php'; ?>