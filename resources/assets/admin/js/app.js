window.toastr = require('toastr');
window.showToastr = function (type, message, title = '') {
    toastr[type](message, title, {
        progressBar: true,
        closeButton: true,
        timeOut: 5000, // milliseconds
    });
};
