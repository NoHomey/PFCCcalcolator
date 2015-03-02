function HistoryIntializer() {
	this.HistoryIntialize = function() {
		var element = document.getElementById("Select1");
		var result = element.options[element.selectedIndex].text;
		element = document.getElementById("Select2");
		result = result + ' ' + element.options[element.selectedIndex].text;
		element = document.getElementById("Select3");
		result =  result + ' ' + element.options[element.selectedIndex].text;
		element = document.getElementById("Select4");
		result =  result + ' ' + element.value;
		element = document.getElementById("Select5");
		result =  result + ' ' + element.options[element.selectedIndex].text;
		return result;
	}
}
