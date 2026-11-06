/**
 * Quadro Theme - Project Dynamic Category Filtering
 */
document.addEventListener('DOMContentLoaded', function () {
  const filterButtons = document.querySelectorAll('.filter-btn');
  const projectCards = document.querySelectorAll('.project-card');

  if (!filterButtons.length || !projectCards.length) return;

  filterButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      // Toggle active state
      filterButtons.forEach(function (btn) {
        btn.classList.remove('active');
      });
      this.classList.add('active');

      const filterValue = this.getAttribute('data-filter');

      projectCards.forEach(function (card) {
        const cardCategory = card.getAttribute('data-category');

        if (filterValue === 'all' || cardCategory === filterValue || (cardCategory && cardCategory.includes(filterValue))) {
          card.style.display = 'flex';
          setTimeout(function () {
            card.style.opacity = '1';
            card.style.transform = 'scale(1)';
          }, 10);
        } else {
          card.style.opacity = '0';
          card.style.transform = 'scale(0.95)';
          setTimeout(function () {
            card.style.display = 'none';
          }, 200);
        }
      });
    });
  });
});

