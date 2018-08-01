$.ajaxSetup({
    url: '/verdi/',
    type: 'POST'
});
$(document).ready(function () {
    $('[data-autocomplete]').each(function () {
        prepareAutocompletes.call(this);
    });
    $('#toggle-btn').on('click', function (e) {
        e.preventDefault();
        if ($(window).outerWidth() > 1194) {
            $('nav.side-navbar').toggleClass('shrink');
            $('.page').toggleClass('active');
        } else {
            $('nav.side-navbar').toggleClass('show-sm');
            $('.page').toggleClass('active-sm');
        }
    });
});
function deleteItem(id, target) {
	$.ajax({
		data: {
			route: 'dashboard/' + target,
			name: 'delete',
			id: id
		},
		success: function(res) {
			if(res) {
				res = JSON.parse(res);
				if (!res.response.error) {
                    $('[data-' + target + '=' + id + ']').remove();
                } else {
                    $('#alertModal2').find('.response-message').text(res.response.status);
                    $('#alertModal2').modal('show');
                }
			}
		}
	})
}
function createItem(target) {
    var fs = new FormService('.new-' + target + '-form');
    fs.submit(function(res) {
            $('#new' + target + 'Modal').modal('hide');
            if (!res.response.error) $('#' + target + 'Page').replaceWith(res.response.message);
            $('#alertModal2').find('.response-message').text(res.response.status);
            $('#alertModal2').modal('show');
    });
}