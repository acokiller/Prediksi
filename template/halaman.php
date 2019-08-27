 <?php 
        if(isset($_GET['page'])){
            $page = $_GET['page'];

            switch ($page) {
                case 'home':
                include "template/home.php";
                break;
                case 't_produksi':
                include "template/t_produksi.php";
                break;
                case 'e_produksi':
                include "template/e_produksi.php";
                break;
                case 'd_produksi':
                include "template/d_produksi.php";
                break;
                case 'sma':
                include "template/sma.php";
                break;
                case 'ls':
                include "template/ls.php";
                break;
                case 'd_mobil':
                include "template/d_mobil.php";
                break;
                case 't_mobil':
                include "template/t_mobil.php";
                break;
            }
        }else{
            include "template/home.php";
        }

        ?>