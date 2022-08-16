$(document).ready(function() {

	// sortable images
    $( "#sortable" ).sortable();

	$(document).on("click", "i.bi-pencil-square", function(){
		var input = $(this).parent().siblings("input");
		input.removeAttr("readonly");
		input.toggleClass("border-0");
	});

	// show loading when editing the category
	$(document).on("keyup", "input#category", function(){
		console.log($(this).next())
		$(this).next().toggleClass("d-none");
	});

	// change category icon
	$(document).on("click", "a#category-btn", function() {
		var down = $(this).children("i").attr("data-class");
		$(this).children("i").attr("data-class", $(this).children("i").attr("class"));
		$(this).children("i").attr("class", down);
	});

	// preview image
	$(document).on("change", "input[type='file']", function() {
		var reader;

		var file = $(this).get(0).files[0];

		if(file){
            reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
		var html_string = `
                <div class="row align-items-center">
                    <i class="col-2 bi bi-list"></i>
                    <div class="col">
                        <div class="img_container">
                            <img src="${URL.createObjectURL($(this)[0].files[0])}" class="w-50" alt="mouse" />
                        </div>
                    </div>
                    <p class="col-3">${$(this)[0].files[0].name}</p>
                    <i class="fas fa-trash col-1"></i>
                    <input class="col-1" type="checkbox" />
                    <p class="col-1 m-0 p-0">main</p>
                </div> `;
        $("div#sortable").append(html_string);
	})

}); 