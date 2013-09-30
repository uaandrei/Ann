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
	         data        : {
	            'title'           : $('#title').val()
	         },
	         success  : function (data, status)
	         {
	            if(data.status != 'error')
	            {
	               $('#files').html('<p>Reloading files...</p>');
	               //refresh_files();
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
      $('#files').html(data);
   });
}