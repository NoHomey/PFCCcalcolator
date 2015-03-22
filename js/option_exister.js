function OptionExister() {
    this.OptionExist = function (Element, Option) {
        var Exist = false;
        for (var Index in Element.options) {
            if (Element.options[Index] === Option) {
                Exist = true;
            }
        }
        return Exist;
    }
}
