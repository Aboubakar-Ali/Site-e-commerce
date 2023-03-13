<?php

$stockByProducts_ = array_map(null, array_column($stock_, 'id_product'), $stock_);
foreach ($stockByProducts_ as [$key, $value]){
    $key = array_search($key, array_column($prdcts, 'id_product'));
    $prdcts[$key]["stock"][$value["size"]] = $value["in_stock"];
}
unset($stockByProducts_);

// echo "<pre>"; 
// echo json_encode($prdcts);	
// echo "</pre>";

$card = function($data){
    extract($data);
    $inStock = array_keys(array_diff($stock, [0]));
    $stockEcho = implode(', ', $inStock);
    $stockEcho_ = implode('|', $inStock);
    $stockEcho = (empty($stockEcho)) ? "rien" : $stockEcho ;
    echo "<div card title='$name' price='$price' color='$color' pntr='$stockEcho_'>
        <div class='img'><img src='$img'></div>
        <div class='foot'>
            <div class='head'>
                <div class='title'>$name</div>
                <div class='price'>$price$</div>
            </div>
            $color <br><br>
            Tailles en stock :
            $stockEcho
        </div>
    </div>";
};

?>