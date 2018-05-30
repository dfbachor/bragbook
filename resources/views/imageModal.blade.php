<!-- image  Modal Popup ---------------------------------------------
this window will not show until requested from the edit note link item -->

<div class="modal fade" id="showImage" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-md">
		<div class="modal-content">
            <div class="modal-header">
	            <span id="imagePopupName"></span>
            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
				<center><img id="imagePopupImage" class='img-responsive'></center>
            </div>

            <div class="modal-footer">
	            <span id="imagePopupFooterArea"></span>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
			</div>
		</div>
    </div>
</div>
<!--  end image  Modal Popup -->
	