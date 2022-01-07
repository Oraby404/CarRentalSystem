function validateaddcar() {

	let flag =0;
	var format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
	var format1=/\d/;
	
    let plate = document.forms["add_car"]["Plate"].value;
   	let manufacture = document.forms["add_car"]["manufacture"].value;
    let model = document.forms["add_car"]["model"].value;
    let off = document.forms["add_car"]["off"].value;
    
    if ( format.test(plate)  ) {
          alert("Insert valide plate id");
          return false;
    }
    if ( format.test(manufacture) || (/\d/.test(manufacture))) {
        alert("Enter Valide manufacture");
         return false;
    }
    if ( format.test(model) || (/\d/.test(model))) {
        alert("Enter Valide Model");
         return false;
    }
    if ( format.test(off)  || (/\d/.test(off))) {
        alert("Enter Valid office name");
       	 return false;
       }
 
}
