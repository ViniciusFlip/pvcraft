
// seo-generator.js
// Gerador de meta tags SEO reutilizável para uso no lado do cliente.
// Uso: SEO.update(metaData)
// Funciona em SPA: chame SEO.update(...) ao alterar a rota.
// Observação: para melhores resultados (visualização social, rastreadores), gere meta tags no lado do servidor (SSR/SSG).

const SEO = (function () {
  function setTag(tagName, attrName, attrValue, content) {
    const selector = attrName ? `${tagName}[${attrName}="${attrValue}"]` : tagName;
    let el = document.head.querySelector(selector);
    if (!el) {
      el = document.createElement(tagName);
      if (attrName) el.setAttribute(attrName, attrValue);
      if (tagName === 'title') {
        // tratado separadamente
      } else {
        document.head.appendChild(el);
      }
    }
    if (tagName === 'title') {
      document.title = content || '';
    } else if (content !== undefined) {
      el.setAttribute('content', content);
    }
    return el;
  }

  function setOrUpdateMeta(name, content) {
    if (content === undefined || content === null) return;
    let meta = document.head.querySelector(`meta[name="${name}"]`);
    if (!meta) {
      meta = document.createElement('meta');
      meta.setAttribute('name', name);
      document.head.appendChild(meta);
    }
    meta.setAttribute('content', content);
  }

  function setOrUpdateProperty(prop, content) {
    if (!content) return;
    let meta = document.head.querySelector(`meta[property="${prop}"]`);
    if (!meta) {
      meta = document.createElement('meta');
      meta.setAttribute('property', prop);
      document.head.appendChild(meta);
    }
    meta.setAttribute('content', content);
  }

  function setLinkRel(rel, href, attrs = {}) {
    if (!href) return;
    // ou links alternativos, tente identificar por hreflang
    let selector = `link[rel="${rel}"]`;
    if (rel === 'alternate' && attrs.hreflang) selector = `link[rel="${rel}"][hreflang="${attrs.hreflang}"]`;
    let link = document.head.querySelector(selector);
    if (!link) {
      link = document.createElement('link');
      link.setAttribute('rel', rel);
      document.head.appendChild(link);
    }
    link.setAttribute('href', href);
    Object.keys(attrs).forEach(k => link.setAttribute(k, attrs[k]));
  }

  function removeExistingJsonLd() {
    const ex = document.head.querySelectorAll('script[type="application/ld+json"]');
    ex.forEach(s => {
      if (s.getAttribute('data-generated') === 'seo-generator') s.remove();
    });
  }

  function injectJsonLd(obj) {
    if (!obj) return;
    removeExistingJsonLd();
    const s = document.createElement('script');
    s.setAttribute('type', 'application/ld+json');
    s.setAttribute('data-generated', 'seo-generator');
    s.text = JSON.stringify(obj, null, 2);
    document.head.appendChild(s);
  }

  function update(data = {}) {
    const siteName = data.siteName || '';
    const titleTemplate = data.titleTemplate || ((t) => (siteName ? `${t} | ${siteName}` : t));

    if (data.title) {
      const finalTitle = typeof titleTemplate === 'function' ? titleTemplate(data.title) : data.title;
      setTag('title', null, null, finalTitle);
      setOrUpdateProperty('og:title', finalTitle);
      setOrUpdateMeta('twitter:title', finalTitle);
    }

    if (data.description) {
      setOrUpdateMeta('description', data.description);
      setOrUpdateProperty('og:description', data.description);
      setOrUpdateMeta('twitter:description', data.description);
    }

    if (data.keywords) {
      setOrUpdateMeta('keywords', Array.isArray(data.keywords) ? data.keywords.join(', ') : data.keywords);
    }

    if (data.url) {
      setLinkRel('canonical', data.canonical || data.url);
      setOrUpdateProperty('og:url', data.url);
      setOrUpdateMeta('twitter:url', data.url);
    }

    if (data.image) {
      setOrUpdateProperty('og:image', data.image);
      setOrUpdateMeta('twitter:image', data.image);
      if (data.imageAlt) setOrUpdateProperty('og:image:alt', data.imageAlt);
    }

    setOrUpdateProperty('og:type', data.type || 'website');
    if (data.siteName) setOrUpdateProperty('og:site_name', data.siteName);
    if (data.locale) setOrUpdateProperty('og:locale', data.locale);

    if (data.publishedTime) setOrUpdateProperty('article:published_time', data.publishedTime);
    if (data.modifiedTime) setOrUpdateProperty('article:modified_time', data.modifiedTime);
    if (data.author) setOrUpdateProperty('article:author', data.author);

    setOrUpdateMeta('twitter:card', data.twitterCard || (data.image ? 'summary_large_image' : 'summary'));
    if (data.twitterSite) setOrUpdateMeta('twitter:site', data.twitterSite);
    if (data.twitterCreator) setOrUpdateMeta('twitter:creator', data.twitterCreator);

    if (data.noindex) {
      setOrUpdateMeta('robots', 'noindex, nofollow');
      setOrUpdateMeta('googlebot', 'noindex, nofollow');
    } else if (data.noarchive) {
      setOrUpdateMeta('robots', 'noarchive');
    } else {
      setOrUpdateMeta('robots', 'index, follow');
    }

    if (Array.isArray(data.alternateLangs)) {
      data.alternateLangs.forEach(alt => {
        if (alt.lang && alt.url) setLinkRel('alternate', alt.url, { hreflang: alt.lang });
      });
    }

    if (data.canonical && data.canonical !== data.url) setLinkRel('canonical', data.canonical);

    if (data.jsonLd) {
      injectJsonLd(data.jsonLd);
    } else {
      if (data.organization) {
        const org = {
          '@context': 'https://schema.org',
          '@type': 'Organization',
          name: data.organization.name,
          url: data.organization.url,
          logo: data.organization.logo,
          sameAs: data.organization.sameAs || []
        };
        injectJsonLd(org);
      }
    }
  }

  return { update };
})();

if (typeof window !== 'undefined') window.SEO = SEO;
export default SEO;
