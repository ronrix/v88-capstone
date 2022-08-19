$(document).ready(function() {
	$(document).on("click", "ul#side-nav li a", function() {
		var link = $(this).attr("data-id");
		$(this).parent().parent().siblings().addClass("d-none");

		$("form#"+link).removeClass("d-none");

		return false;
	});
});