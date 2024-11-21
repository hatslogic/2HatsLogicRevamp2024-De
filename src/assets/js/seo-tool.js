document.getElementById('checkBtn').addEventListener('click', function () {
  document.getElementById('results').innerHTML = "";
  const url = document.getElementById('urlInput').value;
  const useOpenAPI = document.getElementById('useOpenAPI').checked; // Check if the checkbox is checked

  if (!url) {
    document.getElementById('results').innerHTML = '<span style="color: red;">Please enter a valid URL</span>';
    return;
  }

  if (!checkURLStructure) {
    document.getElementById('results').innerHTML = '<span style="color: red;">Please enter a valid HTTPS URL</span>';
    return;
  }

  document.getElementById('hideSection').style.display = 'block';
  document.getElementById('loading').style.display = 'block';

  if (useOpenAPI) {
    checkSEOWithOpenAI(url);
  } else{
    fetchPageContent(url);
  }
  
});

function fetchPageContent(url, retries = 3) {
  fetch(`https://api.allorigins.win/get?url=${encodeURIComponent(url)}`)
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      const parser = new DOMParser();
      const doc = parser.parseFromString(data.contents, 'text/html');
      analyzeSEO(doc, url, data.status);
    })
    .catch(error => {
      console.log('Error fetching the page:', error);
      // Retry logic
      if (retries > 0) {
        console.log(`Retrying... (${3 - retries} attempts left)`);
        fetchPageContent(url, retries - 1);
      } else {
        document.getElementById('loading').style.display = 'none';
        document.getElementById('hideSection').style.display = 'none';
        document.getElementById('results').innerHTML = '<span style="color: red;">Error fetching the page after multiple attempts</span>';
      }
    });
}

function analyzeSEO(doc, url, status) {
  const resultsContainer = document.getElementById('results');
  resultsContainer.innerHTML = ''; // Clear previous results

  // Basic On-Page SEO
  displayCategory('Basic On-Page SEO');
  displayResult('Title', checkTitle(doc));
  displayResult('Title Duplicates', checkDuplicateWordsInTitle(doc));
  displayResult('Meta Description', checkMetaDescription(doc));
  displayResult('Meta Robots', checkMetaRobots(doc));
  displayResult('Canonical Tag', checkCanonical(doc));
  displayResult('Charset Encoding', checkCharsetEncoding(doc));

  // Content Structure
  displayCategory('Content Structure');
  displayResult('H1 Tags', checkH1Tags(doc));
  displayResult('Header Tags Hierarchy', checkHeaderTags(doc));
  displayResult('Content Length', `Content length: ${doc.body.textContent.length} characters`);
  displayResult('Readability', checkReadability(doc));
  displayResult('Duplicate Content', checkDuplicateContent(doc));

  // Keyword Optimization
  displayCategory('Keyword Optimization');
  displayResult('Keyword Usage', checkKeywordUsage(doc));
  displayResult('Keyword Density', checkKeywordDensity(doc));

  // Images
  displayCategory('Images');
  displayResult('Images with Alt Text', checkImageAlt(doc));
  displayResult('Image Optimization', checkImageOptimization(doc));

  // Links
  displayCategory('Links');
  displayResult('Internal Linking', checkInternalLinks(doc));
  displayResult('Broken Links', checkBrokenLinks(doc));

  // Technical SEO
  displayCategory('Technical SEO');
  displayResult('HTTPS', checkHTTPS(url));
  displayResult('Crawlability', checkCrawlability(status));
  // checkGZipCompression(url).then(result => displayResult('GZip Compression', result));
  // checkXPoweredByHeader(url).then(result => displayResult('X-Powered-By Header', result));
  checkGZipAndXPoweredBy(url);
  displayResult('HTML File Size', checkHTMLFileSize(status));
  displayResult('Responsive Design', checkResponsiveDesign(doc));

  // Domain-related
  displayCategory('Domain');
  displayResult('Subdomain Check', checkSubdomain(url));
  displayResult('Domain Length', checkDomainLength(url));
  displayResult('Non-Latin Characters', checkNonLatinCharacters(url));

  // Structured Data and Schema
  displayCategory('Structured Data and Schema');
  displayResult('Structured Data', checkStructuredData(doc));
  displayResult('Schema Markup', checkSchemaMarkup(doc));

  // Social Media and Sharing
  displayCategory('Social Media and Sharing');
  displayResult('Open Graph Tags', checkOpenGraphTags(doc));
  displayResult('Twitter Card Tags', checkTwitterCardTags(doc));
  displayResult('Social Media Sharing Buttons', checkSocialButtons(doc));

  // Compliance and Security
  displayCategory('Compliance and Security');
  displayResult('GDPR Compliance', checkGDPRCompliance(doc));
  displayResult('Adult Content Classification', checkAdultContent(doc));

  // Additional Elements
  displayCategory('Additional Elements');
  displayResult('Favicon', checkFavicon(doc));
  checkPageLoadSpeed(status);
  checkXMLSitemapAndRobots(url);
  findSpammyLinks(doc);

  checkMobileFriendliness(url);
}


