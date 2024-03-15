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
    <title>Project - Buyer Order Posting Amendment</title>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/inward.css">
    <link rel="stylesheet" href="css/left_navbar.css">
</head>
<body>
    <div class="container">
        <?php include "includes/left_navbar.php" ?>
        <div class="form-container" id="buyer_order_page">
            <div class="form-title">
                <h2>Buyer Order Posting Amendment</h2>
                <span style="opacity: 0;">Cut-off Date: 01/Mar/2024</span>
            </div>
            <div class="inward_data_Entry_container">
                <div class="inputBox">  <!-- amd no -->
                    <label for="amd_no">AMD No</label>
                    <input type="text" id="amd_no" disabled>
                </div>
                <div class="inputBox">
                    <label for="amd_date">AMD Date</label> <!--amd  date -->
                    <input type="text" id="amd_date" disabled>
                </div>
                <div class="inputBox">
                    <label for="last_amd_date">Last AMD Date</label> <!-- last amd date -->
                    <input type="text" id="last_amd_date" disabled>
                </div>
                <div class="inputBox column">
                    <label for="posting_ref_no">Posting Ref NO</label> <!-- posting_ref_no -->
                    <select id="posting_ref_no">
                        <option hidden>-</option>
                    </select>
                </div>
                <div class="inputBox">
                    <label for="po_dt">Po.Dt</label> <!-- po_dt -->
                    <input type="text" id="po_dt" disabled>
                </div>
                <div class="inputBox" style="width: calc(75% - 2.5px);">
                    <label for="buyer_name">Buyer Name</label> <!-- buyer_name -->
                    <input type="text" id="buyer_name" disabled>
                </div>
                <div class="inputBox">
                    <label for="group_sortno">Group Sortno</label> <!-- group_sortno -->
                    <input type="text" id="group_sortno" disabled>
                </div>
                <div class="inputBox" style="width: calc(75% - 2.5px);">
                    <label for="qty_printName">Qlty / Print Name</label> <!-- qty_printName -->
                    <div class="doubleInputBox">
                        <input type="text" id="qty_printName" disabled>
                        <input type="text" id="qty_printName_2" disabled>
                    </div>
                </div>
                <div class="inputBox">
                    <label for="order_mtr">Order MTR</label> <!-- group_sortno -->
                    <input type="text" id="order_mtr" disabled>
                </div>
                <div class="inputBox">
                    <label for="tolerance_prec">Tolerance %</label> <!-- tolerance_prec -->
                    <input type="text" id="tolerance_prec" disabled>
                </div>
                <div class="inputBox">
                    <label for="amd_mtr">AMD Mtr</label> <!-- amd_mtr -->
                    <input type="text" id="amd_mtr" disabled>
                </div>
                <div class="inputBox">
                    <label for="total">total</label> <!-- total -->
                    <input type="text" id="total" disabled>
                </div>
                <div class="inputBox">
                    <label for="delivery_starting">Delivery Starting</label> <!-- delivery_starting -->
                    <input type="text" id="delivery_starting" disabled>
                </div>
                <div class="inputBox">
                    <label for="party_comp_date">Party Comp Date</label> <!-- party_comp_date -->
                    <input type="text" id="party_comp_date" disabled>
                </div>
                <div class="inputBox">
                    <label for="comp_date">Comp Date</label> <!-- comp_date -->
                    <input type="text" id="comp_date" disabled>
                </div>
                <div class="inputBox">
                    <label for="party_rate">Party Rate</label> <!-- party_rate -->
                    <input type="text" id="party_rate" disabled>
                </div>
                <div class="inputBox">
                    <label for="last_desp_date">Last Desp Date</label> <!-- last_desp_date -->
                    <input type="text" id="last_desp_date" disabled>
                </div>
                <div class="inputBox">
                    <label for="tot_desp_mtrs">Tot Desp MTRs</label> <!-- tot_desp_mtrs -->
                    <input type="text" id="tot_desp_mtrs" disabled>
                </div>
            </div>
            <div class="storage_data_container">
                <div class="top-line">Order Details</div>
                <div class="order_details_table">
                    <div class="storage_entry">
                        <div class="entry_table">
                            <table>
                                <thead>
                                    <th>S.No</th>
                                    <th>Order Date</th>
                                    <th>Completion Date</th>
                                    <th>Order Mtr</th>
                                    <th>Order Mode</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="date" id="order_date">
                                        </td>
                                        <td><input type="date" id="completion_date"></td>
                                        <td><input type="text" id="table_order_mtr"></td>
                                        <td>
                                            <select id="order_mode">
                                                <option>Add</option>
                                                <option>Mode 1</option>
                                                <option>Mode 2</option>
                                                <option>Mode 3</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="add_entry_btn">
                            <button onclick="AddBuyerTable()">Add</button>
                        </div>
                    </div>
                    <div class="entry_display" id="entry_display">
                    </div>
                    <div class="total_display">
                        <div class="inputBox">
                            <label for="table_total_c">Total</label> <!-- tot_desp_mtrs -->
                            <input type="text" id="table_total_c">
                        </div>
                    </div>
                </div>
                <div class="save_print">
                    <input type="checkbox" id="save_print">
                    <label for="save_print">Save/Print</label>
                </div>
                <div class="bottom-line"></div>
            </div>
            <div class="btns">
                <button onclick="refresh()">New</button>
                <button onclick="save_orderData()">Save</button>
                <button onclick="pdfGenerator(`buyer_order_page`)">Print</button>
                <button onclick="logout()">Exit</button>
            </div>
        </div>
    </div>
    <script src="js/table.js"></script>
    <script src="js/list_adder.js"></script>
    <script src="js/buyer_order_datahandler.js"></script>
</body>
</html>