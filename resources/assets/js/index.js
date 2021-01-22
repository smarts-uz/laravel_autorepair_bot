let callBtn = document.getElementById('callBtn');
let callContainer = document.getElementById('callContainer');
let closeBtn = document.getElementById('closeBtn');
let callMaster = document.getElementById('callMaster');
let callMasterBtn = document.getElementById('callMasterBtn');
let closeMasterBtn = document.getElementById('closeMasterBtn');
let applicationContainer = document.getElementById('applicationContainer');
let closeBtnApplication = document.getElementById('closeBtnApplication');
let openApplication = document.getElementById('openApplication');
let orderContainer = document.getElementById('orderContainer');
let closeOrder = document.getElementById('closeOrder');
let priceClick = document.querySelectorAll('.price-click');
let orderContainer2 = document.getElementById('orderContainer2');
let closeOrder2 = document.getElementById('closeOrder2');




callBtn.addEventListener('click', () => {
    callContainer.style.display = 'flex';
  
});
closeBtn.addEventListener('click', () => {
    callContainer.style.display = 'none';
});
callMasterBtn.addEventListener('click', () => {
    callMaster.style.display = 'flex';
});
closeMasterBtn.addEventListener('click', () => {
    callMaster.style.display = 'none';
});
openApplication.addEventListener('click', () => {
    applicationContainer.style.display = 'flex'
});
closeBtnApplication.addEventListener('click', () => {
    applicationContainer.style.display = 'none'
});
closeOrder.addEventListener('click', () => {
    orderContainer.style.display = 'none'
});
closeOrder2.addEventListener('click', () => {
    orderContainer2.style.display = 'none'
});

function priceOpen() {
    orderContainer.style.display = 'flex'
};
function priceOpen2() {
    orderContainer2.style.display = 'flex'
};
let cancel = document.getElementById('cancel');
let navContainer = document.getElementById('navContainer');
let burger = document.getElementById('burger');
let navMenu = document.getElementById('navMenu');
let plus = document.getElementById('plus');
let minus = document.getElementById('minus')

burger.addEventListener('click', () => {
    navContainer.style.display = 'block';
});

cancel.addEventListener('click', () => {
    navContainer.style.display = 'none';
});

plus.addEventListener('click', () => {
    navMenu.style.display = 'block';
    plus.style.display = 'none';
    minus.style.display = 'block'
});
 minus.addEventListener('click', () => {
    navMenu.style.display = 'none';
    plus.style.display = 'block';
    minus.style.display = 'none';
});


