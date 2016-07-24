$(function(){
    $('.btn-remove-prod').on('click', function (event) {
        var idProd = $(this).data('id');
        var url = $(this).attr("href");
        if(confirm("Confirmer la suppression!")){
            //alert("delete ok " + idProd + " " + url);
            return true;
        }

        return false;

    });



        var valeur;
        //image loader
        var imgLoader = $("<img id='img-loader' src='img/bigLoader.gif' alt='image animée'>")


        //récupération du choix fournisseur ou client
        if($("input:radio").is("checked")){

            valeur = +$(this).val();
        }
        $("#autocomplete-nom").keyup(function(){

            //récupération des caractéres saisies
            var type;
            nom = $(this).val();
            type = +$('input:radio:checked').val();
            //récupération du div de la liste d'autocompletion
            liste = $("#select_client");
            //envoie de la raquete par ajax
            if(nom.length > 1){//traitement à partir de deux caractéres

                $.ajax({

                    type: "get", //methode utilisée
                    url:  "Controller/requete-via-ajax.php", //lien de la page
                    data: "q="+nom+"&type="+type, //données à envoyer
                    beforeSend: function(){
                        liste.children().remove(); //on vide la liste d'abord
                        liste.append(imgLoader);
                    },
                    success: function(data){

                        liste.removeClass("cacher");
                        liste.find("#img-loader").remove();
                        //console.log(data);
                        var tab = JSON.parse(data);
                        //console.log(tab);

                        for(var i = 0; i < tab.length; i++){
                            var client = tab[i];
                            $("<p></p>",
                                {
                                    text: client.nom +" - "+ client.prenom,
                                    id: client.id,
                                    class:"completion"
                                }
                            )
                                .appendTo(liste)
                                .bind("click",function(){
                                    $("#autocomplete-nom").val($(this).text());
                                    $("#id_fournisseur").val($(this).attr('id'));
                                    //console.log($("#id_fournisseur"));
                                    liste.addClass("cacher");
                                })

                        }
                    }

                });
            }

        });
    var curProdIndex = 0;
    $("#add-row").on('click',function(event) {
        event.preventDefault();
        curProdIndex++;
        var ligne = $("div.ligne-prod").last().clone();
            ligne.find("input").attr("name",function() {

                return "qte_"+curProdIndex;
            });
            ligne.find("select").attr("name",function() {

                return "libelle_"+curProdIndex;
            });

            ligne.appendTo($(".produits"));
        $("#numProd").val(curProdIndex);
        return false;

    });


    $('#datetimepicker1').datetimepicker();


});



