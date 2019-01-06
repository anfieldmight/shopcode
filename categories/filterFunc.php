<?php
$noMatch = '';
if (isset($_POST['submitFilter'])){
    $activeFilters  = [];
    //print_r($_POST);
    foreach ($_POST as $key => $value){
        if ($value != '0'){
            $activeFilters[$key] = $value;
        }
    }
    array_pop($activeFilters);

    $sqlSelect = "SELECT * FROM $category WHERE ";
    //print_r($activeFilters);
    foreach ($activeFilters as $key =>$value){
        if ($key == 'price') {
            if ($value == '599') {
                $sqlSelect .= $key . "<='" . $value . "'!!!";
            } elseif ($value == '600-1000') {
                $value = explode("-", $value);
                $min = $value[0];
                $max = $value[1];
                $sqlSelect .= $key . ">='" . $min . "' && " . $key . "<='" . $max . "'!!!";
            } elseif ($value == '1001') {
                $sqlSelect .= $key . ">='" . $value . "'!!!";
            }
        }elseif($key == "display"){
            if ($value == '4.9') {
                $sqlSelect .= $key . "<='" . $value . "' && ";
            } elseif ($value == '5-5.5') {
                $value = explode("-", $value);
                $min = $value[0];
                $max = $value[1];
                $sqlSelect .= $key . ">='" . $min . "' && " . $key . "<='" . $max . "' && ";
            } elseif ($value == '5.6') {
                $sqlSelect .= $key . ">='" . $value . "' && ";
            }elseif ( $value == '22'){
                $sqlSelect .= $key . "<'" . $value . "' &&";
            }elseif ($value == '22-25'){
                $value = explode("-", $value);
                $min = $value[0];
                $max = $value[1];
                $sqlSelect .= $key . ">='" . $min . "' && " . $key . "<='" . $max . "' && ";
            }elseif($value == '26'){
                $sqlSelect .= $key . ">='" . $value . "' && ";
            }
        }else{
            $sqlSelect .= $key."='".$value."' && ";
        }

    }
    $sqlSelect = substr($sqlSelect, 0, -3);
    $sqlSelect .= ' ORDER BY id DESC';
    //echo $sqlSelect;
    $data = $db->query($sqlSelect, PDO::FETCH_ASSOC);
    $dataM = $db->query($sqlSelect, PDO::FETCH_ASSOC);
    $matches = $dataM->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($matches)) {
        $matches = $matches[0];
    }

    if (empty($matches)){
        $noMatch = "No matches";
    }




}else {
    $data = $db->query("SELECT * FROM $category ORDER BY id DESC", PDO::FETCH_ASSOC);
}
?>