//updated to vue2 - https://github.com/MattyRad/vue-i18n/tree/feature/vue-2

const locale_translations = {
    /*
    'es': {
      'hello': 'hola'
    }
    */
  }

export default {
  install: function (Vue, translations = {}) {

    set(translations);

    Vue.directive('locale', {
      params: ['key', 'replace'],

      update: function (locale) {
        var translated_substrings = this.vm.$t(this.params.key, this.params.replace).split('|');

        var children = this.el.children;

        for (var i = 0; i < children.length; i++) {
          if (translated_substrings[i]) {
            children[i].innerText = translated_substrings[i];
          }
        }
      }
    })

    Vue.prototype.$t = function (key, replacements = {}) {
      var locale = replacements['locale'] || window.default_locale

      var translation = fetch(locale, key)

      return replace(translation, replacements)
    }

    Vue.filter('translate', function (key, replacements = {}) {
      return this.$t(key, replacements)
    })
	
	function set (translations) {
	  // we could just assign locale_translations = translations, but
	  // I would like to keep locale_translations as a const,
	  // therefore set each set of translations manually
	  Object.keys(translations).forEach(function (locale) {
		locale_translations[locale] = translations[locale]
	  })
	}
	
	function fetch (locale, key) {
	  if (! locale) return key;

	  var translations = locale_translations[locale]

	  if (translations && key in translations) {
		return translations[key];
	  }

	  // key not found, fall back from dialect translations

	  if (locale.indexOf('_') > -1) {
		return fetch(locale.substr(0, locale.indexOf('_')), key)
	  }

	  if (locale.indexOf('-') > -1) {
		return fetch(locale.substr(0, locale.indexOf('-')), key)
	  }

	  // key does not exist

	  if (translations && window.console && Vue.config.debug) {
		console.warn(`[vue-i18n] Translations exist for the locale '${locale}', but there is not an entry for '${key}'`)
	  }

	  return key
	}
	
	function replace (translation, replacements = {}) {
	  return translation.replace(/\{\w+\}/g, function (placeholder) {
		var key = placeholder.replace('{', '').replace('}', '')

		if (replacements[key] !== undefined) {
		  return replacements[key]
		}

		return placeholder
	  })
	}
  }
}