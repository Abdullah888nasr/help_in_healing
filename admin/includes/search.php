<?php 
    require_once('../../includes/connect.php');
    $searchEngine = $_REQUEST['search'];
    if(is_numeric(trim($searchEngine)) == 1):
        $searchField = 'phone';
    else:
        $searchField = 'name';
    endif;
    if($searchEngine !== ''):
        $sql="SELECT * FROM `doctors` WHERE $searchField like '%$searchEngine%'";
    else:
        $sql="SELECT * FROM doctors";
    endif;
    tableSearch($conn, $sql);
?>