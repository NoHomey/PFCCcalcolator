function BlankOptionKeeper() {
    this.KeepBlankOption = function() {    
        var newOption = document.createElement("option");
        var atacheToElement = document.getElementById("Select2");
        newOption.disabled = newOption.selected = true;
        atacheToElement.add(newOption);
     }
}
