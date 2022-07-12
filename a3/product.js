
document.getElementById("postiveIncrement").addEventListener("click", function(event){

  if(!(document.getElementById('qty').value =="")){
    var value =parseInt(document.getElementById('qty').value);
    document.getElementById('qty').value = value+1;
    var price=document.getElementById('price') ;
    price.innerHTML  = (parseInt(document.getElementById('qty').value))*20;
  }else{
      document.getElementById('displayError').innerHTML = "Enter 1 or greater";
  }




});

document.getElementById("negativeIncrement").addEventListener("click", function(event){
  var value=  parseInt(document.getElementById('qty').value);
  if(value>=1 && !(document.getElementById('qty').value =="")){
    document.getElementById('qty').value = value-1;
    var price=document.getElementById('price') ;

    price.innerHTML  = (parseInt(document.getElementById('qty').value))*20;
    document.getElementById('displayError').innerHTML = "";
  }else{
    document.getElementById('displayError').innerHTML = "Enter 1 or greater";
  }


});

document.getElementById("qty").addEventListener("input", function(event){
  var value=  parseInt(document.getElementById('qty').value);
  if(value>=1 && !(document.getElementById('qty').value =="")){
    var price=document.getElementById('price') ;
    price.innerHTML  = value*20;
    document.getElementById('displayError').innerHTML = "";

  }else{
    document.getElementById('displayError').innerHTML = "Enter 1 or greater";
  }

});

function sumbitCheck(){
  var rawValue = document.getElementById('qty').value
  if(rawValue==""){
    document.getElementById('displayError').innerHTML = "Enter a number!";
    return false;

  }
  var value= parseInt(document.getElementById('qty').value);
  if(value<1){
    document.getElementById('displayError').innerHTML = "Enter 1 or greater";
    return false;
  }
  document.getElementById('displayError').innerHTML = "";
  return true;

}
