<?php


$array = array();
for ($i = 1; $i <= 1000; $i++) {
    array_push($array, array('id' => $i, 'name' => 'Project: ' . random_int(0, 9999),'progress'=> random_int(0, 100), 'date' => date("m.d.y")));
}
echo json_encode($array);


if (isset($_POST['projectname'])) {
} else {
    //echo json_encode(array('success' => 9999));
}
