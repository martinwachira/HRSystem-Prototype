// alert("test custom js");

function getBonus(){
    var bon = document.getElementById("bonus").value;
    var allw = document.getElementById("allowance").value;
    var totalBon = parseFloat(bon) + parseFloat(allw);
    return parseInt(totalBon);
}

function calc(){
    document.getElementById("total_benefit").value=getBonus();
}

function getDeductions(){
    var nhif = document.getElementById("nhif").value;
    var nssf = document.getElementById("nssf").value;
    var kra = document.getElementById("kra").value;
    var totalDed = parseFloat(nhif) + parseFloat(nssf) + parseFloat(kra);
    return parseInt(totalDed);
}

function calcDed(){
    document.getElementById("total_deduction").value=getDeductions();
}

function getNet(){    
    var gross = document.getElementById("gross").value;
    var totalGross = parseFloat(gross) + parseFloat(getBonus());
    var netCash = parseFloat(totalGross) - parseFloat(getDeductions());
    return parseInt(netCash);
}

function calcNet(){
    document.getElementById("net").value=getNet();
}




