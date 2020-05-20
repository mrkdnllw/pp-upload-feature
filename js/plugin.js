
console.log("code ran");

// document.getElementById("fileToUpload").onchange = function() {
//     document.getElementById("form_louwe_id").submit();
// };
$= jQuery;
$(document).ready(function(){
    $('#fileToUpload').change(function() {
        //$('#form_louwe_id').submit();
        $(".input_louwe").click();
      });


});
