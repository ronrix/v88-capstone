$(document).ready(function() {
	$.get("/categories", function(res) {
		$("div#categories").html(res);
	});

	$(document).on("click", "a.category", function() {
		var link = $(this);
		$.get(link.attr("data-href"), function(res) {
			$("div#products").html(res);
		});
		return false;
	});
});