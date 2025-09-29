function syncSectionHeightsByIndex() {
  const packageItems = document.querySelectorAll('.package-item');
  if (!packageItems.length) return;

  // Get all sections by their index position
  const sectionsByIndex = {};
  
  // First, identify all sections and group them by their index
  packageItems.forEach(packageItem => {
    const sections = packageItem.querySelectorAll('.package-section');
    
    sections.forEach((section, index) => {
      if (!sectionsByIndex[index]) {
        sectionsByIndex[index] = [];
      }
      sectionsByIndex[index].push(section);
    });
  });
  
  // Then sync heights for each section group
  Object.values(sectionsByIndex).forEach(sectionGroup => {
    let maxHeight = 0;
    
    // Reset heights
    sectionGroup.forEach(el => {
      el.style.height = 'auto';
    });
    
    // Find max height
    sectionGroup.forEach(el => {
      maxHeight = Math.max(maxHeight, el.offsetHeight);
    });
    
    // Apply max height
    sectionGroup.forEach(el => {
      el.style.height = maxHeight + 'px';
    });
  });
}

function syncAllSections() {
  // ✅ Only run if screen is >= 1200px
  if (window.innerWidth < 1200) {
    // Reset all synced heights when smaller than 1200px
    document.querySelectorAll('.package-section').forEach(el => {
      el.style.height = 'auto';
    });
    return;
  }

  // Sync sections by their index position
  syncSectionHeightsByIndex();
}

// Run on load
window.addEventListener('load', syncAllSections);

// Run on resize
window.addEventListener('resize', syncAllSections);