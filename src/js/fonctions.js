jQuery(document).ready(function ($) {

    // RESPONSIVE POUR LE MENU
    var alterClass = function () {
        var ww = document.body.clientWidth;
        if (ww < 1200) {
            $('.navcontainer').removeClass('container');
            $('.navcontainer').addClass('container-fluid');
        } else if (ww >= 1200) {
            $('.navcontainer').addClass('container');
            $('.navcontainer').removeClass('container-fluid');
        }
        ;
    };
    $(window).resize(function () {
        alterClass();
    });
    //Fire it when the page first loads:
    alterClass();


    if ($(".container_accueil")[0]) {
        // GESTION DE LA FENETRE MODAL
        // Get the modal
    var modalTexte = document.getElementById('modal_texte');
    var modalImg = document.getElementById('modal_img');
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal for EDIT TEXT
    $(".edit").click(function () {
        modalTexte.style.display = "block";
        var request = new XMLHttpRequest();
        request.open("GET", "donnees/xml/bdd.xml", false);
        request.setRequestHeader("Cache-Control", "no-cache");
        request.send();
        var xml = request.responseXML;
        var $xml = $(xml);
        var text = $xml.find('ligne[id="' + this.id + '"]').text();
        $("textarea#contenu").val(text);
        $('#id_hidden').val(this.id);
    });

    // When the user clicks the button, open the modal TO CHANGE PICTURE
    $(".img").click(function () {
        modalImg.style.display = "block";
        $('#id_hidden_img').val(this.id);
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modalTexte.style.display = "none";
        modalImg.style.display = "none";
    };
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === modalTexte || event.target === modalImg) {
            modalTexte.style.display = "none";
            modalImg.style.display = 'none';
        }
    };
    
        // A change sélection de fichier
    $('#my_form_img').find('input[name="image"]').on('change', function (e) {
        var files = $(this)[0].files;

        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // étant donné que l'on a pas renseigné l'attribut "multiple"
            var file = files[0],
                    $image_preview = $('#image_preview');

            // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
            $image_preview.find('.thumbnail').removeClass('hidden');
            $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
            $image_preview.find('h4').html(file.name);
            $image_preview.find('.caption p:first').html(file.size + ' bytes');
        }
    });

    // Bouton "Annuler"
    $('#image_preview').find('button[type="button"]').on('click', function (e) {
        e.preventDefault();

        $('#my_form_img').find('input[name="image"]').val('');
        $('#image_preview').find('.thumbnail').addClass('hidden');
    });

    } else if ($(".container_conseils")[0]) {
        // GESTION DE LA FENETRE MODAL D'AJOUT
        // Get the modal
        var modalAjout = document.getElementById('modal_ajout');
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks the button, open the modal 
        $(".ajout").click(function () {
            modalAjout.style.display = "block";
        });
        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modalAjout.style.display = "none";
        };
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target === modalAjout) {
                modalAjout.style.display = "none";
            }
        };

        // GESTION DE LA SUPPRESSION D'UN CONSEIL
        var theHREF ;

        $("#dialog-confirm").dialog({
            resizable: false,
            height: 160,
            width: 500,
            autoOpen: false,
            modal: true,
            buttons: {
                "Oui": function () {
                    $(this).dialog("close");
                    window.location.href = theHREF;
                },
                "Annuler": function () {
                    $(this).dialog("close");
                }
            }
        });

        $("a.confirmModal").click(function (e) {
            e.preventDefault();
            theHREF = $(this).attr("href");
            $("#dialog-confirm").dialog("open");
        });

    }


});


