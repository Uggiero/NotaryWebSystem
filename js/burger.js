$(document).ready(function () {
	$('.header__burger,.nav__link').click(function (event) {
		$('.header__burger,.header__nav').toggleClass('active__burger')
		$('body').toggleClass('lock');
	})
})