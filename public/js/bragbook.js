$(document).ready(function() {

    $('.imgPopup').on('click', function() {
        
        $("#showImage").modal('show');
        $("#imagePopupImage").attr('src', this.src);
        //alert(this.src);
    })

    $('.delete').on('click', function(e) {
        if(!confirm("Are you sure you want to delete this?"))
            e.preventDefault();
    });

})