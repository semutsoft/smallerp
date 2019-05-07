<script>
  var table = $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
	  
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{URL_GET_DATALIST}",
            "type": "POST"
        },
		"columns":{LIST_FIELDS_DATA}
    });
  $("#btn-tambah").on("click", function(){
	  window.location.href = "{URL_FORM_REDIRECT}";
  })
  
  $("#example2").on("click", ".btn-ubah", function(){
	  var id = $(this).attr("data-id");
	  window.location.href = "{URL_FORM_REDIRECT}/"+id;
  })
  
  $("#example2").on("click", ".btn-hapus", function(){
	  var id = $(this).attr("data-id");
	  $.ajax({
			'url':"{URL_FORM_DELETE}",
			'type':"POST",
			'dataType':"JSON",
			'data':{id:id},
			'success':function(rst){
				if (rst.status){
					$(".callout-success").removeClass("hide");
					$("#msg-success").html(rst.msg);
					table.ajax.reload();
				} else {
					$(".callout-danger").removeClass("hide");
					$("#msg-error").html(rst.msg);
					
				}
			}	
	  });
  })
  
</script>