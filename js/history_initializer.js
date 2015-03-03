function HistoryIntializer() {
    this.HistoryIntialize = function () {
        var ArrayOfIds = ["Select1", "Select2", "Select3", "Select4", "Select5"];
        for (var Index in ArrayOfIds) {
            var Element = document.getElementById(ArrayOfIds[Index]);
            if (Index == 0) {
                var Result = Element.options[Element.selectedIndex].text;
            } else {
                if (Index == 3) {
                    Result = Result + ' ' + Element.value;
                } else {
                    Result = Result + ' ' + Element.options[Element.selectedIndex].text;
                }
            }
        }
        return Result;
    }
}
