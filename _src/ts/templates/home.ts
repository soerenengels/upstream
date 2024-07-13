// Setup



class Kiosk {
	private kiosk: HTMLElement
	private intervals: number[] = []
	private ticks: number = 0
	private intervalDurationInSeconds: number = 8

	constructor(element?: HTMLElement | undefined) {
		this.kiosk = element ?? document.querySelector<HTMLElement>(".kiosk");
		this.init();
	}

	// TODO
	// A11Y: Prevent motion when preference is set
	get prefersReducedMotion(): boolean {
		return window.matchMedia(`(prefers-reduced-motion: reduce)`).matches === true;
	}

	get handles(): NodeListOf<HTMLElement> {
		return this.kiosk.querySelectorAll(".kiosk__title")
	}

	get views(): NodeListOf<HTMLElement> {
		return this.kiosk.querySelectorAll(".kiosk__card")
	}


	get playState(): "running" | "paused" | "stopped" {
		return this.kiosk.dataset.playState as "running" | "paused" | "stopped";
	}
	set playState(value: "running" | "paused" | "stopped") {
		this.kiosk.dataset.playState = value;
	}

	startInterval() {
		this.intervals.push(setInterval(this.tick.bind(this), 1000));
	}
	clearIntervals() {
		this.intervals.forEach((interval) => {
			clearInterval(interval);
		});
	}
	/** Tick the next view */
	tick() {
		if (this.ticks >= this.intervalDurationInSeconds) {
			this.ticks = 0;
			this.update();
		}
		this.ticks++;
	}

	togglePlayState(): void {
		if (this.playState === "running") {
			this.playState = "stopped";
			this.pause();
		} else {
			this.playState = "running";
			this.play();
		}
	}

	get currentHandle(): HTMLElement {
		return this.kiosk.querySelector(".kiosk__title.active");
	}
	get currentIndex(): number {
		return Array.from(this.views).findIndex((view) => {
			return view.classList.contains("active");
		});
	}
	get nextIndex(): number {
		return this.currentIndex < this.views.length - 1 ? this.currentIndex + 1 : 0;
	}

	public pause(): void {
		this.playState = "paused";
		this.clearIntervals();
		this.ticks = 0;
	}

	public stop(): void {
		this.playState = "stopped";
		this.clearIntervals();
		this.ticks = 0;
	}

	public play(): void {
		this.playState = this.playState === "stopped" ? "stopped" : 'running'

		// trigger a dom reflow to restart animation
		const handle = this.currentHandle
		handle.classList.remove("active")
		void handle.offsetWidth
		handle.classList.add("active")

		if (this.playState === "running") {
			console.log('startInterval')
			this.startInterval()
		}
	}

	/**
	 * Update elements
	 * * to next item (default), or
	 * * to specific index
	 * @param {number|null} index Index of view to change to | null for next view
	 * @returns {void}
	 */
	update(index: number | null = null): void {
		console.log('update')
		if (index === null) {
			index = this.nextIndex;
		}

		// Update active Elements
		this.updateElements(this.handles, index);
		this.updateElements(this.views, index);
	}

	/**
	 * Update elements to index
	 * by updating their classes
	 * @param { NodeListOf<HTMLElement>} elements List of elements to update
	 * @param {number} index Index of view to change to
	 */
	updateElements(
		elements: NodeListOf<HTMLElement>,
		index: number,
		scrollIntoView: boolean = true
	) {
		elements.forEach((element, i) => {
			if (i === index) {
				element.classList.add("active");
				if (scrollIntoView && element.classList.contains("kiosk__card")) element.scrollIntoView({ behavior: "smooth", block: "center" });
			} else {
				element.classList.remove("active");
			}
		});
	}

	init() {
		let timer = null
		const container = this.kiosk.querySelector(".card__container")
		container?.addEventListener("scroll", () => {
			// Debounce function call
			clearTimeout(timer);
    	timer = setTimeout(function () {
				this.views?.forEach((view: HTMLElement, index) => {
					// Calculate Tops of Views and Container
					const viewTop = view.getBoundingClientRect().top
					const containerTop = container.getBoundingClientRect().top
					const isCurrentView = viewTop - containerTop <= 10

					// Skip if this is not the current View
					if (!isCurrentView) return
					this.pause()
					this.updateElements(this.handles, index, false);
					this.updateElements(this.views, index, false);
					/* console.log("index " + index + " is current view") */
				})
			}.bind(this), 100);
		})
		this.handles.forEach((handle, index) => {
			if (!this.prefersReducedMotion) {
				handle.addEventListener("mouseover", () => {
					if (handle.classList.contains("active")) {
						this.pause();
					}
				});
				handle.addEventListener("mouseout", (event) => {
					if (handle.classList.contains("active")) {
						this.play();
					}
				});
			}
			handle.addEventListener("click", () => {
				this.update(index);
			});
			handle.addEventListener("focusin", () => {
				this.update(index);
			});

		})
		this.kiosk.querySelector(".kiosk__play-indicator")?.addEventListener("click", (event) => {
			this.togglePlayState()
		})

		if(!this.prefersReducedMotion) {
			this.play()
		}
	}
}

const kiosk = new Kiosk()
