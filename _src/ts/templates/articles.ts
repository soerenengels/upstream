const element = document.querySelector('.article__grid.all-articles')
const button  = (document.querySelector('button.load-more') as HTMLElement)
let page      = parseInt(element?.getAttribute('data-page') ?? '')

const fetchArticles = async () => {
  let url = `${window.location.href.split('#')[0]}.json/page:${page}` // see info
	if (!button || !element) return
  try {
    const response       = await fetch(url);
    const { html, more } = await response.json();
    button.hidden        = !more ?? false;
    element.insertAdjacentHTML('beforeend', html);
    page++;
  } catch (error) {
    console.log('Fetch error: ', error);
  }
}

button?.addEventListener('click', fetchArticles);

/* Observe Load more button */
let options = {
  root: null,
  rootMargin: "100px",
  threshold: 1.0,
};

let observer = new IntersectionObserver(fetchArticles, options);

observer.observe(button)
