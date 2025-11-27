/**
 * DataTables initialization module
 * Handles automatic initialization of DataTables with consistent configuration
 */
export const InitializeDatatables = {
    /**
     * Default DataTable configuration
     */
    config: {
        sorting: false,
        paging: true,
        stateSave: true,
        pageLength: 10,
        responsive: true,
        buttons: [
            {
                extend: 'print',
                className: 'btn btn-default',
            },
            {
                extend: 'csv',
                className: 'btn btn-default',
            },
        ],
        language: {
            search: '',
            searchPlaceholder: 'Search...',
        },
    },

    /**
     * Initialize all DataTables on the page
     * @param {string} selector - CSS selector for tables (default: '.datatables')
     * @param {Object} customConfig - Optional custom configuration to merge with defaults
     */
    init(selector = '.datatables', customConfig = {}) {

        const $tables = $(selector);

        if ($tables.length === 0) {
            console.warn(`No tables found with selector: ${selector}`);
            return;
        }

        $tables.each((index, table) => {
            if (!this.isInitialized(table)) {
                this.initializeTable(table, customConfig);
            }
        });
    },

    /**
     * Check if a table is already initialized as a DataTable
     * @param {HTMLElement} table - The table element to check
     * @returns {boolean}
     */
    isInitialized(table) {
        return $.fn.DataTable.isDataTable(table);
    },

    /**
     * Initialize a single table as a DataTable
     * @param {HTMLElement} table - The table element to initialize
     * @param {Object} customConfig - Optional custom configuration
     */
    initializeTable(table, customConfig = {}) {
        try {
            const config = { ...this.config, ...customConfig };
            $(table).DataTable(config);
        } catch (error) {
            console.error('Failed to initialize DataTable:', error, table);
        }
    },

    /**
     * Destroy and reinitialize all DataTables
     * @param {string} selector - CSS selector for tables
     */
    reinit(selector = '.datatables') {
        $(selector).each((index, table) => {
            if (this.isInitialized(table)) {
                $(table).DataTable().destroy();
            }
        });

        this.init(selector);
    },
};

// Auto-initialize on DOM ready
if (typeof $ !== 'undefined' && $.fn.DataTable) {
    $(document).ready(() => {
        InitializeDatatables.init();
    });
} else {
    console.warn('jQuery or DataTables not loaded. Skipping auto-initialization.');
}
