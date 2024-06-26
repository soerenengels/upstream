/* Menü-Anzeige togglen */
function toggleMenu() {
	const menuOverlay = document.querySelector(".menu__overlay");

	// Toggle Menu Overlay
	if (menuOverlay == null) return
	menuOverlay.classList.toggle("active");

	if (menuOverlay.classList.contains('active')) {
		// Set Focus to Search on Toggle
		console.log(document.getElementById('nav__search'))
		let el = document.getElementById('nav__search')
		if (el) {
			setTimeout(() => {
				el.focus()
			}, 200)
		} else {
			console.log('Element not found')
		}


		// Set Event Handler for Click outside of menu
		menuOverlay.addEventListener("blur", (event) => {
			menuOverlay.classList.toggle("active");
		});
	}
}



/* Cards markierbar machen */

const cards = document.querySelectorAll('.card');
console.log(cards)
/* Array.prototype.forEach.call(cards, card => {
    let down: number, up: number, link: HTMLElement = card.querySelector('a');
    card.style.cursor = 'pointer';
    card.onmousedown = () => down = +new Date();
    card.onmouseup = () => {
        up = +new Date();
        if ((up - down) < 2000) {
            link.click();
        }
    }
}); */

/* Poll / Umfrage / Bullet-Items */
function setBulletItem(i: string, selectors: [string]) {

	selectors.forEach((selector) => {

		// Get Bullet Items
		let bulletItems = document.querySelectorAll(selector) as NodeListOf<HTMLElement> | null;
		if (bulletItems == null) return;

		// Set Class to .active for Bullet Item
		bulletItems.forEach((item, index, arr) => {
			item.classList.toggle('active', arr[parseInt(i) - 1] == item)
		});
	})

	setBulletNavigation(i);
}

/* Bullet-Navigation */
function setBulletNavigation(number: string) {

	// Set Counter
	const bulletCounter = document.querySelector(
		".bullet__counter span:first-of-type"
	);
	if (bulletCounter == null) return;
	bulletCounter.textContent = number;

	// Set Indicator
	const bulletIndicators = document.querySelectorAll(
		".bullet__indicator"
	) as NodeListOf<Element>;
	if (bulletIndicators == null) return;
	bulletIndicators.forEach((indicator) => {
		indicator.classList.remove("active");
	});
	const currentIndicator = document.querySelector(
		`.bullet__indicator[data-poll-item="${number}"]`
	);
	if (currentIndicator == null) return;
	currentIndicator.classList.add("active");

	// TOC
	if (document.querySelector(".poll__toc") == null) return;
	document.querySelectorAll(".poll__toc li").forEach((li) => {
		li.classList.remove("active");
	});
	const currentTOC = document.querySelector(
		`.poll__toc li[data-poll-item="${number}"]`
	);
	if (currentTOC == null) return;
	currentTOC.classList.add("active");
}

/* Startseite: Hero */
/* const heroButtons = document.getElementsByClassName("hero__title"); */
// if (heroButtons.length > 0) {
	/* const mediaQuery = window.matchMedia("(prefers-reduced-motion: reduce)");
	mediaQuery.addEventListener("change", () => {
		if (mediaQuery.media == "(prefers-reduced-motion: reduce)") toggleTimer("PAUSE");
	}); */

	/* const heroViews = document.getElementsByClassName("hero__view");
	const navigationButtons = document.querySelectorAll(".hero__storyHandle");
	const currentButton = () =>
		document.querySelector(".hero__title.active") as HTMLButtonElement;
	const activeView = () => document.querySelector(".hero__view.active");
	let timers = [];
	let paused = false;
	const destroyTimers = () => {
		timers.forEach((timer) => clearTimeout(timer));
		timers = [];
	}
	const timeoutFn = () => {
		if (paused) return;
		destroyTimers();
		const nextViewId = parseInt(currentButton().getAttribute("data-hero-id"));
		changeView(nextViewId < heroButtons.length ? nextViewId : 0);
		startTimer();
	}
	const startTimer = () => {
		timers.push(setTimeout(timeoutFn, 5200));
	}; */
	/* timers.push(startTimer()); */
	/* for (let i = 0; i < heroButtons.length; i++) {
		heroButtons[i].addEventListener("click", (e) => {
			changeView(i);
			destroyTimers();
			if (paused) return;
			startTimer();
		});
	} */
