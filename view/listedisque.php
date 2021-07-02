<?php


require $_SERVER['DOCUMENT_ROOT'] . "/controller/listedisquecontroller.php";
$conn = new db_records();
$crud = new cruddisque($conn);
//$resultat = $crud->getrecord();
//echo json_encode($resultat);
//include $_SERVER['DOCUMENT_ROOT']."/template/header.php";
//foreach ($resultat as $disc) {


if (isset($_GET['titre'])) {

    echo json_encode($crud->getonerecord($_GET['titre']));
}
//if(isset($_POST))
//{
//    return json_encode($crud->getonerecord($_GET['titre']));
//}


if (isset($_POST['disc_id'])) {
    $resultat = $crud->getdetails($_POST['disc_id']);
    echo json_encode($resultat);
}

?>








