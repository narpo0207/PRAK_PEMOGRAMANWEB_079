<?php
function segitigaSamaSisiTerbalik($n) {
    for ($i = $n; $i >= 1; $i--) {
        // Spasi di sebelah kiri
        for ($j = $n; $j > $i; $j--) {
            echo "&nbsp;&nbsp;";
        }
        // Bintang-bintang
        for ($k = 1; $k <= (2 * $i - 1); $k++) {
            echo "*";
        }
        echo "<br>";
    }
}

segitigaSamaSisiTerbalik(5); // Ubah angka 5 untuk ukuran segitiga yang diinginkan
?>