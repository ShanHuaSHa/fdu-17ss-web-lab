function change() {
    let s = document.getElementById("head");
    switch (s.value){
        case "1":{
            break;
        }
        case "2":{
            document.getElementById("begin").style.display="";
            break;
        }
        case "3":{
            document.getElementById("begin").style.display="none";
            let tabName = document.getElementById("tableName");
            let con = document.getElementById("attr");
            con.innerHTML = "";

            for (let j = 0; j < tabName.options.length; j++) {
                if (j == tabName.value) {
                    for (let i = 1; i <= tableCol[j]; i++) {
                        let a = document.createElement("input");
                        a.className = "attrRow";
                        a.type = "text";
                        a.placeholder = "Attr" + i;
                        con.appendChild(a);
                    }
                }
            }
            break;
        }
        case "4": {
            let con = document.getElementById("attr");
            let tabName = document.getElementById("tableName");
            con.innerHTML = "";

            for (let j = 0; j < tabName.options.length; j++) {
                if (j == tabName.value) {
                    for (let i = 1; i <= tableCol[j]; i++) {
                        let a = document.createElement("input");
                        a.className = "attrRow";
                        a.type = "text";
                        a.placeholder = "Attr" + i;
                        con.appendChild(a);
                    }
                }
            }

            break;

        }
        case "5":{
            let con = document.getElementById("attr");
            con.innerHTML="WARNING: You cannot undo this action!";
            break;
        }
    }
}

function show() {
    let name = document.getElementById("tabName");
    let num = document.getElementById("colNum");
    let con = document.getElementById("attr");

    if (num.value > 0 && name.value !== ""){
        con.innerHTML = "";
        for (let i = 1;i <= num.value;i++) {
            let a = document.createElement("input");
            a.className = "attrRow";
            a.type = "text";
            a.placeholder = "Attr" + i;
            con.appendChild(a);
        }
        document.getElementById("but").style.display="";
    }else {
        document.getElementById("but").style.display="none";
        con.innerHTML = "";
    }
}

let m = 0;
let tableArr = new Array(100);
let tableRow = new Array(100);
let tableCol = new Array(100);

function commit() {
    let s = document.getElementById("head");
    switch (s.value){
        case "2":{
            create();
            break;
        }
        case "3":{
            addRow();
            break;
        }
        case "4":{
            deleteRow();
            break;
        }
        case "5":{
            deleteTable();
        }
    }
}

function create() {
    let tabName = document.getElementById("tableName");
    tabName.style.display = "";

    let a = document.createElement("option");
    a.value = m + "";
    a.selected = true;
    a.className = "options";
    a.text =document.getElementById("tabName").value+"";
    tabName.options.add(a);

    let num = document.getElementById("colNum");

    let newTab = "";
    newTab += "<table><tr>";
    for (let j = 0;j<num.value;j++){
        newTab += "<th>" + document.getElementsByClassName("attrRow")[j].value + "</th>";
    }
    newTab += "</tr></table>";

    tableArr[m] = newTab+"";
    tableRow[m] = 0;
    tableCol[m] = num.value;

    let aa = document.getElementById("tt");
    aa.innerHTML = tableArr[m]+"";
    aa.style.display ="";

    m++;
}

function changeTable() {
    let tabName = document.getElementById("tableName");
    let aa = document.getElementById("tt");
    let con = document.getElementById("attr");
    con.innerHTML="";
    aa.style.display ="";

    if (tabName.value == -1){
        aa.innerHTML = "";
    }
    for (let j =0;j<tabName.options.length;j++){
        if (j == tabName.value){
            aa.innerHTML = tableArr[j]+"";
            for (let q = 1;q <= tableCol[j];q++) {
                let a = document.createElement("input");
                a.className = "attrRow";
                a.type = "text";
                a.placeholder = "Attr" + q;
                con.appendChild(a);
            }


        }
    }


}


function addRow() {
    let tabName = document.getElementById("tableName");
    let aa = document.getElementById("tt");
    let con = document.getElementById("attr");


    for (let j =0;j<tabName.options.length;j++){
        if (j == tabName.value){
            // alert(j);
            if (!(tableRow[j]%2===0)){
                tableArr[j] += "<tr>";
                for (let q = 0;q < tableCol[j];q++){
                    tableArr[j] += "<td style='background-color:lightgrey'>" + document.getElementsByClassName("attrRow")[q].value +"</td>";
                }
                tableArr[j] += "</tr>";
            }else {

                tableArr[j] += "<tr>";
                for (let q = 0;q < tableCol[j];q++){
                    tableArr[j] += "<td>" + document.getElementsByClassName("attrRow")[q].value +"</td>";
                }
                alert("ee");
                tableArr[j] += "</tr>";
            }
            tableRow[j]++;
            aa.innerHTML = tableArr[j]+"";

            con.innerHTML="";
            for (let q = 1;q <= tableCol[j];q++) {
                let a = document.createElement("input");
                a.className = "attrRow";
                a.type = "text";
                a.placeholder = "Attr" + q;
                con.appendChild(a);
            }
        }
    }
}

function deleteRow() {
    let tabName = document.getElementById("tableName");
    let aa = document.getElementById("tt");
    for (let j =0;j<tabName.options.length;j++){
        if (j==tabName.value){
            if (tableRow[j]>0){
                aa.deleteRow(tableRow[j]);
                tableRow[j]--;
            }
        }
    }

}

function deleteTable() {
    let tabName = document.getElementById("tableName");
    let aa = document.getElementById("tt");
    for (let j =0;j<tabName.options.length;j++){
        if (j == tabName.value){
            for (let a=0;a<tableRow[j];a++){
                tableArr[j].deleteRow(a);
            }

            if (tabName.options.length != 1){
                tabName.options.remove(tabName.selectedIndex);
                aa.innerHTML = "";
            }
        }
    }

}