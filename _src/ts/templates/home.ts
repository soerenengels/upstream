console.log("hi2!")

/** Rotation duration in milliseconds */
const rotationDuration = 7000
let playState: "running"|"paused" = 'running'

// Start rotating through views
let interval = setInterval(tickView, rotationDuration)

const views = document.querySelectorAll('.kiosk__card')
const handles = document.querySelectorAll<HTMLElement>('.kiosk__title')

// TODO
// A11Y: Prevent motion when preference is set

// Make Handles interactive
handles.forEach((handle, index) => {
	handle.addEventListener('mouseover', (event) => {
		console.log('mouseover: ', index)
		handle.querySelector('button').style.animationPlayState = 'paused';
		clearInterval(interval)
	})
	handle.addEventListener('mouseout', (event) => {
		console.log('mouseout: ', index)
		const button = handle.querySelector('button')
		button.style.animationPlayState = 'running';
		if(playState === 'paused') return
		interval = setInterval(tickView, rotationDuration)
	})

	const carousel = document.querySelector<HTMLElement>('.kiosk')
	carousel.addEventListener('focusin', (event) => {
		console.log('focusin ')
		clearInterval(interval)
		playState = 'paused'
	})
	carousel.addEventListener('focusout', (event) => {
		/* playState = 'running'
		console.log('focusout ') */
	})


	// Change view on click
	handle.addEventListener('click', (e) => {
		change(index)
	})

})



/** Tick the next view */
function tickView() {
	let currentView = getCurrentView();
	let nextView = currentView < handles.length - 1 ? currentView + 1 : 0
	change(nextView)
}

/** Get the index of active view */
function getCurrentView(): number {
	return Array.from(views).findIndex((view) => {
		return view.classList.contains('active')
	})
}

/** Change both: handle and view */
function change(id: number) {
	changeView(id)
	changeHandle(id)
}

/** Change view */
function changeView(id: number) {
	views.forEach((view, index) => {
		if (index === id) {
			view.classList.add('active')
		} else {
			view.classList.remove('active')
		}
	})
}

/** Change handle */
function changeHandle(id: number) {
	handles.forEach((handle, index) => {
		if (index === id) {
			handle.classList.add('active')
		} else {
			handle.classList.remove('active')
		}
	})
}
