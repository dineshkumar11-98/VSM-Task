var addBuyerSno = 0;
var addBuyerArray = [];

function AddBuyerTable() {
    const orderDate = document.getElementById("order_date").value;
    const completionDate = document.getElementById("completion_date").value;
    const orderMtr = document.getElementById("table_order_mtr").value;
    const orderMode = document.getElementById("order_mode").value;

    if(orderDate != "" && completionDate != "" && orderMtr != "" && orderMode != "") {
        const sno = addBuyerSno += 1;
        const temp_var = [sno, orderDate, completionDate, orderMtr, orderMode];
        addBuyerArray.push(temp_var);
        document.getElementById("entry_display").innerHTML = "";
        CreateTable("entry_display", null, addBuyerArray, [false, false, false, false, false]);
    }
}

function AddBuyerTableOnOpen(array) {
    if(array != null) {
        addBuyerSno = array.length;
        addBuyerArray = array;
        document.getElementById("entry_display").innerHTML = "";
        CreateTable("entry_display", null, addBuyerArray, [false, false, false, false, false]);
    }
}

function getBuyerOrderData() {
    return addBuyerArray;
}

var addInwardArray = [];

function AddInwardTable() {
    const sno = document.getElementById("sno").value;
    const stockGodown = document.getElementById("stock_godown").value;
    const gid = document.getElementById("gid").value;
    const colorTip = document.getElementById("color_tip").value;
    const tid = document.getElementById("tid").value;
    const lotNo = document.getElementById("lot_no").value;
    const ourId = document.getElementById("our_id").value;
    const bagsP = document.getElementById("bags_p").value;
    const kgs = document.getElementById("kgs").value;
    const rate = document.getElementById("rate").value;
    const amount = document.getElementById("amount").value;

    if(sno != "" && stockGodown != "" && gid != "" && colorTip != ""
       && tid != "" && lotNo != "" && ourId != "" && bagsP != ""
       && kgs != "" && rate != "" && amount != "") {

        const temp_var = [sno, stockGodown, gid, colorTip, tid, lotNo, ourId, bagsP, kgs, rate, amount];
        addInwardArray.push(temp_var);
        document.getElementById("inward_entry_display").innerHTML = "";
        CreateTable("inward_entry_display", null, addInwardArray, [false, false, false, false, false, false, false, false, false, false, false]);
    }
}

function getInwardrData() {
    return addInwardArray;
}