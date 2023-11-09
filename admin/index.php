<?php 
include "header.php";

if(isset($_GET['act']) && !empty($_GET['act'])){
    $act=$_GET['act'];
    switch ($act) {
        case 'listdm':
            include "danhmuc/list.php";
            break;
        case 'adddm':
            include "danhmuc/add.php";
            break;
        case 'editdm':
            include "danhmuc/edit.php";
            break;
        case 'deletedm':
            include "danhmuc/list.php";
            break;
        default:
        include "home.php";
            break;
    }
    }
    else{
    include "home.php";
    }

include "footer.php";
?>