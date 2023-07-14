<?php
require 'fungsi/fungsi.php';

$id_sample = $_GET["id_sample"];

if (hapus($id_sample) > 0) {
    header('Location: sample.php');
} else {
    echo "
            <script>
                alert('data tidak berhasil dihapus');
                document.location.href = 'sample.php';
            </script>
            ";
}


?>