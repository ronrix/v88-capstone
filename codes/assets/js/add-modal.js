$(document).ready(function() {

	// sortable images
    $( "#sortable" ).sortable();

	$(document).on("click", "i.bi-pencil-square", function(){
		var input = $(this).parent().siblings("input");
		input.removeAttr("readonly");
		input.toggleClass("border-0");
	});

	// make the first category as default
	$("input#category-btn").val($("#collapseExample").children().first().children().first().children()[0].value);
 
	// display edit and delete btn when hover; category.
	$("div.category-lists").hover(function(){
		$(this).children().next().removeClass("d-none")
		$(this).children().addClass("bg-light");
	}, function() {
		$(this).children().removeClass("bg-light");
		$(this).children().next().addClass("d-none")
	});

	// selecting category
	$(document).on("click", "div#collapseExample div.card div", function() {
		$("input#category-btn").val($(this).children()[0].value);
	});


	$(document).on("click", "input#preview", function() {
		var form = $("form#add");
		console.log(form)
		
		data.append("product_name", form[0][2].value);
		data.append("description", form[0][3].value);
		data.append("inventory_count", form[0][4].value);
		data.append("price", form[0][5].value);
		data.append("category", form[0][6].value);
		data.append("new_category", form[0][9].value);

		console.log(data.getAll("images"));
		
	});

	// preview image
	$(document).on("change", "input[type='file']", function() {

		var html_string = ''
		
		for(var i=0; i<$(this)[0].files.length; i++) {
			html_string += `
			<div class="row align-items-center">
				<i class="col-2 bi bi-list"></i>
				<div class="col">
					<div class="img_container">
						<img src="${URL.createObjectURL($(this)[0].files[i])}" class="w-50" alt="mouse" />
					</div>
				</div>
				<p class="col-3">${$(this)[0].files[0].name}</p>
				<i class="bi bi-trash-fill col-1 text-danger cursor" id="remove-img" data-id='${i}'></i>
				<input class="col-1" type="radio" name="main_thumbnail" />
				<p class="col-1 m-0 p-0">main</p>
			</div> `;
		}
		$("div#sortable").append(html_string);
	});

	$(document).on("click", "i#remove-img", function() {
		$(this).parent().remove();
		$("input[type='file']").val("");
		console.log($("input[type='file']")[0].files);
	});

	// click upload btn
	$(document).on("click", "input#upload-btn", function() {
		$(this).next().click();
	});

	// update category
	$(document).on("change", "input#category", function() {
		var id = $("input#category_id").val();
		var cat = $("input#category").val();
		var csrf_name = $("input#csrf").attr("name");
		var csrf_token = $("input#csrf").val();
		console.log(csrf_name);
		console.log(csrf_token);
		$.ajax({
			headers: {
				csrf_name: csrf_token,
			},
			type: "POST",
			url: "/edit_category/", 
			data: {"id": id, "category": cat} ,
			success: function(res) {
				console.log(res);
			}
		});
	});

	// remove product
	$(document).on("click", "input#delete", function() {
		$("form#delete-form").submit();
	})

	$(document).on("submit", "form#delete-form", function(){
		var form = $(this);
		$.post(form.attr("action"), form.serialize() , function(res) {
			console.log(res);
			if(res.status == 200) {
				console.log(res);
			}
			else {
				$("button#close").click();
				$("tbody").html(res);
			}
		});
		return false;
	})

}); 