$(document).ready(function() {
$('.sylk,.sylk2,.delete').click(function(){
    var rel = $(this).attr('rel');
   $.confirm({
    'title': 'Подтверждение удаления',
    'message': 'После удаления восстановление будет невозможно! Продолжить?',
    'buttons': {
    'Да': {
    'class': 'blue',
    'action': function(){ location.href = rel; }
		}, 
	'Нет' : {
		'class': 'gray',
		'action': function(){}
	} }
   }); 
});
$('#selest-all').click(function () {
	$('.privelege input:checkbox').attr('checked', true);
});
$('#remove-all').click(function () {
	$('.privelege input:checkbox').attr('checked', false);
});
});