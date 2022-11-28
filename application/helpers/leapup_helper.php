<?php

/**
 * Simplified meta array
 *
 * @param $data
 * @return array
 */
function simpleMeta($data,$indexLabel="metadata_key",$valueLabel="value"){
    $newSimple=array();
    foreach($data as $i=>$row){
        $newSimple[$row[$indexLabel]] = $row[$valueLabel];
    }
    return $newSimple;
}

/**
 * Convert date format (1993-05-01 - YYYY-MM-DD) to 01 MAY 1993
 *
 * @param $date
 * @param $type date|datetime
 * @return string
 */
function dateFormatMonthName($date,$type="date"){
    $dateDash = $date;
    if($type=="datetime"){
        $dateDashThis = explode(" ",$date);
        $dateDash     = $dateDashThis[0];
    }
    $dateDash = explode('-',$dateDash);
    $dateMonth = toMonth($dateDash[1],"en");
    $dateFinal = $dateDash[2]." ".$dateMonth." ".$dateDash[0];
    if($type=="datetime"){
        $dateTimeDong=$dateDashThis[1];
        if($dateTimeDong=="00:00:00"){
            $dateTimeDong="";
        }
        $dateFinal = $dateFinal." ".$dateTimeDong;
    }
    return $dateFinal;
}

/**
 * Month to string
 *
 * @param $month
 * @return string
 */
function toMonth($month,$lang="en"){
    switch ($month){
        case 1 :
            if($lang=="en"){
                return "January";
            }else{
                return "Januari";
            }


        case 2 :
            if($lang=="en"){
                return "February";
            }else{
                return "Februari";
            }
        case 3 :
            if($lang=="en"){
                return "March";
            }else{
                return "Maret";
            }
        case 4 :
            if($lang=="en"){
                return "April";
            }else{
                return "April";
            }
        case 5 :
            if($lang=="en"){
                return "May";
            }else{
                return "Mei";
            }
        case 6 :
            if($lang=="en"){
                return "June";
            }else{
                return "Juni";
            }
        case 7 :
            if($lang=="en"){
                return "July";
            }else{
                return "Juli";
            }
        case 8 :
            if($lang=="en"){
                return "August";
            }else{
                return "Agustus";
            }
        case 9 :
            if($lang=="en"){
                return "September";
            }else{
                return "September";
            }
        case 10 :
            if($lang=="en"){
                return "October";
            }else{
                return "Oktober";
            }
        case 11 :
            if($lang=="en"){
                return "November";
            }else{
                return "November";
            }
        case 12 :
            if($lang=="en"){
                return "December";
            }else{
                return "Desember";
            }
    }
}

/**
 * Get bootstrap class from status
 *
 * @param $status
 * @return string
 */
function statusClass($status){
    switch($status):
        case "pending":
            $statusLabel="badge-light";
            break;
        case "draft":
            $statusLabel="badge-light";
            break;
        case "confirmed":
            $statusLabel="badge-success";
            break;
        case "paid":
            $statusLabel="badge-success";
            break;
        case "published":
            $statusLabel="badge-success";
            break;
        case "approved":
            $statusLabel="badge-success";
            break;
        case "canceled":
            $statusLabel="badge-warning";
            break;
        case "partialy-paid":
            $statusLabel="badge-info";
            break;
        case "rejected":
            $statusLabel="badge-danger";
            break;
        case "unpaid":
            $statusLabel="badge-danger";
            break;
    endswitch;
    return $statusLabel;
}

/**
 * Generate select from array
 *
 * @param $data
 * @param string $selected
 * @param string $value
 * @param string $label
 * @return string
 */
function generate_select($data,$selected="",$value="term_key",$label="term_value",$selectedAll=false,$prefix="",$suffix=""){
    $select="";
    foreach($data as $row){
        $selectedYes="";
        if($selected!=NULL && $selected!=""){
            if($selected==$row[$value] || $selected=="all"){
                $selectedYes="selected='selected'";
            }
        }
        if($selectedAll==true){
            $selectedYes="selected='selected'";
        }
        if($suffix){
            $suffixLabel=" - ".$row[$suffix];
        }
        $select.="<option ".$selectedYes." value='".$row[$value]."'>".$prefix.$row[$label].$suffixLabel."</option>";
    }
    return $select;
}

