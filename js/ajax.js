//FOOD
//view
$(document).on('click', '.view', function(){
  var foodItemID = $(this).attr("view-id");

  $.ajax({
    url:'actions/viewFoodItem.php',
    method: "POST",
    data:{foodItemID:foodItemID},
    success:function(data){
      $('#viewFoodContent').html(data);
      $('#viewFoodItem').modal('show');
    }
  });
});

//update
$(document).on('click', '.edit', function(){
  var foodItemID = $(this).attr("edit-id");

  $.ajax({
    url:'actions/updateFoodItem.php',
    method: "POST",
    data:{foodItemID:foodItemID},
    success:function(data){
      $('#updateFoodContent').html(data);
      $('#updateFoodItem').modal('show');
    }
  });
}); 
//END OF FOOD

//UNITS
//view
$(document).on('click', '.view', function(){
  var unitID = $(this).attr("view-id");

  $.ajax({
    url:'actions/viewUnit.php',
    method: "POST",
    data:{unitID:unitID},
    success:function(data){
      $('#viewUnitContent').html(data);
      $('#viewUnit').modal('show');
    }
  });
});
//END OF UNITS

//USERS
//view
$(document).on('click', '.view', function(){
  var userID = $(this).attr("view-id");

  $.ajax({
    url:'actions/viewUser.php',
    method: "POST",
    data:{userID:userID},
    success:function(data){
      $('#viewUserContent').html(data);
      $('#viewUser').modal('show');
    }
  });
});
//END OF USERS

//ARCHIVED USERS
//view
$(document).on('click', '.view', function(){
  var userID = $(this).attr("view-id");

  $.ajax({
    url:'actions/viewArchivedUser.php',
    method: "POST",
    data:{userID:userID},
    success:function(data){
      $('#viewArchivedUserContent').html(data);
      $('#viewArchivedUser').modal('show');
    }
  });
});

//restore
$(document).on('click', '.restore', function(){
  var userID = $(this).attr("view-id");

  $.ajax({
    url:'actions/restoreArchivedUser.php',
    method: "POST",
    data:{userID:userID},
    success:function(data){
      $('#viewArchivedUserContent').html(data);
      $('#viewArchivedUser').modal('show');
    }
  });
});//end of view
//END OF ARCHIVED USERS

//COMMISSIONS
//view
$(document).on('click', '.view', function(){
  var commissionID = $(this).attr("view-id");

  $.ajax({
    url:'actions/viewCommission.php',
    method: "POST",
    data:{commissionID:commissionID},
    success:function(data){
      $('#viewCommissionContent').html(data);
      $('#viewCommission').modal('show');
    }
  });
});
//END OF COMMISSIONS

//TRANSACTIONS
//view
$(document).on('click', '.view', function(){
  var referenceNo = $(this).attr("view-id");

  $.ajax({
    url:'actions/viewCurrentTransaction.php',
    method: "POST",
    data:{referenceNo:referenceNo},
    success:function(data){
      $('#viewCurrentTransactionContent').html(data);
      $('#viewTransaction').modal('show');
    }
  });
});
//END OF COMMISSIONS