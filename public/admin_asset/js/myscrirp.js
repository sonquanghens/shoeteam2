
	$(document).ready(function() {
       $('#dataTables-example').DataTable({
               responsive: false;
       });
   });

	 $("div.alert").delay(3000).slideUp();

	 function xacnhan(msg) {
		 if (window.confirm(msg)) {
			 return true;
		 }
		 return false;
	 }
