<!DOCTYPE html>
<html lang=en>

<head>
<meta charset=UTF-8>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script type="text/javascript" src="script.js"></script>
<script src="jquery.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<title>pendu</title>
</head>
<body>

<?php

$tabDesMots=file('dico.txt',FILE_SKIP_EMPTY_LINES);
$nbreLignes=count($tabDesMots, COUNT_RECURSIVE);
$ligneAleatoire = mt_rand (0,($nbreLignes-1));
$mot= $tabDesMots[$ligneAleatoire];
 ?>
<div class="ban"></div>
<div class="main">
<label for="lettre">Entrez une lettre :</label><br>
 <input type="text" id="lettre" placeholder="ex : a, b, c..." required="required" maxlength=1>
 <input type="hidden" id="motrandom" value=<?php echo($mot); ?>>
 <button id="submit">Try !</button>
<div class="container"></div>
<div class="result">
<div class="image"><img src="img/man.png" alt="pendu"></div>
<div class="display">
<p id="retour">Lettres jouées : </p>
<p id="restant"></p>
<p id="final"></p>
</div>
</div>
</div>
<script>

var lettrefind=0;
var raté=0;
var pos = 0;
var restant = 6;
$("#restant").html('Chances restantes : 6');


var mot=$("#motrandom").val();

for(var i=0; i < mot.length; i++){
  $(".container").append('<div class="box"><p id="'+i+'">'+mot.charAt(i)+'</p></div>');
}

console.log(mot);

$("#submit").click(function(){
var lettre=$("#lettre").val().toUpperCase();
var verif = mot.indexOf(lettre);


$("#retour").append(lettre+' ');


for(var i=0; i < mot.length; i++){

  if (mot.charAt(i) == lettre) {
    lettrefind++;
    $("#"+i).css({"visibility" : "visible",
                  "background-color" : "yellow"});

    if (lettrefind==mot.length){
        $("#final").html('Bravo tu as trouvé !<br><button id="btn">Rejouer</button>');
    }

  }
  else if(verif === -1) {
    raté++;
    restant--;
    pos=pos-75;
    $("img").css("margin-left", pos+"px");
    $("#restant").html('Chances restantes : '+restant);

    if (raté == 6){
      $("#final").html('<strong>PERDU ! le mot était '+mot+' !</strong><br><button id="btn">Rejouer</button>');
      reset();
    }
    return;
  }
}
reset();
});

function reset(){
$("#btn").click(function(){
location.reload();
});
}

</script>


</body>
</html>
