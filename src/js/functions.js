jQuery(document).ready(function($) {
    
    // responsive pour le menu
    var alterClass = function() {
      var ww = document.body.clientWidth;
      if (ww < 1200) {
        $('.navcontainer').removeClass('container');
        $('.navcontainer').addClass('container-fluid');
      } else if (ww >= 1200) {
        $('.navcontainer').addClass('container');
        $('.navcontainer').removeClass('container-fluid');
      };
    };
    $(window).resize(function(){
      alterClass();
    });
    //Fire it when the page first loads:
    alterClass();
  
  
    // gestion de l'édition des textes
    // Get the modal
    var modal = document.getElementById('myModal');
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks the button, open the modal 
    $(".edit").click(function() {
        modal.style.display = "block";
    });
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
  
});


