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
		for (var Index = 0;Flag;Index++) {
			Id = "Number" + Index;
			if (document.getElementById(Id) !== null) {
				Food = document.getElementById(Id).value;
				if (Food !== "end") {
					Foods.push(Food);
				} else {
					Flag = false;
				}
			}
		}
		return Foods;
	}
}
