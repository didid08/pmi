$("#tambah-anggota-wizard").steps({
	headerTag: "h3",
	bodyTag: "section",
	transitionEffect: "slideLeft",
	autoFocus: true,
	onFinished: function (event, currentIndex) {
		$("#tambah-anggota-form").submit();
	}
});

$("#tambah-instansi-wizard").steps({
	headerTag: "h3",
	bodyTag: "section",
	transitionEffect: "slideLeft",
	autoFocus: true,
});

/*$("#tambah-moderator-wizard").steps({
	headerTag: "h3",
	bodyTag: "section",
	transitionEffect: "slideLeft",
	autoFocus: true,
});*/

$("#tambah-admin-wizard").steps({
	headerTag: "h3",
	bodyTag: "section",
	transitionEffect: "slideLeft",
	autoFocus: true,
});