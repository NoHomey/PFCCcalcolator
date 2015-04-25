function KeysGeter() {
    this.GetKeys = function () {
        var ArrayOfIds = ["Select1", "Select2", "Select3"];
        var Keys = [];
        for (var Index in ArrayOfIds) {
            var element = document.getElementById(ArrayOfIds[Index]);
            Keys.push(element.options[element.selectedIndex].text);
        }
        return Keys;
    }
}
