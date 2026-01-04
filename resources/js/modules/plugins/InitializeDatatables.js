import DataTable from "datatables.net-bs5";
import 'datatables.net-buttons-bs5';

import 'datatables.net-buttons';
import 'datatables.net-buttons-bs5';

import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';

// Import JSZip first
import jszip from 'jszip';
import { extend } from "jquery";
window.JSZip = jszip;

/**
 * DataTables initialization module
 * Handles automatic initialization of DataTables with consistent configuration
 */
export const InitializeDatatables = {
    /**
     * Default DataTable configuration
     */
    config: {
        // buttons: ['pageLength', 'copy', 'excel', 'pdf', 'print'],
        paging: false,
        // lengthMenu: [25, 50, 100, -1],
        // pageLength: 100,
        layout: {
            topStart: {
                buttons: [
                    {
                        extend: 'excel',
                        text: 'Export to Excel',
                    },
                    {
                        extend: 'print',
                        text: 'Print Table',
                    }
                ]
            }
        },
    },

    /**
     * Initialize all DataTables on the page
     * @param {string} selector - CSS selector for tables (default: '.datatables')
     * @param {Object} customConfig - Optional custom configuration to merge with defaults
     */
    init(selector = '.datatables', customConfig = {}) {

        const $tables = $(selector);


        $tables.each(function () {
            var $this = $(this);

            new DataTable('.datatables', InitializeDatatables.config);
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
// if (typeof $ !== 'undefined' && $.fn.DataTable) {
//     $(document).ready(() => {
//         InitializeDatatables.init();
//     });
// } else {
//     console.warn('jQuery or DataTables not loaded. Skipping auto-initialization.');
// }

$(document).ready(() => {
    InitializeDatatables.init();
});
