function loadFull(ID1,ID2,ID3,ID4){
  var x = document.getElementById(ID3);
  var y = document.getElementById(ID4);
  var x1 = document.getElementById(ID1);
  var y1 = document.getElementById(ID2);
  if (x.style.display === "none") {
    x.style.display = "inline-block";
    y.style.display="inline-block";
    x1.style.display = "none";
    y1.style.display="none";
  } 
  return false;

 }


 function loadLess(ID1,ID2,ID3,ID4){
  var x = document.getElementById(ID3);
  var y = document.getElementById(ID4);
  var x1 = document.getElementById(ID1);
  var y1 = document.getElementById(ID2);
  if (x.style.display === "inline-block") {
    x.style.display = "none";
    y.style.display="none";
    x1.style.display = "inline-block";
    y1.style.display="inline-block";
  } 
  return false;
 }