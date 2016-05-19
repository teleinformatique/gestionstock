/* 
 * Sensirtel 2014.
 * @autho KSR
 */

jQuery(document).ready(function(){
    
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
                       var tab = JSON.parse(data);
                       
                        
                        for(var i = 0; i < tab.length; i++){
                            var client = tab[i];
                            $("<p></p>",
                                    {
                                        text: client.ref +" - "+ client.name,
                                        id: client.id,
                                        class:"completion"
                                    }
                              )
                              .appendTo(liste)
                              .bind("click",function(){
                                            $("#autocomplete-nom").val($(this).text());
                                            $("#id_fournisseur").val($(this).attr('id'));
                                        
                                        liste.addClass("cacher");
                                     })
                              
                        }
                    }
          
            });
      }
    
  });
  
  
  
  
    
});