function checkURLStructure(url) {
  const urlPattern = /^https?:\/\/[a-zA-Z0-9-_.]+\.[a-zA-Z]{2,}\/?[a-zA-Z0-9-_.\/?&=]*$/;
  return urlPattern.test(url) ? true : false;
}

function checkTitle(doc) {
  const title = doc.querySelector('title');
  if (!title || title.textContent.length === 0) {
    return '<span style="color: red;">Title tag is missing</span>';
  } else if (title.textContent.length < 50) {
    return `<span style="color: orange;">Title is too short (${title.textContent.length} characters)</span>`;
  } else if (title.textContent.length > 60) {
    return `<span style="color: orange;">Title is too long (${title.textContent.length} characters)</span>`;
  }
  return `<span style="color: green;">Title is good (${title.textContent.length} characters)</span>`;
}

// Check for duplicate words in the title
function checkDuplicateWordsInTitle(doc) {
  const title = doc.querySelector('title');
  if (!title) {
    return '<span style="color: red;">No title tag found</span>';
  }

  const words = title.textContent.toLowerCase().split(/\s+/);
  const uniqueWords = new Set(words);

  if (words.length === uniqueWords.size) {
    return '<span style="color: green;">No duplicate words in the title</span>';
  } else {
    return '<span style="color: orange;">Duplicate words found in the title</span>';
  }
}

function checkMetaDescription(doc) {
  const metaDescription = doc.querySelector('meta[name="description"]');
  if (!metaDescription || metaDescription.content.length === 0) {
    return '<span style="color: red;">Meta description is missing</span>';
  } else if (metaDescription.content.length < 120) {
    return `<span style="color: orange;">Meta description is too short (${metaDescription.content.length} characters)</span>`;
  } else if (metaDescription.content.length > 160) {
    return `<span style="color: orange;">Meta description is too long (${metaDescription.content.length} characters)</span>`;
  }
  return `<span style="color: green;">Meta description is good (${metaDescription.content.length} characters)</span>`;
}

function checkH1Tags(doc) {
  const h1Tags = doc.querySelectorAll('h1');
  if (h1Tags.length === 0) {
    return '<span style="color: red;">No H1 tag found</span>';
  } else if (h1Tags.length > 1) {
    return `<span style="color: orange;">Multiple H1 tags found (${h1Tags.length})</span>`;
  }
  return `<span style="color: green;">Found 1 H1 tag</span>`;
}

function checkImageAlt(doc) {
  const images = doc.querySelectorAll('img');
  let missingAltCount = 0;
  let emptyAltCount = 0;

  images.forEach((img) => {
    const altText = img.getAttribute('alt');
    if (altText === null) {
      missingAltCount++;
    } else if (altText.trim() === "") {
      emptyAltCount++;
    }
  });

  const totalImages = images.length;
  if (totalImages === 0) {
    return '<span style="color: orange;">No images found</span>';
  }

  const results = [];
  if (missingAltCount > 0) {
    results.push(`<span style="color: red;">${missingAltCount} image(s) missing alt attribute</span>`);
  }
  if (emptyAltCount > 0) {
    results.push(`<span style="color: orange;">${emptyAltCount} image(s) have empty alt attribute</span>`);
  }
  if (missingAltCount === 0 && emptyAltCount === 0) {
    results.push('<span style="color: green;">All images have appropriate alt attributes</span>');
  }

  return results.join('<br>');
}


