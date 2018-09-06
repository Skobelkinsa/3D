$(function () {
    $("#direction form").submit(function () {
        $('.direction-study_alerts').html("");
        $.post($(this).attr('action'), $(this).serialize(), function (data){
            $('.direction-study input[type="checkbox"]').each(function(indx, element){
                $(this).removeAttr("checked");
            });
            $('.direction-study input[type="text"]').each(function(indx, element){
                $(this).val("");
            });
           $('.direction-study_alerts').html(data);
        });
        return false;
    });
});