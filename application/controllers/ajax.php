<?php
include "getsaldo.php";
print_r($_GET[INDUK_COA]);
$saldo = mysqli_fetch_array(mysqli_query($config, "select TOTAL_SALDO from input_saldo_sarpras where INDUK_COA='$_GET[INDUK_COA]'"));
$data_saldo = array('TOTAL_SALDO'      =>  $saldo['TOTAL_SALDO'],
                    'SALDO_AWAL'     =>  $saldo['SALDO_AWAL']);
 echo json_encode($data_saldo);

 ?>