function checkCanonical(doc) {
  const canonical = doc.querySelector('link[rel="canonical"]');
  if (!canonical) {
    return '<span style="color: red;">Canonical tag is missing</span>';
  }
  return `<span style="color: green;">Canonical tag is present: ${canonical.href}</span>`;
}

function checkInternalLinks(doc) {
  const internalLinks = Array.from(doc.querySelectorAll('a[href^="/"]'));
  if (internalLinks.length === 0) {
    return '<span style="color: orange;">No internal links found</span>';
  }
  return `<span style="color: green;">Found ${internalLinks.length} internal links</span>`;
}

function checkKeywordUsage(doc) {
  let keywords = extractKeywordsFromMeta(doc);
  const text = doc.body.textContent.toLowerCase();
  const keywordCounts = keywords.map(keyword => ({
    keyword,
    count: (text.match(new RegExp('\\b' + keyword + '\\b', 'gi')) || []).length
  }));

  const totalCount = keywordCounts.reduce((sum, {
    count
  }) => sum + count, 0);

  if (totalCount === 0) {
    return '<span style="color: orange;">No target keywords found</span>';
  }

  const keywordList = keywordCounts
    .filter(({
      count
    }) => count > 0)
    .map(({
      keyword,
      count
    }) => `${keyword} (${count})`)
    .join(', ');

  return `<span style="color: green;">Found ${totalCount} occurrences of target keywords: ${keywordList}</span>`;
}

function extractKeywordsFromMeta(doc) {
  const metaKeywords = doc.querySelector('meta[name="keywords"]');
  if (metaKeywords && metaKeywords.content) {
    return metaKeywords.content.toLowerCase().split(',').map(k => k.trim());
  }
  return [];
}

function checkHeaderTags(doc) {
  const headerTags = doc.querySelectorAll('h1, h2, h3, h4, h5, h6');
  let hierarchyError = false;
  let lastLevel = 1;
  headerTags.forEach(tag => {
    const currentLevel = parseInt(tag.tagName.replace('H', ''), 10);
    if (currentLevel > lastLevel + 1) {
      hierarchyError = true;
    }
    lastLevel = currentLevel;
  });
  if (hierarchyError) {
    return '<span style="color: orange;">Header tags hierarchy could be improved</span>';
  }
  return `<span style="color: green;">Header tags hierarchy is good (${headerTags.length} header tags)</span>`;
}

function checkPageLoadSpeed(status) {
  if (status.response_time) {
    const pageLoadTime = status.response_time;
    if (pageLoadTime < 1000) {
      displayResult('Page Load Speed', `<span style="color: green;">Page load speed is good (${pageLoadTime.toFixed(2)} ms)</span>`);
    } else if (pageLoadTime < 3000) {
      displayResult('Page Load Speed', `<span style="color: orange;">Page load speed could be improved (${pageLoadTime.toFixed(2)} ms)</span>`);
    } else {
      displayResult('Page Load Speed', `<span style="color: red;">Page load speed is slow (${pageLoadTime.toFixed(2)} ms)</span>`);
    }
  } else {
    displayResult('Page Load Speed', '<span style="color: red;">Unable to check page load speed</span>');
  }
}

function checkMobileFriendliness(url) {
  return new Promise((resolve, reject) => {
    // Use Google PageSpeed Insights API to check mobile performance
    fetch(`https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=${url}&strategy=mobile`)
      .then(response => response.json())
      .then(data => {
        if (data.lighthouseResult && data.lighthouseResult.categories.performance) {
          const performanceScore = data.lighthouseResult.categories.performance.score * 100; // Convert score to percentage
          // Check mobile-friendliness based on the performance score
          if (performanceScore >= 90) {
            displayResult('Mobile-friendliness', `<span style="color: green;">Excellent mobile-friendliness (${performanceScore}%)</span>`);
          } else if (performanceScore >= 50) {
            displayResult('Mobile-friendliness', `<span style="color: orange;">Good mobile-friendliness (${performanceScore}%)</span>`);
          } else {
            displayResult('Mobile-friendliness', `<span style="color: red;">Poor mobile-friendliness (${performanceScore}%)</span>`);
          }
        } else {
          displayResult('Mobile-friendliness', '<span style="color: red;">Unable to retrieve mobile-friendliness score</span>');
        }
        document.getElementById('loading').style.display = 'none';
        document.getElementById('hideSection').style.display = 'none';
      })
      .catch(error => {
        displayResult('Mobile-friendliness', '<span style="color: red;">Error checking mobile-friendliness</span>');
        document.getElementById('loading').style.display = 'none';
        document.getElementById('hideSection').style.display = 'none';
      });
  });
}

