/**
 * Advanced Tab State Management for Bootstrap 5
 * Handles both regular tabs and form wizard tabs
 */

class TabStateManager {
    constructor(options = {}) {
        this.options = {
            storagePrefix: 'tab_state_',
            enableLogging: true,
            restoreDelay: 100,
            ...options
        };

        this.init();
    }

    init() {
        this.setupEventListeners();
        this.restoreTabState();
        this.handleUrlHash();
    }

    /**
     * Generate storage key based on current page
     */
    getStorageKey() {
        const currentPage = window.location.pathname;
        return this.options.storagePrefix + currentPage.replace(/\//g, '_');
    }

    /**
     * Save active tab to localStorage
     */
    saveActiveTab(tabId, additionalData = {}) {
        const storageKey = this.getStorageKey();
        const tabData = {
            tabId: tabId,
            timestamp: Date.now(),
            url: window.location.href,
            ...additionalData
        };

        try {
            localStorage.setItem(storageKey, JSON.stringify(tabData));
            if (this.options.enableLogging) {
                console.log('Tab state saved:', tabData);
            }
        } catch (error) {
            console.error('Failed to save tab state:', error);
        }
    }

    /**
     * Get saved active tab from localStorage
     */
    getSavedActiveTab() {
        const storageKey = this.getStorageKey();
        try {
            const tabData = localStorage.getItem(storageKey);
            return tabData ? JSON.parse(tabData) : null;
        } catch (error) {
            console.error('Failed to retrieve tab state:', error);
            return null;
        }
    }

    /**
     * Activate a specific tab
     */
    activateTab(tabId) {
        if (!tabId) return false;

        // Try different selectors for Bootstrap tabs
        const selectors = [
            `a[href="${tabId}"]`,
            `a[data-bs-target="${tabId}"]`,
            `button[data-bs-target="${tabId}"]`,
            `.nav-link[href="${tabId}"]`
        ];

        for (const selector of selectors) {
            const $tabTrigger = $(selector);
            if ($tabTrigger.length) {
                try {
                    // Use Bootstrap 5 Tab API
                    const tabElement = $tabTrigger[0];
                    const tab = new bootstrap.Tab(tabElement);
                    tab.show();

                    if (this.options.enableLogging) {
                        console.log('Tab activated:', tabId);
                    }
                    return true;
                } catch (error) {
                    console.error('Failed to activate tab:', error);
                }
            }
        }

        return false;
    }

    /**
     * Setup event listeners for tab changes
     */
    setupEventListeners() {
        // Listen for Bootstrap tab events
        $(document).on('shown.bs.tab', 'a[data-bs-toggle="tab"], a[data-bs-toggle="pill"], button[data-bs-toggle="tab"], button[data-bs-toggle="pill"]', (e) => {
            const activeTabId = $(e.target).attr('href') || $(e.target).attr('data-bs-target');
            if (activeTabId) {
                this.saveActiveTab(activeTabId, {
                    triggerElement: e.target.tagName,
                    triggerClass: e.target.className
                });
            }
        });

        // Listen for custom wizard tab events
        $(document).on('wizard:tab:changed', (e, data) => {
            if (data && data.tabId) {
                this.saveActiveTab(data.tabId, {
                    wizardStep: data.step,
                    wizardType: 'custom'
                });
            }
        });

        // Listen for hash changes
        $(window).on('hashchange', () => {
            this.handleUrlHash();
        });

        // Listen for page visibility changes (optional - restore tabs when page becomes visible)
        if (typeof document.visibilityState !== 'undefined') {
            document.addEventListener('visibilitychange', () => {
                if (!document.hidden) {
                    // Page became visible, restore tab state if needed
                    setTimeout(() => this.restoreTabState(), 50);
                }
            });
        }
    }

    /**
     * Restore tab state on page load
     */
    restoreTabState() {
        const savedTabData = this.getSavedActiveTab();

        if (savedTabData && savedTabData.tabId) {
            // Add delay to ensure DOM is ready
            setTimeout(() => {
                if (this.activateTab(savedTabData.tabId)) {
                    if (this.options.enableLogging) {
                        console.log('Tab state restored:', savedTabData);
                    }
                } else {
                    if (this.options.enableLogging) {
                        console.log('Could not restore tab:', savedTabData.tabId);
                    }
                }
            }, this.options.restoreDelay);
        }
    }

    /**
     * Handle URL hash-based navigation
     */
    handleUrlHash() {
        const hash = window.location.hash;
        if (hash && hash.length > 1) {
            setTimeout(() => {
                if (this.activateTab(hash)) {
                    this.saveActiveTab(hash, {
                        source: 'url_hash'
                    });
                }
            }, this.options.restoreDelay + 50);
        }
    }

    /**
     * Clear saved tab state for current page
     */
    clearTabState() {
        const storageKey = this.getStorageKey();
        try {
            localStorage.removeItem(storageKey);
            if (this.options.enableLogging) {
                console.log('Tab state cleared for:', storageKey);
            }
        } catch (error) {
            console.error('Failed to clear tab state:', error);
        }
    }

    /**
     * Get all saved tab states
     */
    getAllTabStates() {
        const tabStates = {};
        const prefix = this.options.storagePrefix;

        for (let i = 0; i < localStorage.length; i++) {
            const key = localStorage.key(i);
            if (key && key.startsWith(prefix)) {
                try {
                    const data = localStorage.getItem(key);
                    tabStates[key] = JSON.parse(data);
                } catch (error) {
                    console.error('Failed to parse tab state:', error);
                }
            }
        }

        return tabStates;
    }

    /**
     * Clean old tab states (older than specified days)
     */
    cleanOldTabStates(daysOld = 7) {
        const cutoffTime = Date.now() - (daysOld * 24 * 60 * 60 * 1000);
        const prefix = this.options.storagePrefix;
        const keysToRemove = [];

        for (let i = 0; i < localStorage.length; i++) {
            const key = localStorage.key(i);
            if (key && key.startsWith(prefix)) {
                try {
                    const data = JSON.parse(localStorage.getItem(key));
                    if (data.timestamp && data.timestamp < cutoffTime) {
                        keysToRemove.push(key);
                    }
                } catch (error) {
                    // If we can't parse it, it's probably old/corrupt, remove it
                    keysToRemove.push(key);
                }
            }
        }

        keysToRemove.forEach(key => {
            localStorage.removeItem(key);
            if (this.options.enableLogging) {
                console.log('Removed old tab state:', key);
            }
        });

        return keysToRemove.length;
    }
}

// Initialize tab state manager when DOM is ready
$(document).ready(function() {
    // Create global instance
    window.tabStateManager = new TabStateManager({
        enableLogging: true, // Set to false in production
        restoreDelay: 100
    });

    // Clean old tab states on page load (once per session)
    if (!sessionStorage.getItem('tabStatesCleaned')) {
        const removedCount = window.tabStateManager.cleanOldTabStates(7);
        sessionStorage.setItem('tabStatesCleaned', 'true');
        if (removedCount > 0) {
            console.log(`Cleaned ${removedCount} old tab states`);
        }
    }
});

// Export for module usage if needed
if (typeof module !== 'undefined' && module.exports) {
    module.exports = TabStateManager;
}
