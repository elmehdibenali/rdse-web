import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const addBtn = document.getElementById('add-btn');
    const cardAdd = document.getElementById('card-add');
    const tableResponsive = document.getElementById('table-responsive');

        if (addBtn && cardAdd && tableResponsive) {
            cardAdd.style.display = 'none';

            addBtn.addEventListener('click', () => {
            cardAdd.style.display = 'block';
            tableResponsive.style.display = 'none';
            addBtn.style.display = 'none';
            });
        }
    });
