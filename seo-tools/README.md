# SEO Package

Arquivos incluídos:
- seo-generator.js — gerador de meta tags para uso client-side (SPA). Ideal usar SSR/SSG para melhores resultados.
- generate-sitemap.js + pages.json — gera `public/sitemap.xml`. Rode `npm run build-sitemap`.
- robots.txt — é um exemplo básico.
- analyze-site.js + urls.txt — script que verifica meta tags importantes. Rode `npm run analyze-site` (instale dependências).
- package.json — scripts úteis.

## Basta seguir os passos para usar

1. Copie `seo-generator.js` para seu projeto e importe no `<head>` ou no entrypoint do seu SPA. Em cada rota chame:
```js
SEO.update({
  title: 'Título da página',
  siteName: 'Minha Empresa',
  description: 'Descrição curta (120-160 chars)',
  url: 'https://www.seusite.com/pagina',
  image: 'https://www.seusite.com/og-image.jpg',
  imageAlt: 'Descrição da imagem',
  type: 'article',
  locale: 'pt_BR',
  keywords: ['palavra1','palavra2'],
  twitterSite: '@seu_twitter',
  alternateLangs: [{ lang: 'pt-BR', url: 'https://seusite.com/pt'}],
  organization: { name: 'Minha Empresa', url: 'https://seusite.com', logo: 'https://seusite.com/logo.png' }
});
```

2. Gerar sitemap:
- Ajuste `pages.json` com as rotas do site.
- Rode:
```bash
npm install
npm run build-sitemap
```
O sitemap será gerado em `public/sitemap.xml`.

3. Analisar site:
- Coloque as URLs que quer analisar em `urls.txt`.
- Instale dependências `npm install`.
- Rode `npm run analyze-site`.
- Resultado salvo em `analysis-report.json`.

## Observações importantes
- Muitos crawlers (Facebook, LinkedIn) pegam as tags OG do HTML inicial. Se você injeta as tags **só** via JavaScript no cliente, a pré-visualização pode falhar. Para garantir compatibilidade máxima, gere as meta tags no servidor (SSR) ou no build (SSG).
- Use imagens OG com tamanho mínimo recomendado (1200x630) e hospede em CDN.
- Configure Google Search Console e verifique o sitemap.
- Para resultados ricos, adicione JSON-LD adequados (Article, Product, BreadcrumbList).
- Qualquer dúvida só entrar em contato, (11)963896363 - Bryan
