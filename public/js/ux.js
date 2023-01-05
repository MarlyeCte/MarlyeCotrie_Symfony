const colorInput = document.querySelectorAll('.changeCouleur');
const resetButton = document.getElementById('resetAll');

function changeAll() {
    colorInput.forEach(el => el.addEventListener('change', event => {

        let tag = event.target.getAttribute("data-selector")

        let selector = document.querySelectorAll(tag);

        for (element of selector) {
            if (tag === '.modifBox') {
                element.setAttribute("style", "background-color: " + event.target.value + ";");
            } else {
                element.setAttribute("style", "color: " + event.target.value + ";");
            }
        }
    }));
}

changeAll();

function reset() {
    colorInput.forEach(el => el.addEventListener('change', event => {

        let tag = event.target.getAttribute("data-selector")
        let colorReset = event.target.getAttribute("data-reset")

        // console.log(event.target.getAttribute("data-selector"), event.target.value);

        let selector = document.querySelectorAll(tag);

        for (element of selector) {
            if (tag === '.modifBox') {
                element.setAttribute("style", "background-color: " + colorReset + ";");
            } else {
                element.setAttribute("style", "color: " + colorReset + ";");
            }
        }
    }));
    colorInput.forEach(el => el.dispatchEvent(new Event("change")));
    changeAll();
}

// colorInput.onchange = (e) => changeColor(e.target.value);
// resetButton.onclick = () => reset();
resetButton.addEventListener('click', event => reset());

console.log('ton JAVASCRIPT sur symfony marche');