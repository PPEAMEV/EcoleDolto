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


//    GESTION DE LA MODALE GENERALE DE TEXTE UNIQUEMENT (PAS DE TITRE OU AUTRE)
    $(".edit_text").on("click", function () {
        $("#modal_texte").modal("show");
        id = this.id;
        $.ajax({
            type: "GET",
            url: "donnees/xml/bdd.xml",
            dataType: "xml",
            cache: false,
            success: function (xml)
            {
                var text = $(xml).find('ligne[id="' + id + '"]').text();
                $("textarea#contenu").val(text);
                $('#id_hidden_text').val(id);
            }
        });
    });

    // GESTION DE LA MODALE DE DOCUMENT UNIQUEMENT (IMG OU PDF)
    $(".edit_doc").on("click", function () {
        $("#modal_doc").modal("show");
        $('#id_hidden_doc').val(this.id);
    });

    // GESTION DE LA MODALE D'AJOUT POUR LES CONSEILS
    $(".ajout_conseil").on("click", function () {
        $("textarea#contenu_date").val("");
        $("#link-pdf").css("display", "none");
        $('#modal-conseil').modal("show");
        $('#form-conseil').attr('action', 'index.php?uc=conseils&action=ajoutXml');
    });

    // GESTION DE LA MODALE DE MODIFICATION D'UN CONSEIL
    $(".edit_conseil").on("click", function () {
        $('#modal-conseil').modal("show");
        $('#form-conseil').attr('action', 'index.php?uc=conseils&action=modifXml');
        $("#link-pdf").css("display", "inline");
        id = this.id;
        $.ajax({
            type: "GET",
            url: "donnees/xml/bdd.xml",
            dataType: "xml",
            cache: false,
            success: function (xml)
            {
                var conseil = $(xml).find('conseil[id="' + id + '"]');
                var date = conseil.find('date').text();
                var fichier = conseil.find('fichier').text();
                $("textarea#contenu_date").val(date);
                $("#link-pdf").attr("href", "donnees/pdf/" + fichier);
                $('#id_hidden').val(id);
                $('#pdf-actuel').val(fichier);
            }
        });
    });

    // GESTION DE LA SUPPRESSION D'UN CONSEIL
    var theHREF;
    $(".confirmModalLink").click(function (e) {
        e.preventDefault();
        theHREF = $(this).attr("href");
        $("#confirmModal").modal("show");
    });
    $("#confirmModalNo").click(function (e) {
        $("#confirmModal").modal("hide");
    });
    $("#confirmModalYes").click(function (e) {
        window.location.href = theHREF;
    });

