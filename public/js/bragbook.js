$(document).ready(function() {

    $('.imgPopup').on('click', function() {
        
        $("#showImage").modal('show');
        $("#imagePopupImage").attr('src', this.src);
        //alert(this.src);
    })

	// $('#showImage').on('show.bs.modal', function () {
	// 	$(this).find('.modal-body').css({
	// 		width:'auto', //probably not needed
	// 		height:'auto', //probably not needed 
    //         'max-height':'100%'
	// 	});
	// });

    $('.delete').on('click', function(e) {
        if(!confirm("Are you sure you want to delete this?"))
            e.preventDefault();
    });

})