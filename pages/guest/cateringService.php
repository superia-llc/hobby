<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header.php';
	include_once '../../config/database.php';
	
	//echo $_SESSION['username'];	
?>

<?php
	$temp;
	$temp2;
	$final;
?>

 <script>
  $( function() {
	
	$( "#datepicker" ).datepicker({
	dateFormat: "yy-mm-dd",
	minDate: '1',
	onSelect: function (date) {
            var date2 = $('#datepicker').datepicker('getDate');
            date2.setDate(date2.getDate() + 1);
            $('#datepicker2').datepicker('setDate', date2);
            //sets minDate to dt1 date + 1
            $('#datepicker2').datepicker('option', 'minDate', date2);
        }
	});

  } );
  </script>
<html>
</br>
</br>

	<div class="row">
		<div class="col lg-1">
		</div>
		<div class="col lg-10">
  <div class="card center" style="width: 50rem;">
  <div class="card-body center">

    <h2 class="card-title text center">Catering</h2>	<?php
date_default_timezone_set('Asia/Manila'); 
$date_now = date('Y-m-d H:i:s');
echo "<h3>".$date_now."</h3><br>";

?> 
	<form method="POST">
	<input type="hidden" name="NotificationDescription" value="You have successfully availed a catering service!">
	<input type="hidden" name="NotificationType" value="Catering">
	<div class="row">
	<div class="col lg-6">
	</br>
	</br>
	<p>No of. People</p>
	<br>	
	</div>	
	<div class="col lg-6">
	<p></p>
	</br>
	<input type="number" max="24" min="1" name="NoOfPeople" id="NoOfPeople" class="form-control" value="6" >
	</div>
	</div>
	<div class="row">
	<div class="col lg-12">
	<select class="form-control">
	<option>Package 1</option>
	<option>Package 2</option>
	<option>Package 3</option>
	</select>
	</div>
	</div>
	</br>
	<div class="row">
	<div class="col lg-12">
	<div class="card center" style="width: 47rem;">
	<div class="card-body center">
	 <table class='table'>
         <thead class='thead-danger'>
            <tr>
               <th scope='col'>Package No.</th>
               <th scope='col'>Package Description</th>
               <th scope='col'>Price Per Person</th>
            </tr>
         </thead>
         <tbody>
			<tr>
               <td>Package 1</td>
               <td>VEGAN PACKAGE: 1 Order of Chopseuy,Pinakbet,Ginisang Ampalaya, Ginataang Santol,White Ricex2 and one 1L Water Bottle</td>
               <td>399</td>
            </tr>
			<tr>
               <td>Package 2</td>
               <td>MEAT PACKAGE: 1 Order of Adobo,Caldereta,Lechon Kawali,Galunggong X3 ,White Ricex2 and one 1L Water Bottle</td>
               <td>399</td>
            </tr>
			<tr>
               <td>Package 3</td>
               <td>MEAT & VEGAN PACKAGE: 1 Order of Chopseuy,Pinakbet,Caldereta,Lechon Kawali,White Ricex2 and one 1L Water Bottle</td>
               <td>450</td>
            </tr>
		 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div>
	</br>
	<div class="row">
	<div class="col lg-6">
	<label>Total</label>
	</div>
	<div class="col lg-6">
	<input class="form-control" type="number" value="" readonly>
	</div>
	</div>
	</br>
	<button class="btn btn-danger form-control" type="submit" name="book">Avail Catering</button>
	</form>
	</div>
	</div>
	</br>
	</br>
	</div>
	<div class="col lg-1">
	</div>
	</div>
		

</html>




