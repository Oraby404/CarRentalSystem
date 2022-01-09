window.onload = function () {
    let years = document.getElementById("year");
    let currentYear = (new Date()).getFullYear();
    for (let i = 2000; i <= currentYear; i++) {
        let option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        years.appendChild(option);
    }
};

