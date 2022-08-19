$(document).ready(function() {

	// changing focus of thumbnail
	$(document).on("click", "div#other-thumbnails img", function() {
		var new_src = $(this).attr("src");
		console.log(new_src);
		var def = $("img#default-thumbnail").attr("data-src");
		$("img#default-thumbnail").attr("src", new_src);	
		$("img#default-thumbnail").attr("data-src", def);
	    $(this).siblings().removeClass("border-success");
	    $(this).addClass("border-success");
	});

	// reply button
	$(document).on("click", "a#reply", function() {
		$("form#reply-form").slideToggle();
		return false;
	});

	// submit add to cart form
	$(document).on("submit", "form", function() {
		var form = $(this);
		$.post(form.attr("action"), form.serialize(), function(res) {
			if(res.status == 200) {
				$("p#msg").text("Added to cart!");
				$("p#msg").addClass("text-success");
				$("p#msg").fadeIn();
				setTimeout(function() {
				$("p#msg").removeClass("text-success");
				$("p#msg").fadeOut();
				}, 1000);
			}
			else {
				$("p#msg").text("Something went wrong!");
				$("p#msg").addClass("text-danger");
				$("p#msg").fadeIn();
				setTimeout(function() {
					$("p#msg").removeClass("text-danger");
					$("p#msg").fadeOut();
				}, 1000);
			}
		});

		$.get("/cart_count_update", function(res) {
			$("div.cart-count").text(res);
		})

		return false;
	});

	// add to cart btn
	$(document).on("click", "a#add-to-cart", function() {
		$(this).parent().submit();
		return false;
	});
});