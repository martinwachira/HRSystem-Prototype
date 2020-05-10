
$(document).ready(function(){
    $('#priority_select').on('change', function(){
        var prt = $(this).data('pr');
        $('#name').val(prt)
        alert(prt);
    });
});
