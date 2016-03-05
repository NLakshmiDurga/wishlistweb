var modelService = new itemServices();
$("#searchbox").on("input",function(){
	$("#additemsbutton").text("Add items to basket");
	var itemToSearch = $("#searchbox").val();
	$.ajax({
		url : "/basket/json_search_items.php",
		data : {
			search : itemToSearch
		},
		type : "GET",
		success : function(responseData){
			console.log("success ajax",responseData);
			$("#container").empty();
			json_string = $.parseJSON(responseData);
			console.log("json_string",json_string);
			modelService.selectedData = json_string;
			console.log("modelService.selectedData ",modelService.selectedData);
			context = {items:modelService.selectedData};
			var source   = $("#basket_view").html();
			var template = Handlebars.compile(source);
			var html    = template(context);
			$("#container").append(html);
		},
		error : function(xhr, status, errorThrown){
			console.log("Error while making ajax",status)
		}
	})
})
$(".glyphicon").click(function(){
	$.ajax({
		url : "categories.php",
		success : function(responseData){
			$(".container").empty();
			var json_categories = $.parseJSON(responseData);
			for(var counter = 0;counter<json_categories.length;counter++){
				var json_string = json_categories[counter].categoryname;
				var string_first_letter = json_string.charAt(0);
				console.log("first letter ",string_first_letter);
				$(".container").append($("<div class='col-xs-4 col-md-4 col-sm-4 col-lg-4'>").append($("<div class='categoriesdiv' style='background-color:#ad8592;text-align:center;margin:0 0 30px' category-id='"+json_categories[counter].categoryId+"'>").append($("<p style='text-align:center'>"+string_first_letter+"</p>")).append(json_string+"</div></div>")));
				if (counter == 2) {
					$(".container").append("<br>");
				}
			}
			console.log("success ajax",responseData);
		},
		error : function(xhr,status,errorThrown){
			console.log("Error while making ajax ",status);
		}
	})
})