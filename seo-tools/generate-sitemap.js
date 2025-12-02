// generate-sitemap.js
// Gerador simples de sitemap. Lê rotas de 'pages.json' (matriz de objetos {url, changefreq, priority})
// e grava em /public/sitemap.xml. Executa durante a compilação: node generate-sitemap.js

const fs = require('fs');
const path = require('path');

const BASE = process.env.SITE_BASE || 'https://www.exemplo.com';
const pagesFile = path.join(__dirname, 'pages.json');
const outDir = path.join(__dirname, 'public');
const outFile = path.join(outDir, 'sitemap.xml');

if (!fs.existsSync(outDir)) fs.mkdirSync(outDir, { recursive: true });

let pages = [];
if (fs.existsSync(pagesFile)) {
  try {
    pages = JSON.parse(fs.readFileSync(pagesFile, 'utf8'));
  } catch (err) {
    console.error('Erro ao ler pages.json:', err);
    process.exit(1);
  }
} else {
  // páginas de exemplo padrão
  pages = [
    { url: '/', changefreq: 'daily', priority: 1.0 },
    { url: '/sobre', changefreq: 'monthly', priority: 0.7 },
    { url: '/contato', changefreq: 'monthly', priority: 0.6 }
  ];
}

const urls = pages.map(p => `
  <url>
    <loc>${BASE.replace(/\/$/, '')}${p.url}</loc>
    <changefreq>${p.changefreq || 'monthly'}</changefreq>
    <priority>${typeof p.priority !== 'undefined' ? p.priority : 0.5}</priority>
  </url>
`).join('\n');

const xml = `<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
${urls}
</urlset>`;

fs.writeFileSync(outFile, xml, 'utf8');
console.log('sitemap.xml gerado em', outFile);
