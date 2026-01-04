export const ResumeBuilderModule = {

    config: {
        printConfig: "width=800,height=600,top=100,left=100,scrollbars=yes"
    },


    elements: {
        $printResumeBtn: '#print-resume-btn',
    },


    init() {
        this.bindEvents();
    },

    bindEvents() {
        $(document).on('click', this.elements.$printResumeBtn, this.handlePrintResume.bind(this));
    },

    handlePrintResume(event) {
        event.preventDefault();
        const $url = $(event.currentTarget).data('url');

        const printPage = $.get($url);
        this.printResume($url);
    },

    printResume($url) {
        window.open($url, 'Resume Print', this.config.printConfig);
    }
}


$(document).ready(() => {
    // Resume Builder Module Init Code Here
    ResumeBuilderModule.init();
});
