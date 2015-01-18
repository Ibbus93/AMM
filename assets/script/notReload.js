<script type="text/javascript">
$(document).ready(function() {

  //al click sul bottone del form
  $("#bottone").click(function(){

    //associo variabili
    var nome = $("#nome").val();
    var mansione = $("#mansione").val();

  //chiamata ajax
    $.ajax({

     //imposto il tipo di invio dati (GET O POST)
      type: "POST",

      //Dove devo inviare i dati recuperati dal form?
      url: "risultato_aggiunta.php",

      //Quali dati devo inviare?
      data: "nome=" + nome + "&mansione=" + mansione,
      dataType: "html",

      //Inizio visualizzazione errori
      success: function(msg)
      {
        $("#risultato").html(msg); // messaggio di avvenuta aggiunta valori al db (preso dal file risultato_aggiunta.php) potete impostare anche un alert("Aggiunto, grazie!");
      },
      error: function()
      {
        alert("Chiamata fallita, si prega di riprovare..."); //sempre meglio impostare una callback in caso di fallimento
      }
    });
  });
});
</script>