function checkReadability(doc) {
  const text = doc.body.innerText;
  const words = text.trim().split(/\s+/).length;
  const sentences = text.split(/[.!?]+/).length;
  const avgWordsPerSentence = words / sentences;

  if (avgWordsPerSentence <= 14) {
    return `<span style="color: green;">Good readability (${avgWordsPerSentence.toFixed(1)} words per sentence)</span>`;
  } else if (avgWordsPerSentence <= 20) {
    return `<span style="color: orange;">Fair readability (${avgWordsPerSentence.toFixed(1)} words per sentence)</span>`;
  } else {
    return `<span style="color: red;">Poor readability (${avgWordsPerSentence.toFixed(1)} words per sentence)</span>`;
  }
}

function checkBrokenLinks(doc) {
  // Note: This is a simplified version. A real implementation would actually check each link.
  const links = doc.querySelectorAll('a');
  const brokenLinks = Array.from(links).filter(link => !link.href || link.href === '#').length;
  if (brokenLinks === 0) {
    return `<span style="color: green;">No broken links found (${links.length} total links)</span>`;
  }
  return `<span style="color: red;">${brokenLinks} broken links found out of ${links.length} total links</span>`;
}

function checkDuplicateContent(doc) {
  const paragraphs = doc.querySelectorAll('p');
  const paragraphMap = new Map();

  // Count occurrences of each paragraph
  Array.from(paragraphs).forEach(p => {
    const text = p.textContent.trim();
    if (text) { // Check for non-empty paragraphs
      paragraphMap.set(text, (paragraphMap.get(text) || 0) + 1);
    }
  });

  // Identify duplicates
  const duplicates = Array.from(paragraphMap.entries()).filter(([_, count]) => count > 1);
  const duplicateCount = duplicates.length;

  if (duplicateCount === 0) {
    return '<span style="color: green;">No duplicate content detected</span>';
  }

  // Prepare the output for duplicates
  const duplicateTexts = duplicates.map(([text, count]) =>
    `<p style="color: orange;">Duplicate: "${text}" - ${count} times</p>`
  ).join('');

  return `<span style="color: orange;">${duplicateCount} potentially duplicate paragraphs found:</span>${duplicateTexts}`;
}

function checkImageOptimization(doc) {
  const images = doc.querySelectorAll('img');
  const largeImages = Array.from(images).filter(img => img.width > 1000 || img.height > 1000).length;
  if (largeImages === 0) {
    return `<span style="color: green;">All images appear to be optimized (${images.length} images)</span>`;
  }
  return `<span style="color: orange;">${largeImages} out of ${images.length} images may need optimization</span>`;
}

function checkKeywordDensity(doc) {
  const keywords = ['your', 'target', 'keywords']; // Replace with actual target keywords
  const text = doc.body.innerText.toLowerCase();
  const words = text.split(/\s+/);
  const keywordCount = words.filter(word => keywords.includes(word)).length;
  const density = (keywordCount / words.length) * 100;

  if (density >= 1 && density <= 3) {
    return `<span style="color: green;">Good keyword density (${density.toFixed(2)}%)</span>`;
  } else if (density > 3) {
    return `<span style="color: orange;">Keyword density may be too high (${density.toFixed(2)}%)</span>`;
  } else {
    return `<span style="color: orange;">Keyword density may be too low (${density.toFixed(2)}%)</span>`;
  }
}

function checkSocialButtons(doc) {
  const socialButtons = doc.querySelectorAll('a[href*="facebook.com"], a[href*="twitter.com"], a[href*="linkedin.com"]');
  if (socialButtons.length >= 3) {
    return `<span style="color: green;">Social sharing buttons present (${socialButtons.length} found)</span>`;
  } else if (socialButtons.length > 0) {
    return `<span style="color: orange;">Some social sharing buttons present (${socialButtons.length} found)</span>`;
  }
  return '<span style="color: red;">No social sharing buttons found</span>';
}

