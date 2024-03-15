var buyerData = null;

function fetchBuyerData() {
    fetch("./buyer_order.php", {
        method: 'POST',
        headers: {
            'Content-Type' : 'application/json; charset=utf-8'
        },
        body: null
    }).then(
        res => res.json()
    ).then(
        resJson => {
            if(resJson != null){
                buyerData = resJson;
            }
        }
    )
}

fetchBuyerData();

setTimeout(()=>{
    if(buyerData != null) {
        posting_ref_no()
    }
}, 100);

const posting = document.getElementById("posting_ref_no");

function posting_ref_no(){
    posting.innerHTML = "";
    var temp_var = "<option hidden>-</option>";
    for(i = 0; i < buyerData.length; i++) {
        temp_var += `<option>${buyerData[i]["posting_ref_no"]}</option>`;
    }
    posting.innerHTML = temp_var;
}

posting.addEventListener("change", ()=>{
    for(i = 0; i < buyerData.length; i++) {
        if(buyerData[i]["posting_ref_no"].toString() === posting.value) {
            document.getElementById("amd_no").value = buyerData[i]["amd_no"];
            document.getElementById("amd_date").value = buyerData[i]["amd_date"];
            document.getElementById("last_amd_date").value = buyerData[i]["last_amd_date"];
            document.getElementById("po_dt").value = buyerData[i]["po_dt"];
            document.getElementById("buyer_name").value = buyerData[i]["buyer_name"];
            document.getElementById("group_sortno").value = buyerData[i]["group_sortno"];
            document.getElementById("qty_printName").value = buyerData[i]["qty_printName"];
            document.getElementById("qty_printName_2").value = buyerData[i]["qty_printName2"];
            document.getElementById("order_mtr").value = buyerData[i]["order_mtr"];
            document.getElementById("tolerance_prec").value = buyerData[i]["tolerance_prec"];
            document.getElementById("total").value = buyerData[i]["total"];
            document.getElementById("delivery_starting").value = buyerData[i]["delivery_starting"];
            document.getElementById("party_comp_date").value = buyerData[i]["party_comp_date"];
            document.getElementById("comp_date").value = buyerData[i]["comp_date"];
            document.getElementById("party_rate").value = buyerData[i]["party_rate"];
            document.getElementById("last_desp_date").value = buyerData[i]["last_desp_date"];
            document.getElementById("tot_desp_mtrs").value = buyerData[i]["tot_desp_mtrs"];
            document.getElementById("amd_mtr").value = buyerData[i]["amd_mtr"];
            if(buyerData[i]["orderList"] != undefined) {
                AddBuyerTableOnOpen(JSON.parse(buyerData[i]["orderList"]));
                document.getElementById("table_total_c").value = buyerData[i]["total_order"];
            }
        }
    }
})

function save_orderData() {
    const orderList = JSON.stringify(getBuyerOrderData());
    const posting_ref_no = document.getElementById("posting_ref_no").value;
    const table_total_c = document.getElementById("table_total_c").value;
    console.log((posting_ref_no != "" && posting_ref_no != "-") , orderList != "" , table_total_c != "");

    if((posting_ref_no != "" && posting_ref_no != "-") && orderList != "" && table_total_c != "") {
        console.log("test");
        fetch("./save_buyerOrder.php", {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/json; charset=utf-8'
            },
            body: JSON.stringify({"posting_ref_no":posting_ref_no, "orderList":orderList, "total_order":table_total_c})
        }).then(
            res => res.json()
        ).then(
            resJson => {
                if(resJson["saved"] === "1"){
                    location.reload();
                }
            }
        )
    }
}

function logout() {
    fetch("./logout.php", {
        method: 'POST',
        headers: {
            'Content-Type' : 'application/json; charset=utf-8'
        },
        body: null
    }).then(
        res => res.json()
    ).then(
        resJson => {
            if(resJson["logout"] === "1"){
                window.location = "./index.html";
            }
        }
    )
}

function refresh(){
    location.reload();
}

function getBuyerOrderPrintable() {
    for(i = 0; i < buyerData.length; i++) {
        if(buyerData[i]["posting_ref_no"].toString() === posting.value){
            return buyerData[i];
        }
    }
    return "";
}

var new_window;

function pdfGenerator(elementId) {
    const report = document.getElementById(elementId) || document.querySelector(elementId);

    const html_code = `
        <link rel="stylesheet" href="css/table.css">
        <link rel="stylesheet" href="css/printout.css">
        <div class="container"><div class="form-container">${report.innerHTML}</div></div>
    `;

    new_window = window.open();
    new_window.document.write(html_code);

    const orderList_table = new_window.document.querySelector(".table");
    const main_table = new_window.document.querySelector(".entry_table table tbody");

    main_table.innerHTML = orderList_table.innerHTML;
    orderList_table.parentElement.style.display = "none";
    main_table.innerHTML += `
        <tr>
            <td style="color:transparent">empty</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td class="table_total_print">Total</td>
            <td id="table_total_order">-</td>
            <td></td>
        </tr>
    `;
    new_window.document.querySelector(".total_display").style.display = "none";
    new_window.document.querySelector(".save_print").style.display = "none";
    new_window.document.querySelector(".btns").style.display = "none";

    console.log(main_table.innerHTML);

    setTimeout(()=>{
        assignValues();
        new_window.print();
        new_window.close();
    }, 200)
}

function assignValues(){
    const buyerData = getBuyerOrderPrintable();
    if(buyerData != "") {
        new_window.document.getElementById("posting_ref_no").value = buyerData["posting_ref_no"];
        new_window.document.getElementById("amd_no").value = buyerData["amd_no"];
        new_window.document.getElementById("amd_date").value = buyerData["amd_date"];
        new_window.document.getElementById("last_amd_date").value = buyerData["last_amd_date"];
        new_window.document.getElementById("po_dt").value = buyerData["po_dt"];
        new_window.document.getElementById("buyer_name").value = buyerData["buyer_name"];
        new_window.document.getElementById("group_sortno").value = buyerData["group_sortno"];
        new_window.document.getElementById("qty_printName").value = buyerData["qty_printName"];
        new_window.document.getElementById("qty_printName_2").value = buyerData["qty_printName2"];
        new_window.document.getElementById("order_mtr").value = buyerData["order_mtr"];
        new_window.document.getElementById("tolerance_prec").value = buyerData["tolerance_prec"];
        new_window.document.getElementById("total").value = buyerData["total"];
        new_window.document.getElementById("delivery_starting").value = buyerData["delivery_starting"];
        new_window.document.getElementById("party_comp_date").value = buyerData["party_comp_date"];
        new_window.document.getElementById("comp_date").value = buyerData["comp_date"];
        new_window.document.getElementById("party_rate").value = buyerData["party_rate"];
        new_window.document.getElementById("last_desp_date").value = buyerData["last_desp_date"];
        new_window.document.getElementById("tot_desp_mtrs").value = buyerData["tot_desp_mtrs"];
        new_window.document.getElementById("amd_mtr").value = buyerData["amd_mtr"];
        console.log(buyerData["orderList"] != undefined);
        if(buyerData["orderList"] != undefined) {
            new_window.document.getElementById("table_total_order").innerHTML = buyerData["total_order"];
        }
    }
}