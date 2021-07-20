

 <nav>
      <ul>
         <li class="site">Aplikasi Peminjaman Buku</li>

         <li class="users"> Halo <b><?php echo $_SESSION['username']; ?>,</b> <b><?php echo $_SESSION['level']; ?></b> </li>
         <li class="items"><a href="">Home</a></li>
         <li class="items"><a href="anggota_buku.php">Buku</a></li>
       
         <li class="items"><a href="anggota_tentang.php">Tentang</a></li>
         <li class="items"><a href="../backend/logout.php">Logout</a></li>
       
      </ul>
      
   </nav>