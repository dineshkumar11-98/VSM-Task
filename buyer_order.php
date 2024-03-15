<?php
    include 'includes/connect.php';

    $query1 = "select * from buyer_orders;";
    $executeQuery1 = $connect->prepare($query1);
    $executeQuery1->execute();
    $buyers_order = $executeQuery1->get_result();

    $buyers_orderArray = [];

    while($buyer_order = $buyers_order->fetch_assoc()){
        array_push($buyers_orderArray, $buyer_order);
    }
    $executeQuery1->close();

    $query2 = "select * from buyer_order_details;";
    $executeQuery2 = $connect->prepare($query2);
    $executeQuery2->execute();
    $order_details = $executeQuery2->get_result();

    $order_detailsArray = [];

    while($order_detail = $order_details->fetch_assoc()){
        for($temp = 0; $temp < count($buyers_orderArray); $temp++) {
            if($order_detail["posting_ref_no"] == $buyers_orderArray[$temp]["posting_ref_no"]){
                $buyers_orderArray[$temp]["orderList"] = $order_detail["orderList"];
                $buyers_orderArray[$temp]["total_order"] = $order_detail["total_order"];
            }
        }
    }
    $executeQuery2->close();


    echo json_encode($buyers_orderArray);
?>