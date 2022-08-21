$(document).ready(function() {

	/*
		DOCU: this function is for filtering the data with search and select inputs on orders page
		OWNER: ronrix
	*/ 
	$(document).on("submit", "form", function() {
		var form = $(this);
		$.post(form.attr("action"), form.serialize(), function(res) {
			if(res !== "200") {
				$("tbody").html(res);
			}
		});
		return false;
	});

	$(document).on("change", "select", function() {
		$(this).parent().submit();
	})

	$(document).on("keyup", "input[type='search']", function() {
		$(this).parent().submit();
	})

	/*
		DOCU: this function is for pagination in orders page
		OWNER: ronrix
	*/ 
	$(document).on("click", "li.page-item a", function() {
		var link_id = $(this).parent().attr("data-id");
		$.get("/paginate/" + link_id, function(res) {
			$("tbody").html(res);
		});
		return false;
	});
});