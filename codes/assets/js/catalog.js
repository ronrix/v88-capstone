$(document).ready(function() {

	/*
		DOCU: this function gets all the filtered data when a category is clicked
		OWNER: ronrix
	*/ 
	$(document).on("click", "a.category", function() {
		var link = $(this);
		$("h2#category-title").text(link.text());
		$.get(link.attr("data-href"), function(res) {
			$("div#products").html(res);
		});
		return false;
	});

	/*
		DOCU: this function gets all the products when the show all button is clicked
		OWNER: ronrix
	*/ 
	$(document).on("click", "a#show-all", function() {
		$.get("/show_all", function(res) {
			$("div#products").html(res);
		});

		$("h2#category-title").text("All Products");
		return false;
	});

	/*
		DOCU: this function is the search form categories, it filters the products on input search keyup event
		OWNER: ronrix
	*/ 
	$(document).on("submit", "form", function() {
		var form = $(this);
		$.post(form.attr("action"), form.serialize(), function(res){
			$("div#products").html(res);
		});
		return false
	});

	/*
		DOCU: this function is for search form
		OWNER: ronrix
	*/ 
	$(document).on("keyup", "input[type='search']", function() {
		$(this).parent().submit();
	})
 	
	/*
		DOCU: this function is for sort by price form
		OWNER: ronrix
	*/ 
	$(document).on("change", "select#sort-by", function() {
		$(this).parent().submit();
	})
});