$(document).ready(function() {
	selectSearchBar();
	refresh_files();
	$('#upload_file').submit(function(e) {
		e.preventDefault();
		$.ajaxFileUpload({
			url : '/upload/upload_file/',
			secureuri : false,
			fileElementId : 'userfile',
			dataType : 'json',
			success : function(data, status) {
				if (data.status != 'error') {
					$('#advert-images').html('<p>Reloading files...</p>');
					refresh_files();
					$('#title').val('');
				}
			}
		});
		return false;
	});
	$("#submitAdd").click(function() {
		if (isAdvertValid()) {
			$("#add-form").submit();
		} else {
			$("#advert_message").show();
		}
		$("#advert_message").html(message);
	});
});

function selectSearchBar() {
	$("#search_bar").focus();
}

function refresh_files() {
	$.get('/upload/files/').success(function(data) {
		$('#advert-images').html(data);
	});
	$("#uploadfile-name").html("");
}

var message = "";

function isAdvertValid() {
	message = "";
	if (!$("#titleInput").val()) {
		message += "Introduceti un titlu pentru anunt.<br/>";
	}
	if (!$("#priceInput").val()) {
		message += "Introduceti un pret pentru anunt.<br/>";
	}
	if (!$("#priceInput").val() > 99999) {
		message += "Ati depasit pretul maxim de 99999.<br/>";
	}
	if (!$("#descriptionInput").val()) {
		message += "Introduceti o descriere pentru anunt.<br/>";
	}

	var isValid = !message;
	return isValid;
}