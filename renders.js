function render_basket(basket_items,destination_view){ 
	$(destination_view).empty();
	for (var counter = 0; counter < basket_items.length; counter++) {
		$(destination_view).append($("<ul>").append($("<li>").append($("<span class=deleteicon data-id='"+basket_items[counter].itemId+"' task-id='"+counter+"'>").append(basket_items[counter].itemName).append("<img src=/basket/images/deleteicon.png style='width:20px;height:20px;float:right'><li class='divider'></li>"))));
	};
}
function render_items(search_items,destination_view){
	$(destination_view).empty();
	for (var counter=0;counter<search_items.length;counter++){
		$(destination_view).append("<ul><li>"+search_items[counter].itemname+"<input type='checkbox' style='float:right;margin-bottom:20px' class='showCheckBox' value='"+search_items[counter].itemname+"' data-id="+search_items[counter].itemid+"><li class='divider'></li></li></ul>");
	}
}