<div id = 'footer'>
		</div>
	</body>
</html>

<!--JQuery 3.2.1-->
<script src='../../assets/jquery/3.2.1/jquery-3.2.1.slim.min.js'></script>

<!--JQuery 3.3.1-->
<script src='../../assets/jquery/3.3.1/jquery-3.3.1.min.js'></script>

<!--Popper JS-->
<script src='../../assets/popper.js/1.12.9/popper.min.js'></script>

<!--Bootstrap JS-->
<script src='../../assets/bootstrap/4.0.0/js/bootstrap.min.js'></script>

<!--Datatables JS-->
<script type="text/javascript" src="../../assets/datatables/datatables.min.js"></script>

<!-- JS for SideNav -->
<script src='../../assets/js/navigation.js'></script>

<!-- AJAX JS -->
<script src='../../assets/js/ajax.js'></script> 

<!-- Datatable Initializing JS -->
<script type="text/javascript" src="../../assets/js/datatables.js"></script>

<!-- Date Picker JS -->
<script type="text/javascript" src="../../assets/jquery/datepicker/jquery-ui.js"></script>

<script type="text/javascript">
	//tooltip script
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

    //add
	$('#addEmployeeForm').on('submit', function(event){
		event.preventDefault();
		
		$.ajax({
			url:'util/addEmployee.php',
			method: "POST",
			data:$('#addEmployeeForm').serialize(),
			success:function(data){
				//$('#addEmployeeForm')[0].reset();
				$('#addEmployeeModal').modal('hide');
				alert("New Employee Added!");
				location.reload();
			}
	    });
	});

</script>

