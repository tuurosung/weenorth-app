window.summernoteConfig = {
    // Editor settings
    height: 200,
    tabsize: 2,

    // Toolbar configuration
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ],

    // Customize placeholder
    placeholder: 'Start typing...',

    // Callbacks
    callbacks: {
        onInit: function() {
            console.log('Summernote initialized');
        },
        onChange: function(contents) {
            // You can add validation or auto-save logic here
            console.log('Content changed:', contents);
        }
    }
};
