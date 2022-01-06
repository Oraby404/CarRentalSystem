window.onload = function () {
    /*var km = document.getElementById("distance");
    for (var i = 10000; i <= 210000; i+=10000) {
      var option = document.createElement("OPTION");
      option.innerHTML = i;
      option.value = i;
      km.appendChild(option);
    }*/
    var years = document.getElementById("year");
    var currentYear = (new Date()).getFullYear();
    for (var i = 1990; i <= currentYear; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        years.appendChild(option);
    }
    /*var r=document.getElementById("rent")
    for (var i = 50; i <= 1000; i+=50) {
      var option = document.createElement("OPTION");
      option.innerHTML = i;
      option.value = i;
      r.appendChild(option);
    }*/
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


