document.getElementById("cardInput").addEventListener("input", function(event){
  var card=document.getElementById("cardInput").value;
  card = card.replace(/\s/g,'');
  console.log(card);
  console.log();
  if(card.charAt(0)=="4" && card.length<=16 && card.length>=13){
    console.log("got image");
    document.getElementById("visaPic").style.display="inline";


  } else{
    document.getElementById("visaPic").style.display="none";
    console.log("no");
  }

});
