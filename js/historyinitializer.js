function HistoryIntializer() {
	this.HistoryIntialize = function() {
		var element = document.getElementById("Select1");
		var result = element.options[element.selectedIndex].text;
		element = document.getElementById("Select2");
		result = result + ' ' + element.options[element.selectedIndex].text;
		element = document.getElementById("Select3");
		result =  result + ' ' + element.options[element.selectedIndex].text;
		
		return result;
	}
}
