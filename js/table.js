// Copy to clipboard implementation
function copyToClipboard(text, attr) {
    const el = document.createElement('textarea');
    el.value = text;
    document.body.appendChild(el);
    el.select();
    if(document.execCommand('copy')) {
        attr.setAttribute("data-tooltip", "Copied!!");
        const timeOut = setTimeout(() => {
            attr.setAttribute("data-tooltip", "Click to copy");
            clearTimeout(timeOut);
        }, 1000)
    }
    document.body.removeChild(el);
}

if (document.getElementsByClassName("onClickCopy").length !== 0){
    var onClickCopyDiv = document.getElementsByClassName("onClickCopy");
    for(var i = 0; i < onClickCopyDiv.length; i++)
    {
        onClickCopyDiv[i].classList.add("tooltip");
        onClickCopyDiv[i].classList.add("top");
        
        onClickCopyDiv[i].setAttribute("data-tooltip", "Click to copy");

        onClickCopyDiv[i].addEventListener('click', function(e){
            copyToClipboard(e.target.innerText, e.target);
        })
    }
}

// Table implementation
function placeCursorAtEnd(el) {
    el.focus();
    if (typeof window.getSelection != "undefined"
            && typeof document.createRange != "undefined") {
        var range = document.createRange();
        range.selectNodeContents(el);
        range.collapse(false);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
    } else if (typeof document.body.createTextRange != "undefined") {
        var textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.collapse(false);
        textRange.select();
    }
}

function increment() {
    nested_Count += 1;
}

function reset() {
    nested_Count = 0;
}

var OnDbClickTable = function(e) {
    var temp_el = this;
    while(true){
        temp_el = temp_el.parentElement;
        if(temp_el.className === "table") {
            break;
        } else if(temp_el === null || temp_el === "undefined") {
            break;
        }
    }
    const elHeader = temp_el.querySelector("thead th[data-colno=\"" + this.getAttribute("data-oncol") + "\"]");
    if(this.querySelector(".nested-table")) {
        increment();
    }
    if(elHeader.getAttribute("data-editable") === "true" && this.querySelector('.nested-table') === null) {
        var total_nestedCount = 0;
        setTimeout(()=>{
            total_nestedCount = nested_Count;
            reset();
        }, 100);
        this.setAttribute("data-editable", "false");
        const colName = "#" + temp_el.getAttribute("id") || "." + temp_el.getAttribute("class");
        const oldValue = this.innerHTML;
        
        // create input field
        this.style.padding = "0px";
        this.innerHTML = "<span class=\"temp_inputField\" contenteditable=\"true\" ></span";

        // put cursor at the end
        const temp_inputField = this.querySelector("span");
        temp_inputField.innerHTML = oldValue;
        placeCursorAtEnd(temp_inputField);
       
        // on ENTER key press remove the input field
        temp_inputField.addEventListener("keydown", (e)=>{
            if(e.keyCode === 13 && !e.shiftKey) {
                e.preventDefault(); // prevent default behaviour of ENTER btn
                this.removeAttribute("style");
                const temp_inputField = this.querySelector("span");
                const newValue = temp_inputField.innerHTML;
                this.innerHTML = newValue;
                this.setAttribute("data-editable", "true");
                // calculate the array index of edited td element
                var row = this.parentElement;
                var col = this;
                var array = "";
                array = `[${row.getAttribute("data-rowno")}][${col.getAttribute("data-colno") || col.getAttribute("data-oncol")}]`;
                for(i=0;i<total_nestedCount;i++){
                    row = row.parentElement.parentElement.parentElement.parentElement;
                    col = col.parentElement.parentElement.parentElement.parentElement;
                    array = `[${row.getAttribute("data-rowno")}][${col.getAttribute("data-colno") || col.getAttribute("data-oncol")}]${array}`;
                }
                try {
                    // return the array index of edited td and oldvalue, newvalue, tableId, editedElement
                    OnTableValueChange(oldValue, newValue, array, colName, this);
                } catch {
                    // 
                }
            }
        })
    }
}
        
var nested_Count = 0;

// create the table inside the table based on given array
function NestedTableEntry(data, oncol) {
    var tr = "";
    tr += `<td data-oncol="${oncol}"> <table class="nested-table"><tbody>`;

    for(var i = 0; i < data.length; i++){
        tr += `<tr data-rowno="${i}">`;
        for(var j=0;j<data[i].length;j++){
            if(typeof data[i][j] != "object") {
                tr += `<td data-oncol="${oncol}" data-colno="${j}" >${data[i][j]} </td>`;
            } else {
                tr += NestedTableEntry(data[i][j], oncol)
            }
        }
        tr += "</tr>";
    }

    tr +=`</tbody></table>`;
    return tr
}

// create table data based on given array
// Syntax:
// CreateTable(string className|id, array tableHeader(can be null), array tableData, array editableColumn(array of boolen))
var tableCount = 0;
function CreateTable(tableId, tableHeader, tableData, editableColums) {
    var table = document.getElementById(tableId) || document.querySelector("."+tableId);
    if(table.nodeName != "TABLE") {
        tableCount += 1;
        table.innerHTML += `<table class="table" data-editing="false" id="table-${tableCount}"></table>`;
        table = table.lastChild;
    }
    if(tableHeader != null && typeof tableHeader === "object") {
        var headerTag = table.querySelector("thead");
        var th = "";
        if(headerTag === null) {
            table.innerHTML += `<thead></thead>`;
            headerTag = table.querySelector("thead");
        }
        for(var i = 0; i < tableHeader.length; i++) {
            th += `<th data-colno="${i}" data-editable="${editableColums[i]}">${tableHeader[i]}</th>`;
        }
        headerTag.innerHTML = th;
    } else {
        console.log("Warning: Table Header is null or not Array!!");
    }
    if(table.querySelector("tbody") === null) {
        table.innerHTML += "<tbody></tbody>";
    }
    table = table.querySelector("tbody");
    table.innerHTML = "";
    var tr = "";
    if(tableData === null || typeof tableData != "object") {
        console.log("Error: 3rd parameter must be Type Array");
        return;
    }
    for(var i = 0; i < tableData.length; i++){
        tr += `<tr data-rowno="${i}">`;
        const len = tableData[i].length;
        if(typeof tableData[i] === "object") {
            for(var j = 0; j < len; j++){
                if(typeof tableData[i][j] != "object"){
                    tr += `<td data-oncol="${j}">${tableData[i][j]}</td>`;
                } else {
                    tr += NestedTableEntry(tableData[i][j], j);
                }
            }
        }
        tr += "</tr>";
    }
    table.innerHTML = tr;
    
    table.querySelectorAll("td").forEach(data => data.addEventListener("dblclick", OnDbClickTable, false));

    // set padding 0px for all nested-table parent element
    document.querySelectorAll(".nested-table").forEach(data => {
        data.parentElement.style.padding = '0px';
    });
}