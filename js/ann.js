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
			success : function(data) {
				var returnedData = JSON.parse(data);
				if (returnedData.status != 'error') {
					$('#advert-images').html('<p>Se incarca imaginile...</p>');
					refresh_files();
					$('#title').val('');
				} else {
					$('#advert-images').append('<div class="alert alert-danger">Imaginea nu respecta formatul admis.</div>');
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
		message += "Introduceti o valoare pentru titlu.<br/>";
	}
	if (!$("#priceInput").val()) {
		message += "Introduceti o valoare pentru anunt.<br/>";
	}
	if (!$("#priceInput").val() > 99999) {
		message += "Valoare maxima pentru pret este 99999.<br/>";
	}
	if (!$("#descriptionInput").val()) {
		message += "Introduceti o valoare pentru descriere.<br/>";
	}

	var isValid = !message;
	return isValid;
}

function deleteFile(val) {
	$.ajax({
		url : "/upload/delete_file",
		type : "POST",
		data : {
			file_name : val
		},
		dataType : "html"
	}).done(function() {
		refresh_files();
	});
}