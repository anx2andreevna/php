const buttons = document.querySelectorAll('.btn');
const input = document.querySelector('.screen');

buttonClick = (e) => {
    const data = e.target.innerText;
    let currentValue = input.value;
    let newValue = currentValue+data;
    input.value = newValue;
}

buttons.forEach((elem) => {
    elem.addEventListener('click', buttonClick)
})