$(document).ready(function(){

    $('#submit').on('click', function(e){
        e.preventDefault();
        let x = document.forms["dataForm"]["h_phone"].value;
        let i = document.forms["dataForm"]["c_phone"].value;
        if (x == "" && i == "") {
        alert("One phone number must be filled out");
        }
  })
})