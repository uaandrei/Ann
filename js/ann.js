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
	$("#userfile").bind('change', function(e) {
		var fileNamesToUpload = "";
		var filesToUpload = e.target.files;
		for ( var i = 0; i < filesToUpload.length; i++) {
			fileNamesToUpload += filesToUpload[i].name + "<br/>";
		}
		$("#uploadfile-name").html(fileNamesToUpload);
	});
	$("#submitAdd").click(function() {
		$("#add-form").submit();
	});
	$("#add-pic-button").click(function() {
		$("#userfile").click();
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