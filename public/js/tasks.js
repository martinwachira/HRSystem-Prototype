
$(document).ready(function(){
    $('#priority_select').on('change', function(){
        // var prt = $(this).data('pr');
        var prt = $('#priority_select').val();
        // $('#name').val(prt);
        alert(prt);
    });
});
