function HistoryIntializer() {
    this.HistoryIntialize = function () {
        var ArrayOfIds = ["Select1", "Select2", "Select3", "Select4", "Select5"];
        var FirstSelectIndex = 0;
        var QuantitySelectIndex = 3;
        for (var Index in ArrayOfIds) {
            var Element = document.getElementById(ArrayOfIds[Index]);
            if (Index == FirstSelectIndex) {
                var Result = Element.options[Element.selectedIndex].text;
            } else {
                if (Index == QuantitySelectIndex) {
                    Result = Result + ' ' + Element.value;
                } else {
                    Result = Result + ' ' + Element.options[Element.selectedIndex].text;
                }
            }
        }
        return Result;
    }
}
