window.onload = function () {
    
    var years = document.getElementById("year");
    var currentYear = (new Date()).getFullYear();
    for (var i = 2000; i <= currentYear; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        years.appendChild(option);
    }
};


function insert_office() {

    let flag = 0;
    let office = document.forms["car_search"]["office"].value;
    if (office == "") {
        alert("you have to select an office");
        flag = 1;
        ;
    }
    if (car_manufacturer == "") {
        alert("you have to select a Manufacturer");
        flag = 1;
        ;
    }
    if (model == "") {
        alert("you have to select a Model");
        flag = 1;
        ;
    }
    if (flag == 1) {
        return false;
    } else return true;
}


