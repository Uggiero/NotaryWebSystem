//questions
const questions = document.querySelectorAll('.questions__item')
const questionsText = document.querySelectorAll('.questions__text')

for (let i = 0; i < questions.length; i++) {
	questions[i].addEventListener('click', () => {
		if (questionsText[i].style.display == 'block') {
			closeQuestions()
		}
		else {
			closeQuestions()
			questionsText[i].style.display = 'block'
		}
	})
}
function closeQuestions() {
	for (let i = 0; i < questions.length; i++) {
		questionsText[i].style.display = 'none'
	}
}
