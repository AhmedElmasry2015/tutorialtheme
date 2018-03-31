
  /*jQuery(document).ready(function($) {
    $('#content').hide();
    $('.show-more').click(function() {
        $('#excerpt').hide();
        $('#content').show();
        $(this).remove();
    });
});
  */
  jQuery(document).ready(function($) {
    $('.comment-respond').addClass('form-group');

    $('.comment-form p input , .comment-form p textarea').addClass('form-control');
    $('.comment-form p textarea').attr('rows','3');
    $('.comment-form p .submit').addClass('btn-primary');
});
  