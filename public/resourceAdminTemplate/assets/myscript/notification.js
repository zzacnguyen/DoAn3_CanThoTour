$(document).ready(function () {
	load_notification();
	setInterval(function () {
		load_notification();
	},5000);
})

function load_notification() {
	$.ajax({
		url:'get-event-admin',
		type: 'GET'
	})
	.done(function (data) {
		console.log(data);
		var item = new String;
		for (var i = 0; i < data.length; i++) {
			item += '<li>';
			item += '<span class="bg-danger icon-notification glyph-icon icon-bullhorn"></span>';
			item += '<span class="notification-text">'+ data[i].event_name +'</span>';
			item += '</li>';
		}
			
		$('#id-notifications').html(item);
	})
}