$(document).ready(function() {
	selectSearchBar();
	refresh_files();
	$('#upload_file').submit(function(e) {
	      e.preventDefault();
	      $.ajaxFileUpload({
	         url         :'/upload/upload_file/', 
	         secureuri      :false,
	         fileElementId  :'userfile',
	         dataType    : 'json',
	         success  : function (data, status)
	         {
	            if(data.status != 'error')
	            {
	               $('#advert-images').html('<p>Reloading files...</p>');
	               refresh_files();
	               $('#title').val('');
	            }
	         }
	      });
	      return false;
	   });
});

function selectSearchBar(){
	$("#search_bar").focus();
}

function refresh_files()
{
   $.get('/upload/files/')
   .success(function (data){
      $('#advert-images').html(data);
   });
}