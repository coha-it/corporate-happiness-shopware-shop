module.exports = {
    root: true,
    env: {
        browser: true,
        jquery: true
    },
    globals: {
        jQuery: true,
        StateManager: true,
        picturefill: true,
        StorageManager: true,
        Modernizr: true,
        Overlay: true,
        Shopware: true,
        Ext: true
    },
    rules: {
        'key-spacing': 2,
        'object-curly-newline': ['error', {'consistent': true}]
    }
};
