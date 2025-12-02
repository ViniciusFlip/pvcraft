// analyze-site.js
// Analisador simples de metatags de sites. Lê URLs de urls.txt e relata a presença/ausência de metatags importantes.
// Uso: node analyze-site.js
// Requer: npm i axios cheerio
const fs = require('fs');
const path = require('path');
const axios = require('axios');
const cheerio = require('cheerio');

const urlsFile = path.join(__dirname, 'urls.txt');
if (!fs.existsSync(urlsFile)) {
  console.error('Crie urls.txt com uma URL por linha (inclusive com https://).');
  process.exit(1);
}

const urls = fs.readFileSync(urlsFile, 'utf8').split(/\r?\n/).filter(Boolean);

async function fetchAndAnalyze(url) {
  try {
    const res = await axios.get(url, { timeout: 15000, headers: { 'User-Agent': 'site-analyzer-bot/1.0' } });
    const $ = cheerio.load(res.data);
    const report = {
      url,
      title: $('title').text() || null,
      description: $('meta[name="description"]').attr('content') || null,
      canonical: $('link[rel="canonical"]').attr('href') || null,
      ogTitle: $('meta[property="og:title"]').attr('content') || null,
      ogDescription: $('meta[property="og:description"]').attr('content') || null,
      ogImage: $('meta[property="og:image"]').attr('content') || null,
      twitterCard: $('meta[name="twitter:card"]').attr('content') || null,
      robots: $('meta[name="robots"]').attr('content') || null,
    };
    return report;
  } catch (err) {
    return { url, error: String(err) };
  }
}

(async () => {
  const results = [];
  for (const u of urls) {
    process.stdout.write('Analisando ' + u + ' ... ');
    const r = await fetchAndAnalyze(u);
    console.log('feito.');
    results.push(r);
  }
  const out = path.join(__dirname, 'analysis-report.json');
  fs.writeFileSync(out, JSON.stringify(results, null, 2), 'utf8');
  console.log('Relatório salvo em', out);
})();
