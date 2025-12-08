export const    InitializeSelect2 = {

    init() {
        $('.select2-input').each(function () {
            if (!$(this).data('select2')) {
                $(this).select2({
                    width: '100%',
                    dropdownParent: $(this).parent()
                });
            }
        });
    }
};

$(document).ready(
    () => {
        InitializeSelect2.init();
    }
);
