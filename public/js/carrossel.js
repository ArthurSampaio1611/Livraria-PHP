document.querySelector("#carrossel").addEventListener("wheel", event => {
    if(event.deltaY > 0) {
        event.target.scrollBy(350, 0)
    } else {
        event.target.scrollBy(-350, 0)
    }
})