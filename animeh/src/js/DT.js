$(document).ready(function(){
    $('.table').DataTable();
    $(".dataTables_filter input").on("keyup", delay(function(e) {
        $('.loader').fadeIn('fast');
        setTimeout(() => {
            $('.loader').fadeOut('fast');
        }, 100);
    }, 500));
});
function delay(callback, ms) {
    var timer = 0;
    return function() {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function() {
            callback.apply(context, args);
        }, ms || 0);
    };
}