/**
 * Create primary key array
 *
 * @param $data
 * @param string $key
 * @return array
 */
function primaryKeysArray($data,$key="post_id"){
    $newData=array();
    foreach($data as $index=>$row){
        $newData[] = $row[$key];
    }
    return $newData;
}

/**
 * Redirect with error status
 *
 * @param $uri
 * @param $message
 * @param string $additional_param
 */
function redirect_error($uri,$message,$additional_param=""){
    if($uri && $message){
        redirect($uri.'?status=error&msg='.$message."&".$additional_param);
    }
}

/**
 * Redirect with warning status
 *
 * @param $uri
 * @param $message
 * @param string $additional_param
 */
function redirect_warning($uri,$message,$additional_param=""){
    if($uri && $message){
        redirect($uri.'?status=warning&msg='.$message."&".$additional_param);
    }
}

/**
 * Redirect with info status
 *
 * @param $uri
 * @param $message
 * @param string $additional_param
 */
function redirect_info($uri,$message,$additional_param=""){
    if($uri && $message){
        redirect($uri.'?status=info&msg='.$message."&".$additional_param);
    }
}

/**
 * Redirect with success status
 *
 * @param $uri
 * @param $message
 * @param string $additional_param
 */
function redirect_success($uri,$message,$additional_param=""){
    if($uri && $message){
        redirect($uri.'?status=success&msg='.$message."&".$additional_param);
    }
}

/**
 * Debugging
 *
 * @param $data
 * @param bool $exit
 */
function debug( $data,$exit=true,$format="array" ) {

    echo "<pre>";
    if($format=="json"){
        echo json_encode($data);
    }else{
        var_dump($data);
    }

    echo"</pre>";
    if($exit)
    {
        exit;
    }

}

/**
 * Debug last query
 */
function lastQuery(){
    $CI=get_instance();
    debug($CI->db->last_query());
}

/**
 * Stock masking. Return 0 if not in array
 *
 * @param $stockArray
 * @param $stockId
 * @return string
 */
function stockMasking($stockArray,$stockId){
    if(array_key_exists($stockId,$stockArray)){
        return  $stockArray[$stockId];
    }else{
        return "0";
    }

}

/**
 * Generate number format
 *
 * @param $angka
 * @return string
 */
function rupiah_format($angka)
{
    $jadi = number_format($angka,0,',','.');
    return $jadi;
}

/**
 * Generate invoice number
 *
 * @param $id
 * @return string
 */
function invoiceNumber($id,$hex=true){
    $hexSign="#";
    $pad = str_pad($id,5,"0",STR_PAD_LEFT);
    if($hex){
        return $hexSign.$pad;
    }else{
        return $pad;
    }

}

/**
 * Generate select markup from min, max qty
 *
 * @param $min
 * @param $max
 * @return string
 */
function generate_key_select($min,$max,$leap=1){
    $minMax=generate_qty($min,$max,$leap);
    return generate_select($minMax,"","value","label");
}

/**
 * Generate quantity
 *
 * @param $min
 * @param $max
 * @return array
 */
function generate_qty($min,$max,$leap=1){
    $arrayQty=array();

    if($min==$max){
        $arrayQty[] = array(
            'value' => $min,
            'label' => $min
        );
        return $arrayQty;
    }

    if($leap > 1){
        $arrayQty[] = array(
            'value' => $min,
            'label' => $min
        );
        $newIncreas = $min;
        for($i=$min;$newIncreas<=$max;$i++){

            $newIncreas = $newIncreas+$min;
            if($newIncreas<=$max){
                $arrayQty[] = array(
                    'value' => $newIncreas,
                    'label' => $newIncreas
                );
            }

        }
    }else{
        for($i=$min;$i<=$max;$i++){
            $arrayQty[] = array(
                'value' => $i,
                'label' => $i
            );
        }
    }

    return $arrayQty;
}