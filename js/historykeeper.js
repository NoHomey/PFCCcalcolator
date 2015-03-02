function HistoryKeeper() {
	this.Index = 0;
	this.InstanceOfHistoryIntializer = new HistoryIntializer();
	this.AddToHistory = function() {
		var result = this.InstanceOfHistoryIntializer.HistoryIntialize();			
		var NewElement = document.createElement("input");
		NewElement.value = result;
		NewElement.type = "button"
		NewElement.disabled = true;
		NewElement.id = "Number" + ++this.Index;
		var To = document.getElementById("test");
		To.appendChild(NewElement);
		var UpdateButton = document.createElement("input");
		UpdateButton.type = "button";
		UpdateButton.value = "?"
		UpdateButton.id = WhichOne = this.Index;
		UpdateButton.setAttribute("onclick", "InstanceOfHistoryOverwriter.Update()");
		To.appendChild(UpdateButton);
		var RemoveButton = document.createElement("input");
		RemoveButton.type = "button";
		RemoveButton.value = "-"
		RemoveButton.id = this.Index;
		To.appendChild(RemoveButton);
	}	
}
