$("#addbutton").click(function(){
var name = document.getElementById("name").value;
var amount = document.getElementById("amount").value;
var stock = document.getElementById("stock").value;

  console.log("HVFJH");
  $.ajax({
    type: 'POST',
    url: "add_products.php",
    data: {name: name, amount: amount, stock: stock},
    success: function(resultData) {
      if(resultData == 1){
        alert("Product Added Successfully");
      }
      else{
        alert("Product Add Failed. Contact Kashyap");
      }
    }
  });
});

$("#memberbutton").click(function(){
var mid = document.getElementById("mid").value;

  console.log(mid);
  $.ajax({
    type: 'POST',
    url: "take_attendance.php",
    data: {mid: mid},
    success: function(resultData) {
      console.log(resultData);
    }
  });
});

})
