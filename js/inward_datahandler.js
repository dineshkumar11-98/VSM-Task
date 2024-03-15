var refnoElement = document.getElementById("refno");
var dateElement = document.getElementById("date");
var pnoDate = document.getElementById("poNo_date");

var currentdate = new Date();
dateElement.value = currentdate.getDate() + "/" + currentdate.getMonth() + "/" + currentdate.getFullYear();
pnoDate.value = currentdate.getDate() + "/" + currentdate.getMonth() + "/" + currentdate.getFullYear();

function save_inwardData(){
    const refno = document.getElementById("refno").value;
    const date = document.getElementById("date").value;
    const inward_date = document.getElementById("inward_date").value;
    const storage_name = document.getElementById("storage_name").value;
    const recd_type = document.getElementById("recd_type").value;
    const recived_from = document.getElementById("recived_from").value;
    const cone = document.getElementById("cone").value;
    const count = document.getElementById("count").value;
    const mill = document.getElementById("mill").value;
    const pc_id = document.getElementById("pc_id").value;
    const poNo_Dt = document.getElementById("poNo_Dt").value;
    const poNo_date = document.getElementById("poNo_date").value;
}

function logout() {
    console.log("logout")
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