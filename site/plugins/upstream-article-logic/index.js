(function() {
  "use strict";
  function normalizeComponent(scriptExports, render, staticRenderFns, functionalTemplate, injectStyles, scopeId, moduleIdentifier, shadowMode) {
    var options = typeof scriptExports === "function" ? scriptExports.options : scriptExports;
    if (render) {
      options.render = render;
      options.staticRenderFns = staticRenderFns;
      options._compiled = true;
    }
    if (functionalTemplate) {
      options.functional = true;
    }
    if (scopeId) {
      options._scopeId = "data-v-" + scopeId;
    }
    var hook;
    if (moduleIdentifier) {
      hook = function(context) {
        context = context || // cached call
        this.$vnode && this.$vnode.ssrContext || // stateful
        this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext;
        if (!context && typeof __VUE_SSR_CONTEXT__ !== "undefined") {
          context = __VUE_SSR_CONTEXT__;
        }
        if (injectStyles) {
          injectStyles.call(this, context);
        }
        if (context && context._registeredComponents) {
          context._registeredComponents.add(moduleIdentifier);
        }
      };
      options._ssrRegister = hook;
    } else if (injectStyles) {
      hook = shadowMode ? function() {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        );
      } : injectStyles;
    }
    if (hook) {
      if (options.functional) {
        options._injectStyles = hook;
        var originalRender = options.render;
        options.render = function renderWithStyleInjection(h, context) {
          hook.call(context);
          return originalRender(h, context);
        };
      } else {
        var existing = options.beforeCreate;
        options.beforeCreate = existing ? [].concat(existing, hook) : [hook];
      }
    }
    return {
      exports: scriptExports,
      options
    };
  }
  const _sfc_main$7 = {
    // ...
  };
  var _sfc_render$7 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("section", { staticClass: "block__anti-werther" }, [_c("h3", [_vm._v(" Dir geht es aktuell nicht gut? Hier findest Du Hilfe: ")]), _c("k-writer", [_c("ul", [_c("li", [_vm._v(" Wende dich an deine hausärztliche Praxis oder den "), _c("a", { attrs: { "href": "https://www.116117.de/de/index.php", "target": "_blank", "rel": "noopener noreferrer" } }, [_vm._v("ärztlichen Bereitschaftsdienst")]), _vm._v(". ")]), _c("li", [_vm._v(" Kontaktiere die "), _c("a", { attrs: { "href": "https://www.telefonseelsorge.de/", "target": "_blank", "rel": "noopener noreferrer" } }, [_vm._v("Telefonseelsorge")]), _vm._v(". ")]), _c("li", [_vm._v(" Suche in den Listen der "), _c("a", { attrs: { "href": "https://www.deutsche-depressionshilfe.de/depression-infos-und-hilfe/wo-finde-ich-hilfe", "target": "_blank", "rel": "noopener noreferrer" } }, [_vm._v("Deutschen Depressionshilfe")]), _vm._v(" und der "), _c("a", { attrs: { "href": "https://www.neurologen-und-psychiater-im-netz.org/krisenotfall/akute-psychische-krise/", "target": "_blank", "rel": "noopener noreferrer" } }, [_vm._v("Neurologen und Psychiater im Netz")]), _vm._v(" nach spezifischen Hilfsangeboten. ")]), _c("li", [_vm._v(" Rufe bei Notfällen wie drängenden und konkreten Suizidgedanken einen Notarzt über die 112. ")])])])], 1);
  };
  var _sfc_staticRenderFns$7 = [];
  _sfc_render$7._withStripped = true;
  var __component__$7 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$7,
    _sfc_render$7,
    _sfc_staticRenderFns$7,
    false,
    null,
    null,
    null,
    null
  );
  __component__$7.options.__file = "/Users/sorenengels/Documents/2022/kirby.upstream-newsletter.de/upstream/site/plugins/upstream-article-logic/src/components/AntiWerther.vue";
  const AntiWerther = __component__$7.exports;
  const _sfc_main$6 = {
    computed: {
      title() {
        if (this.content.upstream_format_select == "Selbst eintragen") {
          return this.content.upstream_format_title;
        }
        return this.content.upstream_format_select;
      }
    }
  };
  var _sfc_render$6 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("p", { staticClass: "format__title" }, [_vm._v(" " + _vm._s(_vm.title) + " ")]);
  };
  var _sfc_staticRenderFns$6 = [];
  _sfc_render$6._withStripped = true;
  var __component__$6 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$6,
    _sfc_render$6,
    _sfc_staticRenderFns$6,
    false,
    null,
    null,
    null,
    null
  );
  __component__$6.options.__file = "/Users/sorenengels/Documents/2022/kirby.upstream-newsletter.de/upstream/site/plugins/upstream-article-logic/src/components/FormatTitle.vue";
  const FormatTitle = __component__$6.exports;
  const _sfc_main$5 = {
    computed: {
      headline() {
        return this.content.headline ? this.content.headline : "Titel eintragen";
      },
      text() {
        return this.content.text ? this.content.text : "Erklärtext eintragen";
      },
      opened() {
        return this.content.opened == true ? "open" : "";
      }
    }
  };
  var _sfc_render$5 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("details", { staticClass: "block__infokasten", attrs: { "open": _vm.content.opened } }, [_c("summary", [_c("span", { staticClass: "h4" }, [_vm._v(_vm._s(_vm.headline))])]), _c("div", [_c("k-writer", { attrs: { "value": _vm.text } })], 1)]);
  };
  var _sfc_staticRenderFns$5 = [];
  _sfc_render$5._withStripped = true;
  var __component__$5 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$5,
    _sfc_render$5,
    _sfc_staticRenderFns$5,
    false,
    null,
    null,
    null,
    null
  );
  __component__$5.options.__file = "/Users/sorenengels/Documents/2022/kirby.upstream-newsletter.de/upstream/site/plugins/upstream-article-logic/src/components/Infokasten.vue";
  const Infokasten = __component__$5.exports;
  const _sfc_main$4 = {
    computed: {
      text() {
        return this.content.text ? this.content.text : "Text für Kicker eintragen";
      }
    }
  };
  var _sfc_render$4 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", [_c("k-writer", { staticClass: "block__kicker", attrs: { "value": _vm.text } })], 1);
  };
  var _sfc_staticRenderFns$4 = [];
  _sfc_render$4._withStripped = true;
  var __component__$4 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$4,
    _sfc_render$4,
    _sfc_staticRenderFns$4,
    false,
    null,
    null,
    null,
    null
  );
  __component__$4.options.__file = "/Users/sorenengels/Documents/2022/kirby.upstream-newsletter.de/upstream/site/plugins/upstream-article-logic/src/components/Kicker.vue";
  const Kicker = __component__$4.exports;
  const _sfc_main$3 = {
    data() {
      return {
        headline: this.content.upstream_kiosk_headline
      };
    },
    computed: {
      cover() {
        return shelf[0];
      },
      headline() {
        if (this.content.upstream_format_select == "Selbst eintragen") {
          return this.content.upstream_format_title;
        }
        return this.content.upstream_format_select;
      }
    }
  };
  var _sfc_render$3 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "kiosk" }, [_c("div", { staticClass: "kiosk__backdrop" }), _c("p", { staticClass: "kiosk__headline h1" }, [_vm._v(" " + _vm._s(_vm.headline) + " ")]), _c("section", { staticClass: "kiosk__shelf" }), _vm._m(0)]);
  };
  var _sfc_staticRenderFns$3 = [function() {
    var _vm = this, _c = _vm._self._c;
    return _c("p", { staticClass: "kiosk__exit" }, [_c("a", { attrs: { "href": "/artikel" } }, [_vm._v(" Alle Artikel anzeigen → ")])]);
  }];
  _sfc_render$3._withStripped = true;
  var __component__$3 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$3,
    _sfc_render$3,
    _sfc_staticRenderFns$3,
    false,
    null,
    "f7d2e2a0",
    null,
    null
  );
  __component__$3.options.__file = "/Users/sorenengels/Documents/2022/kirby.upstream-newsletter.de/upstream/site/plugins/upstream-article-logic/src/components/KioskPreview.vue";
  const KioskPreview = __component__$3.exports;
  const _sfc_main$2 = {};
  var _sfc_render$2 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "team" });
  };
  var _sfc_staticRenderFns$2 = [];
  _sfc_render$2._withStripped = true;
  var __component__$2 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$2,
    _sfc_render$2,
    _sfc_staticRenderFns$2,
    false,
    null,
    "b0c4c092",
    null,
    null
  );
  __component__$2.options.__file = "/Users/sorenengels/Documents/2022/kirby.upstream-newsletter.de/upstream/site/plugins/upstream-article-logic/src/components/TeamPreview.vue";
  const TeamPreview = __component__$2.exports;
  const _sfc_main$1 = {};
  var _sfc_render$1 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "offers" });
  };
  var _sfc_staticRenderFns$1 = [];
  _sfc_render$1._withStripped = true;
  var __component__$1 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$1,
    _sfc_render$1,
    _sfc_staticRenderFns$1,
    false,
    null,
    "3752a1c2",
    null,
    null
  );
  __component__$1.options.__file = "/Users/sorenengels/Documents/2022/kirby.upstream-newsletter.de/upstream/site/plugins/upstream-article-logic/src/components/OffersPreview.vue";
  const OffersPreview = __component__$1.exports;
  const _sfc_main = {};
  var _sfc_render = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("ul", { staticClass: "article__engage" });
  };
  var _sfc_staticRenderFns = [];
  _sfc_render._withStripped = true;
  var __component__ = /* @__PURE__ */ normalizeComponent(
    _sfc_main,
    _sfc_render,
    _sfc_staticRenderFns,
    false,
    null,
    "49699986",
    null,
    null
  );
  __component__.options.__file = "/Users/sorenengels/Documents/2022/kirby.upstream-newsletter.de/upstream/site/plugins/upstream-article-logic/src/components/EngagementSectionPreview.vue";
  const EngagementSectionPreview = __component__.exports;
  const CarouselViewIcon = '<svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M4 3H1V5H3V19H1V21H4C4.55228 21 5 20.5523 5 20V4C5 3.44772 4.55228 3 4 3ZM7 4C7 3.44772 7.44772 3 8 3H16C16.5523 3 17 3.44772 17 4V20C17 20.5523 16.5523 21 16 21H8C7.44772 21 7 20.5523 7 20V4ZM9 5V19H15V5H9ZM19 4C19 3.44772 19.4477 3 20 3H23V5H21V19H23V21H20C19.4477 21 19 20.5523 19 20V4Z"/></svg>';
  panel.plugin("soerenengels/block-anti-werther", {
    blocks: {
      anti_werther: AntiWerther,
      format_title: FormatTitle,
      infokasten: Infokasten,
      kicker: Kicker,
      kiosk: KioskPreview,
      team: TeamPreview,
      engagement_section: EngagementSectionPreview,
      offers: OffersPreview
    },
    icons: {
      "carouselview": CarouselViewIcon
    }
  });
})();
