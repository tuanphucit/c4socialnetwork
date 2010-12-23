
	subject_id = '';
	function handleHttpResponse() {
		if (http.readyState == 4) {
			if (subject_id != '') {
				document.getElementById(subject_id).innerHTML = http.responseText;
			}
		}
	}
	function getHTTPObject() {
		var xmlhttp;
		if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
			try {
				xmlhttp = new XMLHttpRequest();
			} catch (e) {
				xmlhttp = false;
			}
		}
		return xmlhttp;
	}
	var http = getHTTPObject(); // We create the HTTP Object