const loadMoreBtn = document.querySelector("#view-all-members");
const memberContainer = document.querySelector("#members");
let offset = 24; // Initial offset

loadMoreBtn.addEventListener('click', function(e) {
  e.preventDefault();
  loadMoreBtn.textContent = 'Loading...';

  const xhr = new XMLHttpRequest();
  xhr.open('POST', ajaxurl, true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function() {
    if (xhr.status === 200) {
      const response = xhr.responseText;
      loadMoreBtn.parentElement.style.display = 'none';
      if (response === 'no_more_members') {
        loadMoreBtn.textContent = 'No More Members';
      } else {
        memberContainer.insertAdjacentHTML('beforeend', response);
        // offset += -1; // Update offset for next load
      }
    } else {
      console.error('Error fetching data');
    }
  };

  const data = `action=load_more_team_members&offset=${offset}`;
  xhr.send(data);
});
