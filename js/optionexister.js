function OptionExister () {
	this.OptionExist = function (Element, Option) {
		var Exist = false;
		for( var index in Element.options) {
			if (Element.options[index] === Option) {
				Exist = true;
			}
		} 
		return Exist;
	}
}
