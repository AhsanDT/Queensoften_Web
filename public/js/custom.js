$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "showEasing": "easeOutBounce",
        "hideEasing": "easeInBack",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $('.multiselect').select2();


});
