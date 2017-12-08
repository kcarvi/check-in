
window.onload = function() {

	/*** Get data from today ***/

	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            var res = "";
			for(var i = 0; i < data.surname.length; i++){
				res += '<tr><td>' + data.surname[i] + '</td><td>' + data.name[i] + '</td><td>' + data.number[i] + '</td><td>' + data.time[i] + '</td></tr>';
			};
			document.querySelector('.output tbody').innerHTML = res;
        }
    };
	xhr.open("POST", "load.php");
	xhr.send();

	/*** Add to database ***/

	document.querySelector(".btn-add").addEventListener('click', function(event){
		
		event.preventDefault();

		var surname = document.querySelector('.surnameField').value;
	    var name = document.querySelector('.nameField').value;
		var number = document.querySelector('.numberField').value;

		var data = new FormData();
		data.append('surname', surname);
		data.append('name', name);
		data.append('number', number);

		document.querySelector('.surnameField').value = "";
	    document.querySelector('.nameField').value = "";
		document.querySelector('.numberField').value = "";

		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
	        if (xhr.readyState == 4 && xhr.status == 200) {
	            var data = JSON.parse(xhr.responseText);
	            var res = '<td>' + data.surname[0] + '</td><td>' + data.name[0] + '</td><td>' + data.number[0] + '</td><td>' + data.time[0] + '</td>';
				var tr = document.createElement('tr');
				var tbody = document.querySelector('.output tbody');
				tr.innerHTML = res;
				tbody.insertBefore(tr, tbody.children[0]);

	        }
	    };
		xhr.open("POST", "add.php");
		xhr.send(data);

	});

	/*** Select by date ***/
	
	document.querySelector('.btn-date').addEventListener('click', function(event) {
		
		event.preventDefault();

		var dateFrom = document.querySelector('.dateFrom').value;
		var dateTo = document.querySelector('.dateTo').value;
		
		var data = new FormData();
		data.append('dateFrom', dateFrom);
		data.append('dateTo', dateTo);

		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
	        if (xhr.readyState == 4 && xhr.status == 200) {
	            var data = JSON.parse(xhr.responseText);
	            var res = "";
				for(var i = 0; i < data.surname.length; i++){
					res += '<tr><td>' + data.surname[i] + '</td><td>' + data.name[i] + '</td><td>' + data.number[i] + '</td><td>' + data.time[i] + '</td></tr>';
				};
				document.querySelector('table.output tbody').innerHTML = res;
	        }
	    };
		xhr.open("POST", "date.php");
		xhr.send(data);
	
	});
	
};