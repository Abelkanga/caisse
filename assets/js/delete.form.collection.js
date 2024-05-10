import { runInputmask } from "./inputMark";

const delFormToCollection = (e) => {
    const dataset = e.currentTarget.dataset;
    const target = document.querySelector(dataset.target);
    $(target).remove();
    runInputmask();
}

$(document).on('click', '.del_item_link', e => {
    delFormToCollection(e)
});