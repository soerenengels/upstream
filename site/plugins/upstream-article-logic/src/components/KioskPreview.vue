<template>
    <div class="kiosk">
        <div class="kiosk__backdrop">
        </div>
        <p class="kiosk__headline h1">
            {{ headline }}
        </p>
        <section class="kiosk__shelf">
        </section>
        <p class="kiosk__exit">
            <a href="/artikel">
                Alle Artikel anzeigen &rarr;
            </a>
        </p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            headline: this.content.upstream_kiosk_headline,
        }
    },
  computed: {
    cover() {
        return shelf[0];
    },
    headline() {
      if (this.content.upstream_format_select == "Selbst eintragen") {
        return this.content.upstream_format_title
      }
      return this.content.upstream_format_select
    }
  }
};
/*
<div class="kiosk__image">
        <?php
            $item = $articles->first();

            $image = $item->cover()->first()->toFile();
        ?>
        <picture v-if="image">
            <?php
                $alt = $image->alt() ?? '';
                $height = $image->height() ?? '';
                $width = $image->width() ?? '';
            ?>
            <img
                src="<?= $image->resize(500)->url() ?>"
                alt="<?= $alt ?>"
                height="<?= $height ?>"
                width="<?= $width ?>"
                <?= e($image->cropselect()->isNotEmpty(), 'style="object-position: ' . $image->cropselect() . '"')?>>
        </picture>

    </div>


    <section class="kiosk__teaser">
        <p class="h1">
            {{ cover.title }}
        </p>
        <p>
            {{ cover.teaser }}
            <a
                :href="cover.url"> &rarr; Lesen</a>
        </p>
    </section>

    <p class="kiosk__headline h1">
        {{ headline }}
    </p>

    <section class="kiosk__shelf">

        <!-- <?php foreach ($articles->not($articles->first()) as $article): ?> -->
        <a
            v-for="item in shelf"
            v-bind="items"
            class="kiosk__title"
            :href="item.url">
            {{ item.title }}
        </a>

    </section>

    <p class="kiosk__exit">
        <a href="/artikel">
            Alle Artikel anzeigen &rarr;
        </a>
    </p>
*/
</script>


<style lang="postcss" scoped>

.kiosk__backdrop {
    background: url('../assets/kiosk.png');
    background-size: contain;
    background-repeat: no-repeat;
    filter: blur(.2em);
    grid-area: 1 / 1 / -1 / -1;
    z-index: 1;
}

.kiosk {
    color: var(--clr-green-100);
    display: grid;
	font-size: var(--font-size-normal);
	gap: .25rem;
    aspect-ratio: 16 / 9;
        grid-template-areas:
				"cover headline"
				"cover shelf"
				"cover exit";
        grid-template-columns: 2fr 1fr;
        font-size: var(--font-size-xl);
        grid-template-rows: auto 1fr auto;
}

.kiosk__headline {
	grid-area: headline;
	color: var(--clr-green-999);
	line-height: 1.1;
	text-align: right;
	font-weight: 900;
    padding: .5rem .5em 1em;
    z-index: 10;
}

.kiosk__shelf {
	grid-area: shelf;
	display: grid;
	gap: .25rem;
    background: var(--background, var(--clr-green-500));
	color: var(--color, var(--clr-green-999));
    z-index: 10;
	@media (--viewport-xsmall) {
        & {
			grid-template-columns: 1fr 1fr;
        }
    }
	@media (--viewport-small) {
        & {
			grid-template-columns: 1fr;
        }
    }
}
.kiosk__exit {
	grid-area: exit;
	color: var(--clr-green-999);
	font-size: var(--font-size-s);
	text-align: right;
    z-index: 10;
}



/* Cover image and gradients */
.kiosk__image {
	grid-area: cover;
	display: grid;
	grid-template-areas: "picture";

	& picture {
		grid-area: picture;
	}
	& img {
		height: 100%;
		object-fit: cover;
	}
	&:before, &:after {
		background: var(--gradient, linear-gradient(to top, var(--clr-green-900), transparent));
		content: '';
		display: block;
		grid-area: picture;
		height: 100%;
		opacity: .5;
		z-index: 2;
	}
	&:after {
		--gradient: linear-gradient(to top, rgba(0,0,0,.8), rgba(0,0,0,.1) 70%);
		opacity: 1;
		z-index: 1;
	}
}

/* Cover Teaser */
.kiosk__teaser {
	grid-area: cover;
	align-self: end;
	font-size: var(--font-size-s);
	hyphens: auto;
	margin: calc(2vw + 1em);
	max-width: 38ch;
	z-index: 3;

	& a {
		&:after {
			content: '';
			display: block;
			position: absolute;
			inset: 0;
			cursor: pointer;
		}
	}
}




.kiosk__title {
	background: var(--background, var(--clr-green-500));
	color: var(--color, var(--clr-green-999));
	font-size: var(--font-size-s);
	font-weight: 700;
	hyphens:auto;
	line-height: 1.2em;
	padding: .75em;
	transition: background-color .3s ease, color .3s ease, scale .2s ease-out;

	&:hover {
		background: var(--clr-green-999);
		color: var(--text);
	}
	&:active {
		scale: .95;
	}

}


/******************************************
*******************************************/



</style>
