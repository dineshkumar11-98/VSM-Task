<?php
    session_start();

    if($_SESSION['username']){
        // echo $_SESSION['username'];
    }else{
        header("Location: index.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project - Yarn Inward Entry</title>
    <link rel="stylesheet" href="css/inward.css">
    <link rel="stylesheet" href="css/left_navbar.css">
</head>
<body>
    <div class="container">
        <?php include "includes/left_navbar.php" ?>
        <div class="form-container" id="yard_inward_entry">
            <div class="form-title">
                <h2>Yarn Inward Entry</h2>
                <span>Cut-off Date: 01/Mar/2024</span>
            </div>
            <div class="inward_data_Entry_container">
                <div class="inputBox">  <!-- refno -->
                    <label for="refno">RefNo</label>
                    <input type="text" id="refno" disabled>
                </div>
                <div class="inputBox">
                    <label for="date">Date</label> <!-- date -->
                    <input type="text" id="date" disabled>
                </div>
                <div class="inputBox">
                    <label for="inward_date">Inward Date</label> <!-- inward date -->
                    <input type="date" id="inward_date" >
                </div>
                <div class="inputBox column">
                    <label for="storage_name">At</label> <!-- at -->
                    <select id="storage_name">
                        <option>VSM01</option>
                        <option>VSM02</option>
                        <option>VSM03</option>
                        <option>VSM04</option>
                    </select>
                </div>
                <div class="inputBox column">
                    <label for="recd_type">Recd Type</label> <!-- recd type -->
                    <select id="recd_type">
                        <option hidden>-</option>
                        <option>Type-A</option>
                        <option>Type-B</option>
                        <option>Type-C</option>
                    </select>
                </div>
                <div class="inputBox" style="width: calc(50% - 2.5px);">
                    <label for="recived_from">Recived From</label> <!-- recived from -->
                    <select id="recived_from">
                        <option hidden>-</option>
                        <option>Type-A</option>
                        <option>Type-B</option>
                        <option>Type-C</option>
                    </select>
                </div>
                <div class="inputBox">
                    <label for="cone">Cone</label> <!-- cone -->
                    <select id="cone">
                        <option hidden>-</option>
                        <option>Cone-A</option>
                        <option>Cone-B</option>
                        <option>Cone-C</option>
                    </select>
                </div>
                <div class="inputBox">
                    <label for="count">Count</label> <!-- count -->
                    <select id="count">
                        <option hidden>-</option>
                        <option>10</option>
                        <option>20</option>
                        <option>30</option>
                    </select>
                </div>
                <div class="inputBox" style="width: calc(50% - 2.5px);">
                    <label for="mill">Mill</label> <!-- mill -->
                    <select id="mill">
                        <option hidden>-</option>
                        <option>Mill-A</option>
                        <option>Mill-B</option>
                        <option>Mill-C</option>
                    </select>
                </div>
                <div class="inputBox">
                    <label for="pc_id">Pc ID</label> <!-- pc id -->
                    <input type="text" id="pc_id" disabled>
                </div>
                <div class="inputBox">
                    <label for="poNo_Dt">PO No/Dt</label> <!-- poNo_Dt -->
                    <select id="poNo_Dt">
                        <option hidden>-</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                    </select>
                </div>
                <div class="inputBox" style="width: 110px;"> <!-- poNo_Dt date -->
                    <input style="display: block; box-sizing: border-box; width: 110px; height: 19px; float: left;" type="text" id="poNo_date" disabled>
                </div>
                <div class="inputBox" style="margin-left: 12.5px; width: calc(50% - 125px);">
                    <label for="agent" style="width: 100px;">Agent</label> <!-- agent -->
                    <input type="text" id="agent" disabled>
                </div>
                <div class="inputBox">
                    <label for="comm">Comm</label> <!-- comm -->
                    <input type="text" id="comm" disabled>
                </div>
                <div class="inputBox">
                    <label for="order_kg">Order Kg</label> <!-- order kg -->
                    <input type="text" id="order_kg" disabled>
                </div>
                <div class="inputBox">
                    <label for="delivery_kg">Delivery Kg</label> <!-- delivery kg -->
                    <input type="text" id="delivery_kg" disabled>
                </div>
                <div class="inputBox">
                    <label for="total_perc">Total %</label> <!-- total % -->
                    <input type="text" id="total_perc" disabled>
                </div>
                <div class="inputBox">
                    <label for="balance_kg">Balance Kg</label> <!-- balance kg -->
                    <input type="text" id="balance_kg" disabled>
                </div>
                <div class="inputBox">
                    <label for="bill_no">Bill No</label> <!-- bill no -->
                    <input type="text" id="bill_no">
                </div>
                <div class="inputBox">
                    <label for="bill_date">Date</label> <!-- bill date -->
                    <input type="text" id="bill_date">
                </div>
                <div class="inputBox">
                    <label for="bill_amount">Bill Amount</label> <!-- bill amount -->
                    <input type="text" id="bill_amount">
                </div>
                <div class="inputBox">
                    <label for="cent_type">Cert Type</label> <!-- cent_type -->
                    <select id="cent_type">
                        <option>Anti-Microbial</option>
                        <option>Cert-A</option>
                        <option>Cert-B</option>
                        <option>Cert-C</option>
                    </select>
                </div>
                <div class="inputBox">
                    <label for="gross_kg">Gross Kg</label> <!-- gross kg -->
                    <input type="text" id="gross_kg">
                </div>
                <div class="inputBox">
                    <label for="net_kg">Net Kg</label> <!-- net kg -->
                    <input type="text" id="net_kg">
                </div>
                <div class="inputBox">
                    <label for="pallet">Pallet</label> <!-- pallet -->
                    <input type="text" id="pallet">
                </div>
                <div class="inputBox">
                    <label for="bags">Bags</label> <!-- bags -->
                    <input type="text" id="bags">
                </div>
                <div class="inputBox" style="width: calc(50% - 2.5px);">
                    <label for="transport">Transport</label> <!-- transport -->
                    <input type="text" id="transport">
                </div>
                <div class="inputBox">
                    <label for="veh_no">Veh No</label> <!-- veh no -->
                    <input type="text" id="veh_no">
                </div>
                <div class="inputBox">
                    <label for="e_wayBill">E-Way Bill</label> <!-- e_wayBill -->
                    <input type="text" id="e_wayBill">
                </div>
                <div class="inputBox">
                    <label for="trans_refno">Ref No</label> <!-- trans refno -->
                    <input type="text" id="trans_refno">
                </div>
                <div class="inputBox">
                    <label for="gate_no">Gate No</label> <!-- gate_no -->
                    <input type="text" id="gate_no">
                </div>
                <div class="inputBox">
                    <label for="w_bridge_no">WBridge No</label> <!-- w_bridge_no -->
                    <input type="text" id="w_bridge_no">
                </div>
                <div class="inputBox">
                    <label for="w_weight">W.Weight</label> <!-- w_weight -->
                    <input type="text" id="w_weight">
                </div>
            </div>
            <div class="storage_data_container">
                <div class="top-line"></div>
                <div class="storage_entry">
                    <div class="entry_table">
                        <table>
                            <thead>
                                <th>S.No</th>
                                <th>Stock Godown</th>
                                <th>GID</th>
                                <th>Colour Tip</th>
                                <th>TID</th>
                                <th>Lot No</th>
                                <th>Our Id</th>
                                <th>Bags/P</th>
                                <th>Kgs</th>
                                <th>Rate</th>
                                <th>Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" id="sno"></td>
                                    <td>
                                        <select id="stock_godown">
                                            <option hidden>-</option>
                                            <option>Stock 1</option>
                                            <option>Stock 2</option>
                                            <option>Stock 3</option>
                                        </select>
                                    </td>
                                    <td><input type="text" id="gid"></td>
                                    <td>
                                        <select id="color_tip">
                                            <option hidden>-</option>
                                            <option>Color 1</option>
                                            <option>Color 2</option>
                                            <option>Color 3</option>
                                        </select>
                                    </td>
                                    <td><input type="text" id="tid"></td>
                                    <td>
                                        <select id="lot_no">
                                            <option hidden>-</option>
                                            <option>Lot 1</option>
                                            <option>Lot 2</option>
                                            <option>Lot 3</option>
                                        </select>
                                    </td>
                                    <td><input type="text" id="our_id"></td>
                                    <td><input type="text" id="bags_p"></td>
                                    <td><input type="text" id="kgs"></td>
                                    <td><input type="text" id="rate"></td>
                                    <td><input type="text" id="amount"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="add_entry_btn">
                        <button onclick="AddInwardTable()">Add</button>
                    </div>
                </div>
                <div class="entry_display" id="inward_entry_display"></div>
                <div class="bottom-line"></div>
            </div>
            <div class="tax_details">
                <div class="inputBox">
                    <label for="others">Others</label> <!-- others -->
                    <div class="doubleInputBox">
                        <input type="text" id="others" disabled>
                        <input type="text" id="others_2" >
                    </div>
                </div>
                <div class="inputBox">
                    <label for="packing">Packing</label> <!-- packing -->
                    <input type="text" id="packing">
                </div>
                <div class="inputBox">
                    <label for="freight">Freight</label> <!-- freight -->
                    <input type="text" id="freight">
                </div>
                <div class="inputBox">
                    <label for="total_kg">Total Kg</label> <!-- total_kg -->
                    <input type="text" id="total_kg" disabled>
                </div>
                <div class="inputBox">
                    <label for="t_bags_p">T Bags/P</label> <!-- t_bags_p -->
                    <input type="text" id="t_bags_p" disabled>
                </div>
                <div class="inputBox">
                    <label for="tax_amount">Amount</label> <!-- Tax anoumt -->
                    <input type="text" id="tax_amount" disabled>
                </div>
                <div class="inputBox">
                    <label for="tax_type">Tax Type</label> <!-- total_kg -->
                    <select id="tax_type">
                        <option hidden>-</option>
                        <option>Tax-A</option>
                        <option>Tax-B</option>
                        <option>Tax-C</option>
                    </select>
                </div>
                <div class="inputBox">
                    <label for="cgst">CGST</label> <!-- cgst -->
                    <div class="doubleInputBox">
                        <input type="text" id="cgst" disabled>
                        <input type="text" id="cgst_2" >
                    </div>
                </div>
                <div class="inputBox">
                    <label for="sgst">SGST</label> <!-- sgst -->
                    <div class="doubleInputBox">
                        <input type="text" id="sgst" disabled>
                        <input type="text" id="sgst_2" >
                    </div>
                </div>
                <div class="inputBox">
                    <label for="igst">IGST</label> <!-- igst -->
                    <div class="doubleInputBox">
                        <input type="text" id="igst" disabled>
                        <input type="text" id="igst_2" >
                    </div>
                </div>
                <div class="inputBox">
                    <label for="tax_Value">Tax Value</label> <!-- tax_Value -->
                    <input type="text" id="tax_Value" disabled>
                </div>
                <div class="inputBox right" style="margin-right: 5px;">
                    <label for="tcs_amt">TCS Amt</label> <!-- tcs_amt -->
                    <input type="text" id="tcs_amt" disabled>
                </div>
                <div class="inputBox right">
                    <label for="tcs_value">TCS Value</label> <!-- tcs_value -->
                    <input type="text" id="tcs_value" disabled>
                </div>
                <div class="inputBox right">
                    <label for="tsc_prec">TCS %</label> <!-- tsc_prec -->
                    <input type="text" id="tsc_prec" disabled>
                </div>
            </div>
            <div class="tax_details row-4">
                <div class="inputBox" style="width: calc(100% - 16.6% - 4px);">
                    <label for="remarks">Remarks</label> <!-- tsc_prec -->
                    <textarea id="remarks" style="width: calc(100% - 72px); height: 42.5px;"></textarea>
                </div>
                <div class="subrow">
                    <div class="inputBox">
                        <label for="total_tax" style="width: 60px;">Total Tax</label> <!-- tsc_prec -->
                        <input type="text" id="total_tax" disabled>
                    </div>
                    <div class="inputBox">
                        <label for="round_off">Round Off</label> <!-- tsc_prec -->
                        <input type="text" id="round_off" disabled>
                    </div>
                </div>
            </div>
            <div class="btns">
                <button>New</button>
                <button onclick="">Save</button>
                <button>Edit</button>
                <button>Delete</button>
                <button>View</button>
                <button onclick="logout()">Exit</button>
            </div>
        </div>
    </div>
    <script src="js/table.js"></script>
    <script src="js/list_adder.js"></script>
    <script src="js/printout.js"></script>
    <script src="js/inward_datahandler.js"></script>
</body>
</html>