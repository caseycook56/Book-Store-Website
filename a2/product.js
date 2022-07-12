
document.getElementById("postiveIncrement").addEventListener("click", function(event){

    var value =parseInt(document.getElementById('qty').value);
    document.getElementById('qty').value = value+1;



});

document.getElementById("negativeIncrement").addEventListener("click", function(event){
  var value=  parseInt(document.getElementById('qty').value);
  if(value>=1){
    document.getElementById('qty').value = value-1;
  }


});

function sumbitCheck(){
  var value= parseInt(document.getElementById('qty').value);
  if(value<1){
    console.log("WOWOOWOW")

    return false;

  }
  return true;
}
