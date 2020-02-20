// alert("test custom js");

function getBonus(){
    var bon = document.getElementById("bonus").value;
    var allw = document.getElementById("allowance").value;
    var totalBon = parseFloat(bon) + parseFloat(allw);
    return parseFloat(totalBon);
}

function calc(){
    document.getElementById("total_benefit").value=getBonus();
}

function getDeductions(){
    var nhif = document.getElementById("nhif").value;
    var nssf = document.getElementById("nssf").value;
    var t_gross = document.getElementById("gross").value;
    var res_tax = (t_gross*20)/100;
    document.getElementById('kra').value=res_tax;
    var kra=res_tax; 
    var totalDed = parseFloat(nhif) + parseFloat(nssf) + parseFloat(kra);
    return parseFloat(totalDed);
}

function calcDed(){
    document.getElementById("total_deduction").value=getDeductions();
}

function getNet(){    
    var gross = document.getElementById("gross").value;
    var totalGross = parseFloat(gross) + parseFloat(getBonus());
    var netCash = parseFloat(totalGross) - parseFloat(getDeductions());
    return parseFloat(netCash);
}

function calcNet(){
    document.getElementById("net").value=getNet();
}

// document.getElementById("net").value=getNet();





