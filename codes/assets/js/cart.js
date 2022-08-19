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
	$(document).on("submit", "form#checkout", function() {
		var form = $(this);
		$.post(form.attr("action"), form.serialize(), function(res) {					
			var data = JSON.parse(res);
			console.log(data);
			if(data.status == 200) {

				$("tbody").html("");
				
				$("div#msg").text("Order has been placed!");
				$("div#msg").addClass("alert-success");

				setTimeout(() => {
					$("div#msg").removeClass("alert-success");
					$("div#msg").text("");
				}, 5000);

			}
			else {
				$("div#msg").text("Something Went Wrong!");
				$("div#msg").addClass("alert-danger");

				setTimeout(() => {
					$("div#msg").removeClass("alert-danger");
					$("div#msg").text("");
				}, 5000);

			}

			$.get("/cart_count_update", function(res) {
				$("div.cart-count").text(res);				
			});

			$.get("/get_total_price", function(res) {
				var count_data = JSON.parse(res);
				if(count_data.status == 500) {
					$("p span#sub-total").text("0");
					$("p span#total").text("0");
				}
				else {
					$("p span#sub-total").text(res);
					$("p span#total").text(parseInt(res) + 100);
				}
			});

			$("#fname_b").val('');
			$("#lname_b").val('');
			$("#addr_1_b").val("");
			$("#addr_2_b").val("");
			$("#city_b").val("");
			$("#state_b").val("");
			$("#zipcode_b").val("");

			$("#fname").val('');
			$("#lname").val('');
			$("#addr_1").val("");
			$("#addr_2").val("");
			$("#city").val("");
			$("#state").val("");
			$("#zipcode").val("");
		});


		return false;
	});

	$(document).on("submit", "form#update-cart", function() {
		var form = $(this);
		$.post(form.attr("action"), form.serialize(), function(res) {
			$("tbody").html(res);

			$.get("/get_total_price", function(res) {
				$("p span#sub-total").text(res);
				$("p span#total").text(parseInt(res) + 100);
			})
	
		});

	
		return false;
	});

	$(document).on("submit", "form#delete-cart", function() {
		var form = $(this);
		$.post(form.attr("action"), form.serialize(), function(res) {
			$("tbody").html(res);

			$.get("/cart_count_update", function(res) {
				$("div.cart-count").text(res);
			})

			$.get("/get_total_price", function(res) {
				$("p span#sub-total").text(res);
				$("p span#total").text(parseInt(res) + 100);
			})

		});

		return false;
	});

	// update quantity of the cart
	$(document).on("change", "input#cart-quantity", function() {
		$(this).parent().submit();
	})

	// delete cart
	$(document).on("click", "i#trash-icon", function() {
		$(this).parent().submit();
	});
});