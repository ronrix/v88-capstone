$(document).ready(function() {
	$(document).on("change", "input#same-as-shipping", function() {
		if($(this)[0].checked) {
			$("#fname_b").val($("#fname").val());
			$("#lname_b").val($("#lname").val());
			$("#addr_1_b").val($("#addr_1").val());
			$("#addr_2_b").val($("#addr_2").val());
			$("#city_b").val($("#city").val());
			$("#state_b").val($("#state").val());
			$("#zipcode_b").val($("#zipcode").val());
		}
		else {
			$("#fname_b").val('');
			$("#lname_b").val('');
			$("#addr_1_b").val("");
			$("#addr_2_b").val("");
			$("#city_b").val("");
			$("#state_b").val("");
			$("#zipcode_b").val("");
		}
	});

	// submit checkout
	$(document).on("submit", "form", function() {
		var form = $(this);
		$.post(form.attr("action"), form.serialize(), function(res) {					
			$("tbody").html("");
			$("button#close").click();
			$("button#liveToastBtn").click();
		});

		$.get("/cart_count_update", function(res) {
			$("div.cart-count").text(res);
		})

		$.get("/get_total_price", function(res) {
			$("p span#total").text(res);
		})

		return false;
	});



	// update quantity of the cart
	$(document).on("change", "input#cart-quantity", function() {
		$(this).parent().submit();
	})

	// delete cart
	$(document).on("click", "input#delete", function() {
		$("form#delete-cart").submit();
	});
});