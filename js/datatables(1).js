$(document).ready(function() {
    $('#employees').dataTable( {
    //"aLengthMenu": [[5, 10, 15, -1], [5, 10, 15	, "All"]],
    "pageLength": 5,
    "language": {"search": "",
				 "searchPlaceholder": 'Search Table'},

    "lengthChange": false
    });
});