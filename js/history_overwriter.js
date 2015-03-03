function HistoryOverwriter() {
    this.Update = function (WhichOne) {
        var HistoryElement = document.getElementById("Number" + WhichOne);
        var ArrayOfValues = HistoryElement.value.split(' ');
        for (var Index in ArrayOfValues) {
            var SelectNumber = ++Index;
            var Id = "Select" + (SelectNumber).toString();
            var Select = document.getElementById(Id);
            var Value = ArrayOfValues[--Index];
            if (Id !== "Select4") {
                if (!InstanceOfOptionExister.OptionExist(Select, Value)) {
                    var newOption = document.createElement("option");
                    newOption.disabled = newOption.selected = true;
                    newOption.text = Value;
                    Select.add(newOption);
                }
            } else {
                Select.value = OldQuantity = Value;
            }
        }
        InstanceOfLocker.TurnOn();
        InstanceOfOperatorSwitcher.SwitchIt("?");
        WhichToRemove = WhichOne;
    }
}