function checkHTTPS(url) {
  if (url.startsWith('https')) {
    return '<span style="color: green;">HTTPS is enabled</span>';
  }
  return '<span style="color: red;">HTTPS is not enabled</span>';
}

function checkStructuredData(doc) {
  const structuredData = doc.querySelector('script[type="application/ld+json"]');
  if (structuredData) {
    return '<span style="color: green;">Structured data is present</span>';
  }
  return '<span style="color: orange;">No structured data found</span>';
}

// Check for Open Graph tags
function checkOpenGraphTags(doc) {
  const ogTags = doc.querySelectorAll('meta[property^="og:"]');
  if (ogTags.length === 0) {
    return '<span style="color: red;">No Open Graph tags found</span>';
  }
  const foundTags = Array.from(ogTags).map(tag => tag.getAttribute('property')).join(', ');
  return `<span style="color: green;">Open Graph tags found: ${foundTags}</span>`;
}

// Check for Twitter Card tags
function checkTwitterCardTags(doc) {
  const twitterTags = doc.querySelectorAll('meta[name^="twitter:"]');
  if (twitterTags.length === 0) {
    return '<span style="color: red;">No Twitter Card tags found</span>';
  }
  const foundTags = Array.from(twitterTags).map(tag => tag.getAttribute('name')).join(', ');
  return `<span style="color: green;">Twitter Card tags found: ${foundTags}</span>`;
}

// Check for XML sitemap
function checkXMLSitemapAndRobots(url) {
  const sitemapUrl = new URL('/sitemap.xml', url).href;
  const robotsUrl = new URL('/robots.txt', url).href;
  checkFileExists(sitemapUrl, 'XML Sitemap');
  checkFileExists(robotsUrl, 'Robots.txt');
}

function checkFileExists(url, fileType) {
  return new Promise((resolve) => {
    fetch(url)
      .then(response => {
        if (response.ok) {
          displayResult(fileType, `<span style="color: green;">${fileType} found</span>`);
        } else {
          displayResult(fileType, `<span style="color: red;">${fileType} not found or inaccessible</span>`);
        }
      })
      .catch(() => {
        displayResult(fileType, `<span style="color: red;">Error checking ${fileType}</span>`);
      });
  });
}

// Check for favicon
function checkFavicon(doc) {
  const favicon = doc.querySelector('link[rel="icon"], link[rel="shortcut icon"]');
  if (favicon) {
    return '<span style="color: green;">Favicon found</span>';
  }
  return '<span style="color: orange;">Favicon not found</span>';
}

// Check for responsive design
function checkResponsiveDesign(doc) {
  const viewport = doc.querySelector('meta[name="viewport"]');
  if (viewport && viewport.content.includes('width=device-width')) {
    return '<span style="color: green;">Responsive design meta tag found</span>';
  }
  return '<span style="color: red;">Responsive design meta tag not found</span>';
}

// Check for GDPR compliance
function checkGDPRCompliance(doc) {
  const cookieConsent = doc.body.innerText.toLowerCase().includes('cookie') &&
    (doc.body.innerText.toLowerCase().includes('consent') || doc.body.innerText.toLowerCase().includes('accept'));
  if (cookieConsent) {
    return '<span style="color: green;">Potential GDPR compliance found (cookie consent)</span>';
  }
  return '<span style="color: orange;">No clear GDPR compliance found</span>';
}

// Check for schema markup
function checkSchemaMarkup(doc) {
  const schema = doc.querySelector('script[type="application/ld+json"]');
  if (schema) {
    return '<span style="color: green;">Schema markup found</span>';
  }
  return '<span style="color: orange;">No schema markup found</span>';
}

function checkMetaRobots(doc) {
  const metaRobots = doc.querySelector('meta[name="robots"]');
  if (metaRobots) {
    return `<span style="color: green;">Meta robots tag found: ${metaRobots.content}</span>`;
  }
  return '<span style="color: orange;">No meta robots tag found</span>';
}