//    if ($(".container_accueil")[0]) {
//// GESTION DE LA FENETRE MODAL
//// Get the modal
////        var modalTexte = document.getElementById('modal_texte');
////        var modalImg = document.getElementById('modal_img');
////        // Get the <span> elements that closes the modals
////        var span = document.getElementsByClassName("close");
////        // When the user clicks the button, open the modal for EDIT TEXT
////        $(".edit").click(function () {
////            modalTexte.style.display = "block";
////            var request = new XMLHttpRequest();
////            request.open("GET", "donnees/xml/bdd.xml", false);
////            request.setRequestHeader("Cache-Control", "no-cache");
////            request.send();
////            var xml = request.responseXML;
////            var $xml = $(xml);
////            var text = $xml.find('ligne[id="' + this.id + '"]').text();
////            $("textarea#contenu").val(text);
////            $('#id_hidden').val(this.id);
////        });
//        // When the user clicks the button, open the modal TO CHANGE PICTURE
////        $(".img").click(function () {
////            modalImg.style.display = "block";
////            $('#id_hidden_img').val(this.id);
////        });
////        // Quand le premier span correspondant au texte est cliqué, on ferme la modale
////        span[0].onclick = function () {
////            modalTexte.style.display = "none";
////        };
////        // Quand le deuxième span correspondant à l'image est cliqué, on ferme la modale
////        span[1].onclick = function () {
////            modalImg.style.display = "none";
////        };
//        // When the user clicks anywhere outside of the modal, close it
////        window.onclick = function (event) {
////            if (event.target === modalTexte || event.target === modalImg) {
////                modalTexte.style.display = "none";
////                modalImg.style.display = 'none';
////            }
////        };
////        // A change sélection de fichier
////        $('#my_form_img').find('input[name="image"]').on('change', function (e) {
////            var files = $(this)[0].files;
////            if (files.length > 0) {
////// On part du principe qu'il n'y qu'un seul fichier
////// étant donné que l'on a pas renseigné l'attribut "multiple"
////                var file = files[0],
////                        $image_preview = $('#image_preview');
////                // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
////                $image_preview.find('.thumbnail').removeClass('hidden');
////                $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
////                $image_preview.find('h4').html(file.name);
////                $image_preview.find('.caption p:first').html(file.size + ' bytes');
////            }
////        });
////        // Bouton "Annuler"
////        $('#image_preview').find('button[type="button"]').on('click', function (e) {
////            e.preventDefault();
////            $('#my_form_img').find('input[name="image"]').val('');
////            $('#image_preview').find('.thumbnail').addClass('hidden');
////        });
//    } else if ($(".container_conseils")[0]) {
//// GESTION DE LA FENETRE MODAL D'AJOUT
//// Get the modal
////        var modalTexte = document.getElementById('modal-conseil');
////        // Get the <span> element that closes the modal
////        var span = document.getElementsByClassName("close")[0];
////        // When the user clicks the button, open the modal 
////        $(".ajout").click(function () {
////            modalTexte.style.display = "block";
////            $('#form-conseil').attr('action', 'index.php?uc=conseils&action=ajoutXml');
////        });
////        $(".edit").click(function () {
////            modalTexte.style.display = "block";
////            $('#form-conseil').attr('action', 'index.php?uc=conseils&action=modifXml');
////        });
////        // When the user clicks on <span> (x), close the modal
////        span.onclick = function () {
////            modalTexte.style.display = "none";
////            $("textarea#contenu_date").val("");
////            $("#link-pdf").css("display", "none");
////        };
////        // When the user clicks anywhere outside of the modal, close it
////        window.onclick = function (event) {
////            if (event.target === modalTexte) {
////                modalTexte.style.display = "none";
////            }
////        };
////        // GESTION DE LA SUPPRESSION D'UN CONSEIL
////        var theHREF;
////        $(".confirmModalLink").click(function (e) {
////            e.preventDefault();
////            theHREF = $(this).attr("href");
////            $("#confirmModal").modal("show");
////        });
////        $("#confirmModalNo").click(function (e) {
////            $("#confirmModal").modal("hide");
////        });
////        $("#confirmModalYes").click(function (e) {
////            window.location.href = theHREF;
////        });
////        // GESTION DE LA MODIFICATION D'UN CONSEIL
////        // When the user clicks the button, open the modal for EDIT TEXT
////        $(".edit").click(function () {
////            modalTexte.style.display = "block";
////            $("#link-pdf").css("display", "inline");
////            $('#form-conseil').attr('action', 'index.php?uc=conseils&action=modifXml');
////            var request = new XMLHttpRequest();
////            request.open("GET", "donnees/xml/bdd.xml", false);
////            request.setRequestHeader("Cache-Control", "no-cache");
////            request.send();
////            var xml = request.responseXML;
////            var $xml = $(xml);
////            var conseil = $xml.find('conseil[id="' + this.id + '"]');
////            var date = conseil.find('date').text();
////            var fichier = conseil.find('fichier').text();
////            $("textarea#contenu_date").val(date);
////            $("#link-pdf").attr("href", "donnees/pdf/" + fichier);
////            $('#id_hidden').val(this.id);
////            $('#pdf-actuel').val(fichier);
////        });
//    } else if ($(".container_edt")[0]) {
//        var modalTexte = document.getElementById('modal-conseil');
//        var span = document.getElementsByClassName("close")[0];
//        // When the user clicks the button, open the modal 
//        $("#edt_ajout").click(function () {
//            modalTexte.style.display = "block";
//            $('#form-conseil').attr('action', 'index.php?uc=horairs_EDT&action=updateXml');
//        });
//        // When the user clicks on <span> (x), close the modal
//        span.onclick = function () {
//            modalTexte.style.display = "none";
//            $("textarea#contenu_date").val("");
//            $("#link-pdf").css("display", "none");
//        };
//        // When the user clicks anywhere outside of the modal, close it
//        window.onclick = function (event) {
//            if (event.target === modalTexte) {
//                modalTexte.style.display = "none";
//            }
//        };
//        // GESTION DE LA SUPPRESSION D'UN CONSEIL
//        var theHREF;
//        $(".confirmModalLink").click(function (e) {
//            e.preventDefault();
//            theHREF = $(this).attr("href");
//            $("#confirmModal").modal("show");
//        });
//        $("#confirmModalNo").click(function (e) {
//            $("#confirmModal").modal("hide");
//        });
//        $("#confirmModalYes").click(function (e) {
//            window.location.href = theHREF;
//        });
//        //ahmad: pour gérer la côté admin de la page horaires et 
//        // EDT
//
//        $(".edit_pdf").click(function () {
//            modalTexte.style.display = "block";
//            $("#link-pdf").css("display", "inline");
//            $('#form-conseil').attr('action', 'index.php?uc=horairs_EDT&action=modif_EDT');
//            var request = new XMLHttpRequest();
//            request.open("GET", "donnees/xml/bdd.xml", false);
//            request.setRequestHeader("Cache-Control", "no-cache");
//            request.send();
//            var xml = request.responseXML;
//            var $xml = $(xml);
//            var LES_EDT = $xml.find('edt[id_edt="' + this.id - edt + '"]');
//            var titre = LES_EDT.find('titre').text();
//            var fichier = LES_EDT.find('fichier').text();
//            $("textarea#contenu_titre").val(titre);
//            $("#link-pdf").attr("href", "donnees/pdf/" + fichier);
//            $('#id_hidden').val(this.id - edt);
//            $('#pdf-actuel').val(fichier);
//        });
//    } else if ($(".container_petite_section")[0]) {
//
//    }


});

//Fonction js de vérification de modification du passe :
function verification() {
    $rep = false;
    if (document.getElementById('nouveau1').value === "") {
        $rep = false;
    }
    else if (document.getElementById("nouveau1").value !== document.getElementById("nouveau2").value)
    {
        alert('Veuillez retapez le même mot de passe');
        $rep = false;
    }
    else {
        $rep = true;
    }
    return $rep;
}
