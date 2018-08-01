function FormService(selector) {
    this.form = document.querySelector(selector);
}
FormService.prototype.getFormData = function () {
    var formData = new FormData(this.form);
    return formData;
}
FormService.prototype.fillForm = function () { }
FormService.prototype.submit = function (callback) {
    if(typeof callback == 'undefined') {
        console.log('you must specify callback function');
        return false;
    }
    $.ajax({
        contentType: false,
        processData: false,
        data: this.getFormData(),
        success: function (res) {
            if (res) callback(JSON.parse(res));
        }
    })
}