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


});

//Fonction js de vérification de modification du mot de passe :
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
