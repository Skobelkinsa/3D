$(function () {
    $('body').on('click', '.NewsCalNews', function () {
        $('.modal-calendar-body input[name="DATE"]').val($(this).data('date')+' '+$(this).data('from')+' - '+$(this).data('to'));
        $('.modal-calendar-alert').html("");
    });
    $("#calendar_modal form").submit(function () {
        $('.modal-calendar-alert').html("");
        $.post($(this).attr('action'), $(this).serialize(), function (data){
            $('#calendar_modal input[type="text"]').each(function(indx, element){
                $(this).val("");
            });
            $('.modal-calendar-alert').html(data);
        });
        return false;
    });
});