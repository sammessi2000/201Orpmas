function file_manager(render_id)
{
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/';  // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = function(fileUrl) {
        $('#' + render_id).val(fileUrl);
        $('.thumbnail-preview.' + render_id).html("<img src='"+ fileUrl +"' />");
    }
    finder.popup();
}

$(document).ready(function() {
    $("#check_all").click(function() {
        $(".check_id").attr('checked', $(this).is(':checked'));
    });

    $('.confirm-delete').click(function() {
        var link = $(this).attr('goto');
        if (confirm('Bạn chắc chắn muốn xóa dữ liệu?') == true)
        {
            document.location.href = link;
        }
    });
	
	$('.number').number(true, 0);

});