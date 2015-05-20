function HistoryElement() {
    this.Create = function(Value, Id, Class, OnClickEvent) {
        var Type = "input";
        var Parent = "History";
        var SubType = "button";
        var Event = "onclick";
        var NewElement = document.createElement(Type);
        var To = document.getElementById(Parent);
        NewElement.value = Value;
        NewElement.type = SubType;
        NewElement.id = Id;
        NewElement.name = Id;
        NewElement.setAttribute("class", Class);
        if (OnClickEvent !== false) {
            NewElement.setAttribute(Event, OnClickEvent);
            NewElement.style.width = "90px";
        }
        To.appendChild(NewElement);
        if(Class === "Remove") {
            NewBr = document.createElement("br");
            NewBr.id = Id;
            To.appendChild(NewBr);
        }
    }
}