/* 	const setAnimationDirection = (currentElementId, nextElementId) => {
		// if currentElementId > nextElementId
		// move down (or right)
		// else if currentElementId < nextElementId
		// move up (or left)
		// start animation
	} */
/* 	for (let i = 0; i < heroButtons.length; i++) {
		navigationButtons[i].addEventListener("click", (e) => {
			changeView(i);
			destroyTimers();
			if (paused) return;
			startTimer();
		});
	}
	function activateButton(selectedButtonId:number) {
		const button = currentButton();
		if (button === null) return
		button.classList.remove("active");
		button.classList.remove("timer");
		heroButtons[selectedButtonId].classList.add("active");
		heroButtons[selectedButtonId].classList.add("timer");
	}
	function resetAnimationClass(el:HTMLElement, className:string) {
		el.classList.remove(className);
	}
	function activateView(id:number) {
		const currentView = activeView() as HTMLElement | null;
		const nextView = heroViews[id];
		if (currentView == null || currentView.dataset.heroId == undefined) return;
		currentView.ariaHidden = "true";
		currentView.classList.add("prev");
		currentView.classList.remove("active");
		// TODO: ADD ANIMATION DEPENDING ON NUMBER OF ID
		// IF id HIGHER THAN currentView.dataset.heroId
		// do that
		// else
		// do this
		setTimeout(() => {
			nextView.classList.add("next");
			nextView.classList.add("active");
			nextView.ariaHidden = "false";
		}, 150);
	}
	function activateNavigation(id: number) {
		const currentNavigationButton = document.querySelector(
			".hero__storyHandle.active"
		);
		currentNavigationButton?.classList.remove("active");
		navigationButtons[id].classList.add("active");
	}
	function changeView(id) {
		activateButton(id);
		activateNavigation(id);
		activateView(id);
	}
	function toggleTimer(state = 'TOGGLE') {
		const button = document.querySelector(".hero__play") as HTMLButtonElement;
		switch (state) {
			case "PLAY":
				paused = false;
				currentButton().classList.remove("paused");
				button.innerText = "Pause";
				// TODO: reset status bar to beginning
				startTimer();
				break;
			case "PAUSE":
				paused = true;
				currentButton().classList.add("paused");
				button.innerText = "Play";
				break;
			case "TOGGLE":
			default:
				if (paused == true) {
					toggleTimer("PLAY");
				} else {
					toggleTimer("PAUSE");
				}
		}

	}
} */



/* function setHeroNavigation(cardId: Number) {
	const heroIndicators = document.querySelectorAll(
			".hero__indicator"
	) as NodeListOf<HTMLElement>;
	if (heroIndicators == null) return;
	const heroCounter = document.querySelector(
		".hero__indicator--counter span:first-of-type"
	) as Node;
	heroIndicators.forEach((el) => {
		el.dataset.heroIndicator = el.dataset.heroId == cardId.toString() ? "true" : "false";
		heroCounter.textContent = cardId.toString();
	});
} */


/* Startseite: Hero: gezielter Kartenwechsel */
/* function setActiveCard(id: number): void {
	console.log('tick');
	const cards = pollItems;
	if(cards == null) return;
	console.log(cards);

	const currentCard = (id > cards.length ? 1 : id);
	cards.forEach((card) => {
			card.dataset.heroIndicator = (parseInt(card.dataset.heroId as string) != currentCard) ? "false" : "true";
	});
	setHeroNavigation(currentCard);

  	// Nur bei Umfragen (mit Table of Content) ausführen
  	if (document.querySelector(".umfrage__toc") == null) return;
    document.querySelectorAll(".umfrage__toc li").forEach((el) => {
      	el.classList.remove("strong");
    });
	const currentTOC = document.querySelector(`.umfrage__toc li[data-hero-id="${currentCard}"]`);
	if (currentTOC == null) return;
    currentTOC.classList.add("strong");
} */

/*********************************** */


/*********************************** */

