/**
 *  Update the wizard steps based on the active tab.
 *  This function updates the classes of the navigation links to reflect
 *  which steps have been completed, are active, or are yet to be completed.
 *
 * @param {*} wizardcontainer
 * @returns
 */
function updateWizardSteps(wizardcontainer) {

    // find the parent element
    const $wizardContainer = $(wizardcontainer).closest('[class*="nav-wizards-3"]');

    if (!$wizardContainer.length) return;

    const $activeItem = $wizardContainer.find('.nav-link.active');


    if ($activeItem.length) {

        const activeIndex = $wizardContainer.find('.nav-item').index($activeItem.closest('.nav-item'));

        $wizardContainer.find('.nav-item').each(function (index) {
            const $navLink = $(this).find('.nav-link');
            if (index < activeIndex) {
                $navLink.addClass('completed');
            } else if (index === activeIndex) {
                $navLink.removeClass('completed');
            } else {
                $navLink.removeClass('completed');
            }
        });
    }
}


/**
 * Function to handle the click event on the navigation links
 * and update the wizard steps accordingly.
 */
function handleTabClick(wizardContainer, navType) {

    const $wizardContainer = $(wizardContainer).closest('.nav-wizards-container');

    if (!$wizardContainer.length) return;

    $currentTab = $wizardContainer.find('.nav-link.active');
    $nextTab = $currentTab.closest('.nav-item').next().find('.nav-link');
    $previousTab = $currentTab.closest('.nav-item').prev().find('.nav-link');

    if (navType === 'next' && $nextTab.length) {

        // Validate required fields in the current tab
        const $currentTabContent = $($currentTab.attr('href'));
        const $requiredFields = $currentTabContent.find('input[required], textarea[required], select[required]');
        const allFieldsValid = validateRequiredFields($requiredFields);

        if (!allFieldsValid) {
            return;
        }

        $currentTab.removeClass('active');
        const tabTrigger = new bootstrap.Tab($nextTab[0]);
        tabTrigger.show();
        // updateWizardSteps($nextTab[0]); // Pass the next tab element

    }
    else if (navType === 'previous' && $previousTab.length) {

        $currentTab.removeClass('active');
        const tabTrigger = new bootstrap.Tab($previousTab[0]);
        tabTrigger.show();
        // updateWizardSteps($previousTab[0]); // Pass the previous tab element
    }

}


$(document).on('shown.bs.tab', '.nav-wizards-3 .nav-link', function (event) {
    updateWizardSteps($(this));
});


$(document).on('shown.bs.modal', function () {

    $(document).on('shown.bs.tab', '.nav-wizards-3 .nav-link', function (event) {
        updateWizardSteps($(this));
    });

});


$(document).on('click', '.btn-next', function (event) {
    handleTabClick(this, 'next');
});


$(document).on('click', '.btn-previous', function (event) {
    handleTabClick(this, 'previous');
})


function validateRequiredFields($fields) {
    let allValid = true;

    $fields.each(function () {
        const $field = $(this);
        const isEmpty = !$field.val().trim();

        $field.toggleClass('is-invalid is-invalid-feedback border-danger', isEmpty);

        if (isEmpty) {
            allValid = false;
        }
    });

    return allValid;
}
