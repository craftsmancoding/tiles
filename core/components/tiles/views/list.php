<script>
jQuery(function() {
    jQuery("#product_images").sortable();

	jQuery('#tiles_save_order').on('click',function(e){		
        console.log('Updating product.');
        var values = $('#tiles-form').serialize();
    	var url = connector_url + 'save_order';
	    jQuery.post( url, values, function(data){
	    	jQuery('.tiles-msg').show();
	    	data = jQuery.parseJSON(data);
	    	if(data.success == true) {
	    		jQuery('#tiles-result').html('Success');
	    	} else{
	    		jQuery('#tiles-result').html('Failed');
	    	}
	    	jQuery('#tiles-result-msg').html(data.msg);
	    	jQuery(".tiles-msg").delay(3200).fadeOut(300);
	    } );
	    e.preventDefault();
    });
    
});


</script>

<div id="modx-panel-workspace" class="x-plain container">

	<div class="tiles-msg">
		<div id="tiles-result"></div>
		<div id="tiles-result-msg"></div>
	</div>

	<form action="#" method="POST" id="tiles-form">
		<div class="tiles-header clearfix">
			<div class="header-title">
				<h2>Tiles</h2>
			</div>
			<div class="buttons-wrapper">
		            <button class="btn" id="tiles_save_order">Save Order</button>
		            <a class="btn" href="<?php print $data['mgr_controller_url']; ?>update">Create New Tile</a>
		        	<a class="btn" href="#">Close</a>
			</div>
		</div>
		<div class="well">
			<ul class="clearfix" id="product_images"><?php print isset($data['tiles']) ? $data['tiles'] : ''; ?></ul>
		</div>
	</form>
    <div class="dropzone-wrap" id="image_dropzone">
    	<div class="dz-default dz-message"><span>Drop files here to upload</span></div>
    </div>


</div>


