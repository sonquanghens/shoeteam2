$(function() {
			// this will get the full URL at the address bar
			var url = window.location.href;

			// passes on every "a" tag
			$("#main-menu a").each(function() {
					// checks if its the same on the address bar
					if (url == (this.href)) {
							$(this).closest("a").addClass("active-menu");
						$(this).parents('a').addClass('parent-active');
					}
			// $('#main-menu a').click(function(e) {
			//         e.preventDefault();
			//         $('#page-inner').load(url);
			// });
			});
	});
	$("div.alert").delay(3000).slideUp();
	function xacnhan(msg) {
		if (window.confirm(msg)) {
			return true;
		}
		return false;
	}



$('#search').on('keyup',function(){
		$value=$(this).val();
		$.ajax({
		type : 'get',
		url : '/admin/search',
		data:{'search':$value},
		success:function(data){
		$('tbody').html(data);
		}
		});
});


$('#search_user').on('keyup',function(){
		$value=$(this).val();
		$.ajax({
		type : 'get',
		url : '/admin/users/search',
		data:{'search_user':$value},
		success:function(data){
		$('tbody').html(data);
		}
		});
});
