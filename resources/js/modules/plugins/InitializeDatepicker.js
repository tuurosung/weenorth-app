export const InitializeDatepickers = {


    init(){
        $('.datepicker').each(function () {
            if (!$(this).data('datepicker')) {
                $(this).datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
                });
            }
        });
    },
}

$(document).ready(
    () => {
        InitializeDatepickers.init();
    }
);
