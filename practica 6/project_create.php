<?php
if (isset($_POST['projectname']) && $_POST['projectname'] ) {
    echo json_encode(array('success' => 1,'projectname'=>$_POST['projectname']));
} else {
    echo json_encode(array('success' => 0));
}