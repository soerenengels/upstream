import AntiWerther from "./components/AntiWerther.vue";
import FormatTitle from "./components/FormatTitle.vue";
import Infokasten from "./components/Infokasten.vue";
import Kicker from "./components/Kicker.vue";
import KioskPreview from "./components/KioskPreview.vue";
import TeamPreview from "./components/TeamPreview.vue";
import OffersPreview from "./components/OffersPreview.vue";
import EngagementSectionPreview from "./components/EngagementSectionPreview.vue";
import CarouselViewIcon from "./assets/carousel-view.svg?raw"

panel.plugin("soerenengels/block-anti-werther", {
    blocks: {
        anti_werther: AntiWerther,
        format_title: FormatTitle,
        infokasten: Infokasten,
        kicker: Kicker,
        kiosk: KioskPreview,
				team: TeamPreview,
				engagement_section: EngagementSectionPreview,
				offers: OffersPreview,
    },
		icons: {
			'carouselview': CarouselViewIcon
		}
});
