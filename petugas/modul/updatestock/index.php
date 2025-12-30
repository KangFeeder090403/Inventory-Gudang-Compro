<?php
include 'sesi_petugas.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Stock</title>
</head>

<body>

    <div id="loader">
        <div class="spinner"></div>
    </div>

    <!-- Konten Utama -->
    <div id="content" style="display:none;">
        <?php
        $modul = (isset($_GET['s'])) ? $_GET['s'] : "awal";
        switch ($modul) {
            case 'awal':
            default:
                include "modul/updatestock/title.php";
                break;
            case 'simpan':
                include "modul/updatestock/simpan.php";
                break;
            case 'hapus':
                include "modul/updatestock/hapus.php";
                break;
            case 'ubah':
                include "modul/updatestock/ubah.php";
                break;
            case 'update':
                include "modul/updatestock/update.php";
                break;
        }
        ?>
    </div>

    <style>
        /* Loader Wrapper */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 1s ease;
            /* efek fade out */
        }

        /* Spinner */
        .spinner {
            width: 60px;
            height: 60px;
            border: 6px solid #ddd;
            border-top: 6px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <script>
        window.addEventListener("load", function () {
            const loader = document.getElementById("loader");
            const content = document.getElementById("content");

            setTimeout(() => {
                loader.style.opacity = "0";
                setTimeout(() => {
                    loader.style.display = "none";
                    content.style.display = "block";
                }, 1000);
            }, 2000);
        });
    </script>

</html>