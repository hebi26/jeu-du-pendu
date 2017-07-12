<!DOCTYPE html>
<html lang=en>

<head>
<meta charset=UTF-8>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script type="text/javascript" src="script.js"></script>
<script src="jquery.js"></script>
<link rel="stylesheet" href="style.css">
<title>pendu</title>
</head>
<body>

<?php

$tabDesMots=file('dico.txt',FILE_SKIP_EMPTY_LINES);
$nbreLignes=count($tabDesMots, COUNT_RECURSIVE);
$ligneAleatoire = mt_rand (0,($nbreLignes-1));
$mot= $tabDesMots[$ligneAleatoire];
 ?>


 <input type="text" id="lettre" placeholder="ex : a, b, c..." required="required">
 <input type="hidden" id="motrandom" value=<?php echo($mot); ?>>
 <button id="submit">Try !</button>
<p id="boxtrait"></p>
<script>

var trait="";
var mot=$("#motrandom").val();

console.log(mot);

$("#submit").click(function(){
var lettre=$("#lettre").val().toUpperCase();


  for(var i=0; i < mot.length; i++){
    if (mot.charAt(i) === lettre) {
      trait += mot.charAt(i);
  }
  else{
    trait += "<span> _ </span>";
  }
  $("#boxtrait").html(trait);

  }

});






</script>


</body>
</html>
