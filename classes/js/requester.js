function Requester () {
	this.SendRequest = function () {
			var xmlhttp = new XMLHttpRequest();
			var url = "request.php";
			xmlhttp.open("POST",url);
			xmlhttp.setRequestHeader("Content-Type", "application/json; charset=utf-8");
			var calcolation = this.PrepareRequest();
			var data=JSON.stringify(calcolation);
		    	xmlhttp.send(data);
		    	document.getElementById("checkmark").style.display = "inline-block";
		}
	this.PrepareRequest = function () {
		var Foods = [];
		var Food = "";
		var Flag = true;
		var Index = 0
		while (Flag) {
			Id = "Number" + Index;
			if (document.getElementById(Id) !== null) {
				Food = document.getElementById(Id).value;
				if (Food !== "end") {
					Foods.push(Food);
				} else {
					Flag = false;
				}
			}
			Index++;
		}
		return Foods;
	}
}
