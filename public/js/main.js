$(document).ready(function() {
    var rell=$('#block-body').attr('url');
    //Выбор валюты
    $('#currency').change(function(){
        //console.log($(this).val());
        //var ar = $(this).val();
        //window.location = rell+'/currency/change?curr=' + $(this).val();
        $.ajax({
            type: 'GET',
            url: rell+'/currency/change/?curr=' + $(this).val(),
            dataType: 'html',
            cache: false,
            success: function() { location.reload(); }
        });
    });
});