$(document).ready(function() {
	$(document).on("click", "div#other-thumbnails img", function() {
		var new_src = $(this).attr("src");
		console.log(new_src);
		var def = $("img#default-thumbnail").attr("data-src");
		$("img#default-thumbnail").attr("src", new_src);	
		$("img#default-thumbnail").attr("data-src", def);
	    $(this).siblings().removeClass("border-success");
	    $(this).addClass("border-success");
	});
});