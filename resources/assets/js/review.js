let reviewContainer = document.getElementById('reviewContainer');
let closeBtnReview = document.getElementById('closeBtnReview');
let reviewBtn = document.getElementById('reviewBtn');

reviewBtn.addEventListener('click', () => {
    reviewContainer.style.display = 'flex'
});
closeBtnReview.addEventListener('click', () => {
    reviewContainer.style.display = 'none'
});