   <?php
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $dbname = 'rangkui';
   $port = 3306; // Sesuaikan menjadi 3307 jika di .env Anda menggunakan 3307
   $prefix = 'bugbug';

   $conn = new mysqli($host, $user, $pass, $dbname, $port);

   if ($conn->connect_error) {
       die("Koneksi gagal: " . $conn->connect_error . "\n");
   }

   $result = $conn->query("SHOW TABLES");
   $renamed = 0;

   echo "Memulai proses penamaan ulang tabel...\n\n";

   while ($row = $result->fetch_row()) {
       $table = $row[0];
       
       // Lewati tabel yang sudah memiliki awalan 'bugbug' (seperti bugbuguser yang Anda ubah sebelumnya)
       if (strpos($table, $prefix) === 0) {
           continue;
       }
       
       $newTable = $prefix . $table;
       $sql = "RENAME TABLE `$table` TO `$newTable`";
       
       if ($conn->query($sql) === TRUE) {
           echo "✓ $table  =>  $newTable\n";
           $renamed++;
       } else {
           echo "✗ Gagal pada $table: " . $conn->error . "\n";
       }
   }

   echo "\n========================================\n";
   echo "Selesai! Total tabel yang diubah: $renamed\n";
   echo "========================================\n";
   $conn->close();
   ?>