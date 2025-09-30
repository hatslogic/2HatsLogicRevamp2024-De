function syncSectionHeightsByRow() {
  const packageItems = document.querySelectorAll('.package-item');
  if (!packageItems.length) return;

  // Get the grid container to determine columns per row
  const gridContainer = document.querySelector('.packages-wrapper');
  if (!gridContainer) return;
  
  // Determine columns per row based on CSS classes
  let columnsPerRow = 3; // default
  if (gridContainer.classList.contains('grid-1')) {
    columnsPerRow = 1;
  } else if (gridContainer.classList.contains('grid-2')) {
    columnsPerRow = 2;
  } else if (gridContainer.classList.contains('grid-3')) {
    columnsPerRow = 3;
  }
  
  // Group package items by rows
  const rows = [];
  for (let i = 0; i < packageItems.length; i += columnsPerRow) {
    const row = Array.from(packageItems).slice(i, i + columnsPerRow);
    rows.push(row);
  }
  
  // For each row, sync section heights by their index within that row
  rows.forEach(row => {
    const sectionsByIndex = {};
    
    // Group sections by their index within each package item in this row
    row.forEach(packageItem => {
      const sections = packageItem.querySelectorAll('.package-section');
      
      sections.forEach((section, index) => {
        if (!sectionsByIndex[index]) {
          sectionsByIndex[index] = [];
        }
        sectionsByIndex[index].push(section);
      });
    });
    
    // Sync heights for each section group within this row
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

  // Sync sections by their row position
  syncSectionHeightsByRow();
}

// Run on load
window.addEventListener('load', syncAllSections);

// Run on resize
window.addEventListener('resize', syncAllSections);