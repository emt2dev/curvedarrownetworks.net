// prevent right-clicks
$(document).ready(function() {
    $("body").on("contextmenu", function(e) {
        return false;
    });
});

$(document).ready(function(){
setInterval(function(){ 
    // toggle the class every five second
    // $("#bulb__").toggleClass("bi-lightbulb");
    $("#bulb__").toggleClass("bi-lightbulb-fill");
    $('#bulb__').toggleClass('text-warning');  
    setTimeout(function(){
      // toggle back after 1 second
    
    //   $("#bulb__").toggleClass("bi-lightbulb-fill");
      $('#bulb__').toggleClass('text-warning');  
      $('#bulb__').toggleClass('text-warning');
    },3000)
 
 },3000);
});

$('.cbeNew').on('change', function(e) {
  const updatedValue = this.value;
  const rowId = this.id;

  window.location = "http://madebycan.com/assets/codes/controller.php?id=" + rowId + "&cbe=" + updatedValue; 
});

$('.cbeExists').on('change', function(e) {
  const updatedValue = this.value;
  const rowId = this.id;
  
  window.location = "http://madebycan.com/assets/codes/controller.php?id=" + rowId + "&cbe=" + updatedValue; 
});