// Check crawlability (this is a basic check, as full crawlability testing requires more complex tools)
function checkCrawlability(status) {
  if (status.http_code && status.http_code === 200) {
    return '<span style="color: green;">Website is accessible</span>';
  } else {
    return '<span style="color: red;">Problems accessing the website</span>';
  }
}

// Check if the domain is a subdomain
function checkSubdomain(url) {
  const hostname = new URL(url).hostname;
  const parts = hostname.split('.');
  if (parts.length > 2 && parts[0] !== 'www') {
    return '<span style="color: orange;">The domain appears to be a subdomain</span>';
  }
  return '<span style="color: green;">The domain is not a subdomain</span>';
}

// Check domain length
function checkDomainLength(url) {
  const hostname = new URL(url).hostname;
  const domainName = hostname.replace('www.', '');
  if (domainName.length <= 15) {
    return '<span style="color: green;">The domain length is good</span>';
  } else {
    return '<span style="color: orange;">The domain length might be too long</span>';
  }
}

// Check for non-Latin characters in the domain
function checkNonLatinCharacters(url) {
  const hostname = new URL(url).hostname;
  const nonLatinPattern = /[^\u0000-\u007F]/;
  if (nonLatinPattern.test(hostname)) {
    return '<span style="color: orange;">The domain contains non-Latin characters</span>';
  }
  return '<span style="color: green;">The domain does not contain non-Latin characters</span>';
}

// Check charset encoding
function checkCharsetEncoding(doc) {
  const charset = doc.characterSet || doc.charset;
  if (charset && charset.toLowerCase() === 'utf-8') {
    return '<span style="color: green;">The charset encoding (UTF-8) is set correctly</span>';
  } else if (charset) {
    return `<span style="color: orange;">The charset encoding is set to ${charset}, not UTF-8</span>`;
  } else {
    return '<span style="color: red;">No charset encoding found</span>';
  }
}

function checkGZipAndXPoweredBy(url) {
  fetch(url, {
      method: 'HEAD'
    })
    .then(response => {
      const contentEncoding = response.headers.get('content-encoding');
      if (contentEncoding && contentEncoding.includes('gzip')) {
        displayResult('GZip Compression', '<span style="color: green;">GZip compression is used</span>');
      } else {
        displayResult('GZip Compression', '<span style="color: red;">GZip compression is not used</span>');
      }

      const xPoweredBy = response.headers.get('x-powered-by');
      if (!xPoweredBy) {
        displayResult('X-Powered-By Header', '<span style="color: green;">No X-Powered-By header is sent</span>');
      } else {
        displayResult('X-Powered-By Header', '<span style="color: red;">X-Powered-By header is sent: ' + xPoweredBy + '</span>');
      }
    })
    .catch(error => {
      displayResult('GZip Compression', '<span style="color: red;">Error checking GZip compression: ' + error + '</span>');
      displayResult('X-Powered-By Header', '<span style="color: red;">Error checking X-Powered-By header: ' + error + '</span>');
    });
}
// Check HTML file size
function checkHTMLFileSize(status) {
  if (status.content_length) {
    const sizeInKB = (status.content_length / 1024).toFixed(2);
    if (sizeInKB <= 400) {
      return `<span style="color: green;">HTML file size is fine (${sizeInKB} kB)</span>`;
    } else {
      return `<span style="color: orange;">HTML file size might be too large (${sizeInKB} kB)</span>`;
    }
  } else {
    return '<span style="color: green;">Error in fetching HTML file size</span>';
  }
}

// Check for adult content classification
function checkAdultContent(doc) {
  const metaRating = doc.querySelector('meta[name="rating"]');
  if (metaRating && metaRating.content.toLowerCase().includes('adult')) {
    return '<span style="color: orange;">This website is classified for adult content</span>';
  } else {
    return '<span style="color: green;">This website is not classified for adult content</span>';
  }
}

