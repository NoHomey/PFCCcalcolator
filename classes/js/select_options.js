function SelectOptions() {
    this.InstanceOfClearSelectOptions = new ClearSelectOptions();
    this.DisplayAllSelectOptions = function (Id) {
        var NewOption;
        var Type = "option";
        var AtacheToElement = document.getElementById(Id);
        var SmartChoice = [];
        switch (Id) {
        case "Select1":
            SmartChoice = Object.keys(Data);
            break;
        case "Select2":
            {
                var Element = document.getElementById("Select1");
                var Key = Element.options[Element.selectedIndex].text;
                SmartChoice = Object.keys(Data[Key]);
            }
            break;
        case "Select3":
            {
                var Element = document.getElementById("Select1");
                var Key1 = Element.options[Element.selectedIndex].text;
                var Element = document.getElementById("Select2");
                var Key2 = Element.options[Element.selectedIndex].text;
                SmartChoice = Object.keys(Data[Key1][Key2]);
            }
            break;
        }
        this.InstanceOfClearSelectOptions.ClearAllSelectOptions(Id);
        for (var index in SmartChoice) {
            NewOption = document.createElement(Type);
            NewOption.text = SmartChoice[index];
            AtacheToElement.add(NewOption);
        }
    }
}

