function KeyGeter() {
    this.GetKey = function () {
        var ArrayOfIds = ["Select1", "Select2", "Select3"];
        var result = "";
        for (var Index in ArrayOfIds) {
            var element = document.getElementById(ArrayOfIds[Index]);
            result = result + element.options[element.selectedIndex].text;
        }
        return result;
    }
}
