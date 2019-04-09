<script>
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true
    })
	
	$("#{FORM_NAME_ID}").on("submit", function(){
		var dataSerial = $(this).serialize();
		$.ajax({
			url:"{URL_FORM_SAVE}",
			dataType:"JSON",
			type:"POST",
			data:dataSerial,
			success:function(rst){
				if (rst.status){
					$(".callout-success").removeClass("hide");
					$("#msg-success").html(rst.msg);
					
				} else {
					$(".callout-danger").removeClass("hide");
					$("#msg-error").html(rst.msg);
					
				}
			}
		});
		return false;
	})
</script>    