let lastX;
let bar = document.querySelector('#testjs');

bar.addEventListener('mousedown', event => {
    if (event.button == 0) {
        lastX = event.clientX;
        window.addEventListener('mousemove', moved);
        event.preventDefault();
    }
});

function moved(event) {
    if (event.buttons == 0) {
        window.removeEventListener('mousemove', moved);
    } else {
        let dist = event.clientX - lastX;
        let newWidth = Math.max(10, bar.offsetWidth + dist);
        bar.style.width = newWidth + "px";
        lastX = event.clientX;
    }
}