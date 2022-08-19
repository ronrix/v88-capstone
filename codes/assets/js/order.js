$(document).ready(function() {
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

	$("form#filter").submit();
});