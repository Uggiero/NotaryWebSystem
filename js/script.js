//slider
$(document).ready(function () {
	$('.slider').slick({
		dots: true,
		adaptiveHeigh: true,
		speed: 1000,
		autoplay: true,
		autoplaySpeed: 10000,
		appendDots: $('.slider__dots'),
	})
});

//button toTop
$(window).scroll(function () {
	const srolled = $(window).scrollTop()
	if (srolled > 300) {
		$('.link__top').addClass('link__active');
	} else {
		$('.link__top').removeClass('link__active');
	}
})
$('.link__top').click(function () {
	$('body,html').animate({ scrollTop: 0 }, 500)
})

//burger
$(document).ready(function () {
	$('.header__burger,.nav__link').click(function (event) {
		$('.header__burger,.header__nav').toggleClass('active__burger')
		$('body').toggleClass('lock');
	})
})

//yakor
document.querySelectorAll('a.yakor').forEach(link => {
	link.addEventListener('click', function (e) {
		e.preventDefault()
		const href = this.getAttribute('href').substring(1)
		const scrollTarget = document.getElementById(href)
		const topOffset = 0
		const elementPosition = scrollTarget.getBoundingClientRect().top
		const offsetPosition = elementPosition - topOffset
		window.scrollBy({
			top: offsetPosition,
			behavior: 'smooth',
		})
	})
})


//questions

const questions = document.querySelectorAll('.questions__item')
const questionsText = document.querySelectorAll('.questions__text')
const questionsImage = document.querySelectorAll('.questions__image')
const questionsImageActive = document.querySelectorAll('.questions__image-active')

for (let i = 0; i < questions.length; i++) {
	questions[i].addEventListener('click', () => {
		if (questionsText[i].style.display == 'block') {
			closeQuestions()
		}
		else {
			closeQuestions()
			questionsText[i].style.display = 'block'
			questionsImage[i].style.display = 'none'
			questionsImageActive[i].style.display = 'block'
		}
	})
}
function closeQuestions() {
	for (let i = 0; i < questions.length; i++) {
		questionsText[i].style.display = 'none'
		questionsImageActive[i].style.display = 'none'
		questionsImage[i].style.display = 'block'
	}
}


//Copyright
copyright()
function copyright() {
	const date = new Date
	const curentYear = date.getFullYear()
	const copyright = document.querySelector('.copyright__span')
	copyright.innerHTML = curentYear;
}

//more
const newsItems = document.querySelector('.news__items')
const newsItemsMore = newsItems.style.height;
const textButton = document.querySelector('.news__button')
newsItems.style.height = "400px"
let counter = 0;
function more() {
	if (!counter) {
		newsItems.style.height = newsItemsMore
		textButton.innerHTML = "Менше новин"
		counter++;
	} else {
		newsItems.style.height = "400px";
		textButton.innerHTML = "Усі новини"
		counter--;
	}
}

//popup
const popupLink = document.querySelector('.order__button')
const body = document.querySelector('body')
const curentPopup = document.querySelector('.popup')
const closePopup = document.querySelectorAll('.close__popup')

if (popupLink) {
	popupLink.addEventListener("click", () => {
		popupOpen(curentPopup)
	})
}

if (closePopup) {
	for (let i = 0; i < closePopup.length; i++) {
		closePopup[i].addEventListener('click', (e) => {
			popupClose(closePopup[i].closest('.popup'))
			e.preventDefault()
		})
	}
}

function popupOpen(curentPopup) {
	if (curentPopup) {
		curentPopup.classList.add('open')
		curentPopup.addEventListener('click', (element) => {
			if (!element.target.closest('.popup__content')) {
				popupClose(element.target.closest('.popup'))
			}
		})
	}
}

function popupClose(popupActive) {
	popupActive.classList.remove('open')
}

//popup form
const popupForm = document.querySelector('.popup__form')
if (popupForm)
	popupForm.addEventListener('submit', formSend)

async function formSend(element) {
	element.preventDefault()
	let error = formValidate(popupForm)
	let formData = new FormData(popupForm)
	if (!error) {
		document.querySelector('.popup__body').classList.add('_sending')
		let response = await fetch('../include/sendmail.php', {
			method: 'POST',
			body: formData,
		})
		if (response.ok) {
			let result = await response.json()
			alert(result.message)
			popupForm.reset()
			document.querySelector('.popup__body').classList.remove('_sending')
			popupClose(curentPopup)
		} else {
			alert('Помилка при відпраці форми!')
			document.querySelector('.popup__body').classList.remove('_sending')
			popupClose(curentPopup)
		}
	}
}

function formValidate(element) {
	let error = 0
	let formReq = document.querySelectorAll('._req')

	for (let i = 0; i < formReq.length; i++) {
		formRemoveError(formReq[i])

		if (formReq[i].classList.contains('_email')) {
			if (emailValidate(formReq[i])) {
				formAddError(formReq[i])
				error++
			}
		} else if (formReq[i].value === '') {
			formAddError(formReq[i])
			error++
		}
	}
	return error
}
function formAddError(input) {
	input.parentElement.classList.add('_error')
	input.classList.add('_error')
}
function formRemoveError(input) {
	input.parentElement.classList.remove('_error')
	input.classList.remove('_error')
}
function emailValidate(elemet) {
	return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(elemet.value);
}

//Map

let x = 46.5780985;
let y = 30.7939351;

var map = L.map('map').setView([x, y], 17);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([x, y]).addTo(map)
	.bindPopup('Головній офіс')
	.openPopup();