/* Startseite: Hero: Rotation um 1 */
/* function rotateHero(step = 1) {
	const indicatorElement = document.querySelector('.hero__item[data-hero-indicator="true"]') as HTMLElement || null;
	if (indicatorElement == null) return;
  	let currentIndex = parseInt(indicatorElement.dataset.heroId || "0");
	const nextIndex = currentIndex++;
  	setActiveCard(nextIndex);
}
 window.onload = function () {
	if (document.querySelector(".hero__navigation")) {
		const heroIndicators = document.querySelectorAll(".hero__indicator") as NodeListOf<HTMLElement> || null;
		heroIndicators.forEach((el) => {
			const currentId = el.dataset.heroId || "0";
			el.addEventListener("focus", () => {
				//setActiveCard(i);
				setHeroNavigation(parseInt(currentId));
			});
			el.addEventListener("click", () => {
				setActiveCard(parseInt(currentId));
			});
		});
	}
} */



/* window.onload = function () {
	if (document.querySelector(".hero__navigation")) {
		const heroIndicators = document.querySelectorAll(".hero__indicator") as NodeListOf<HTMLElement> || null;
		heroIndicators.forEach((el) => {
			const currentId = el.dataset.heroId || "0";
			el.addEventListener("focus", () => {
				//setActiveCard(i);
				setHeroNavigation(parseInt(currentId));
			});
			el.addEventListener("click", () => {
				setActiveCard(parseInt(currentId));
			});
		});
	}

	// pause hero on :hover
	const heroCards = document.querySelectorAll(".hero__card");
	let wasStopped = false;
	heroCards.forEach((card) => {
		card.addEventListener("mouseover", () => {
			if (getAutoplayState() == "false") {
		wasStopped = true;
		return
			}
		heroStopAutoplay();
		}, { once: false });
		card.addEventListener("mouseout", () => {
		if (wasStopped == false) {
			heroStartAutoplay();
		}
		wasStopped = false;
		}, { once: false });
	});
	}; */

// window.onload = check for following:
// Falls heroAutoplayState == true (und damit eingebaut)
// und nicht reduzierte Animationen bevorzugt
// starte Autoplay
/* const heroStartInterval = () => {
  if (getAutoplayElement() != null) {
		return setInterval(rotateHero, 6000);
  }
};
const heroStopInterval = () => clearInterval(heroAutoplay);
let heroAutoplay = heroStartInterval();

function getAutoplayElement() {
	return document.querySelector(".hero__indicator--autoplay") as HTMLElement;
}
function getAutoplayState() {
	let el = getAutoplayElement();
	if (el) {
		return el.dataset.heroAutoplayState;
	}
}
function setAutoplayState(state = !getAutoplayState()) {
	const el = getAutoplayElement() as HTMLElement ;
	el.children[0].textContent = (state == true ? "Pause" : "Play");
	el.dataset.heroAutoplayState = state.toString();
}
function heroStartAutoplay() {
  setAutoplayState(true);
  return (heroAutoplay = heroStartInterval());
}
function heroStopAutoplay() {
  heroStopInterval();
  setAutoplayState(false);
}
function heroToggleAutoplay() {
  if (getAutoplayState() == "true") {
    heroStopAutoplay();
  } else {
    heroStartAutoplay();
  }
}

let selectorHeadlineSections = ".hero__item_v2";

function getAllPictures() {
	return document.querySelectorAll(".hero_v2 pictures");
}
function showImageWithId(id:number) {
	let pictures:any = getAllPictures();
	for (let i = 0; i < pictures.length; i++) {
		if (i == id) {
			pictures.style.display = "none";
		}
	}
}
const getAllDetails = () => {
	return document.querySelectorAll(".hero__item_v2 details");
}

const getActiveDetail = () => {
	let details:any = getAllDetails();
	for (let i = 0; i < details.length; i++) {
		if (details[i].open == true) {
			return details[i];
		}
	}
}
let timeoutFn = () => {
	getActiveDetail().open = false;
	// nextSlide
	// new timeoutFn()
	let sections:any = document.querySelectorAll(selectorHeadlineSections + " details");
	for (let i = 0; i < sections.length; i++) {
    	console.log(sections[i].open);
  	}
	startAutoplay();
}
let timer:any;
const startAutoplay = () => {
	timer = setTimeout(timeoutFn, 5000);
}
const stopAutoplay = () => {
	clearTimeout(timer);
} */
/* window.onload = function ()  {
	startAutoplay();
} */

// If Keyboard-Focus within SummaryWrapper
// Stop Autoplay
// OnFocus of Summary Open Details
