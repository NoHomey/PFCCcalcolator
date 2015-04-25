function BlankOptionKeeper() {
    this.KeepBlankOption = function (Id) {
        var Type = "option";
        var Text = "";
         switch (Id) {
        	case "Select1":
        		Text = "Type";
        	break;
        	case "Select2":
        		Text = "SubType";
        	break;
		case "Select3":
        		Text = "Cooked?";
        	break;
        }
        var NewOption = document.createElement(Type);
        var AtacheToElement = document.getElementById(Id);
        NewOption.disabled = NewOption.selected = true;
        NewOption.innerHTML = Text;
        AtacheToElement.add(NewOption);
    }
}
