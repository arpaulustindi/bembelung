<?php

function fungsi_upload_file($input_name){
    require_once('_config_file.php');
    $target_file = $lokasi_folder.$input_name['name'];
    $temp_file = $input_name['tmp_name'];
    move_uploaded_file($temp_file, $target_file);

}

function fungsi_hapus_file($nama_file){
    require_once('_config_file.php');
    unlink($lokasi_folder.$nama_file);
}
?>