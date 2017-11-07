(function(){

	var preload = document.getElementById("preload");
	var loading = 0;
	var id = setInterval(frame, 30);

	function frame() {
		if(loading == 60) {
			clearInterval(id);
			window.open("../../admin/index.php", "_self");
		}else{
			loading += 1;
			if(loading == 50) {
				preload.style.animation = "fadeout 1s ease";
			}
		}
	}

})();