function itemServices(){
	this.selectedData = [],
	this.deleteItem=function(itemId){
		selectedData = this.selectedData;
		for (var counter = 0; counter < selectedData.length; counter++) {
			if (itemId == selectedData[counter].id) {
				selectedData.splice(counter,1);
			}
		}
	},
	this.addItem=function(itemId,itemName){
		this.selectedData.push({item_id:itemId,item_name:itemName});
	},
	this.addItems=function(jsonObj){
		decode_json_obj = $.parseJSON(jsonObj);
		for(var counter = 0; counter < decode_json_obj.length; counter++){
			this.selectedData.push({item_name:decode_json_obj[counter].item_Name,item_id:decode_json_obj[counter].item_id});
		}
	},
	this.updateItem=function(itemId,replaceItem){
		selectedData = this.selectedData;
		for (var counter = 0; counter < selectedData.length; counter++) {
			if (itemId == selectedData[counter].item_id) {
				selectedData[counter].item_name = replaceItem;
			}
		}
	}
}