<?php

if (isset($_POST['projectname'])) {
    echo json_encode(array('success' => "OK",'name' => 'Project: ' . random_int(0, 9999)));
} else {
    echo json_encode(array('success' => "KO"));
}