// Function to check for spammy links
function findSpammyLinks(doc) {
  const links = doc.querySelectorAll('a');
  const linkData = [];

  // Collect the links and their anchor texts
  links.forEach(link => {
    const href = link.getAttribute('href') || '';
    const anchorText = link.textContent.trim();

    // Store the link and its anchor text
    linkData.push({
      href,
      anchorText,
    });
  });
  // Analyze links with AI
  if (linkData.length > 0) {
    var content = `Given the following links and their anchor texts, identify any that may be considered spammy and provide list of them with reason and spam link count and toal link count :\n${JSON.stringify(linkData)}`;
    analyzeLinksWithAI( 'Spammy Links', content);
  } else {
    displayResult('Spammy Links', '<span style="color: green;">No spammy links found</span>');
  }

  if (doc.body.textContent) {
    var content = `Given the following body content, identify seo issues with eg, content structure, missspelled words, duplicate content and suggestions, also list the headers and text, headers hierarchy, all image liks with alt text, duplicate content and duplicate links:\n${JSON.stringify(doc.body.textContent)}`;
    analyzeLinksWithAI('Data Analysis', content);
  } else {
    displayResult('Data Analysis', '<span style="color: green;">No body data found</span>');
  }
}

// AI Analysis Function
async function analyzeLinksWithAI( message, content) {
  try {
    const response = await fetch(config.OPENAIURL, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${config.OPENAIKEY}`
      },
      body: JSON.stringify({
        model: config.OPENAIMODEL,
        messages: [{ role: 'system', content: 'You are a helpful assistant.' }, { role: 'user', content: content }],
        temperature: 0.7
      })
    });

    // Await the response and parse it as JSON
    const data = await response.json(); 
    if (data['error']) {
      displayResult(message, `<span style="color: red;">Error ${message}: ` + data['error']['message'] + `</span>`);
      return false;
    }
    const formattedContent = escapeHtml(data.choices[0].message.content.trim()).replace(/\n/g, '<br>'); 
    displayResult(message, '<small>' + formattedContent + '</small>');
  } catch (error) {
    displayResult(message, `<span style="color: red;">Error ${message}: ` + error + `</span>`);
  }
}

function escapeHtml(html) {
  const element = document.createElement('div');
  element.innerText = html; // Using innerText prevents HTML rendering
  return element.innerHTML; // Return escaped HTML
}

function displayResult(label, result) {
  const resultItem = document.createElement('div');
  if (label) {
    resultItem.className = 'p-3 mb-3 border rounded animate-pop-in'; // Use Bootstrap classes
    resultItem.innerHTML = `<strong class="fw-bold">${label}:</strong> <span>${result}</span>`;
  } else {
    resultItem.className = 'text-center p-3 mb-3 border rounded animate-pop-in'; // Use Bootstrap classes
    resultItem.innerHTML = `<strong class="fw-bold">${result}</strong>`;
  }
  document.getElementById('results').appendChild(resultItem);
  // Trigger reflow to ensure the initial state is applied before animating
  resultItem.offsetHeight;

  // Animate the element
  setTimeout(() => {
    resultItem.classList.add('pop-in');
  }, 100 * document.getElementById('results').children.length);
}

function displayCategory(category) {
  displayResult('', category);
}


function checkSEOWithOpenAI(url) {
  const prompt = `Analyze the SEO of the following URL and provide seo issues, suggestions and recommendations. Also identify seo issues, content structure, missspelled words, duplicate content and suggestions, also list the headers and text, headers hierarchy, all image liks with alt text, duplicate content and duplicate links : ${url}`;

  fetch(config.OPENAIURL, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${config.OPENAIKEY}`
    },
    body: JSON.stringify({
      model: config.OPENAIMODEL,
      messages: [{ role: 'user', content: prompt }],
    })
  })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      
      const seoAnalysis = escapeHtml(data.choices[0].message.content.trim()).replace(/\n/g, '<br>');
      document.getElementById('loading').style.display = 'none';
      document.getElementById('hideSection').style.display = 'none';
      displayCategory("SEO Analysis with OpenAI");
      if (data['error']) {
        displayResult('Spammy Links AI Analysis', '<span style="color: red;">Error analyzing spammy links: ' + data['error']['message'] + '</span>');
      } else{
        displayResult("Results", seoAnalysis);
      }
    })
    .catch(error => {
      console.error('Error checking SEO with OpenAI:', error);
      document.getElementById('results').innerHTML = '<span style="color: red;">Error checking SEO with OpenAI</span>';
    });
}