

<sidebar>

    <a href="admin_home.php">Dashboard</a>

        <button class="accordion">Transaksi</button>
        <div class="panel">
            <a href="peminjaman.php">Peminjaman</a>
            <a href="pengembalian.php">Pengembalian</a>
        </div>

        <button class="accordion">Kelola Data</button>
        <div class="panel">
            <a href="kelola_buku.php">Buku</a>
            <a href="kelola_anggota.php">Anggota</a>
            <a href="kelola_admin.php">Admin</a>
        </div>

    <a href="../backend/logout.php">Logout</a>   

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

</sidebar>