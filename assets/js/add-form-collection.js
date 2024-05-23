import { runInputmask } from "./inputMark";

const addFormToCollection = (e) => {
    const dataset = e.currentTarget.dataset;
    const target = document.querySelector(dataset.target);
    const collectionHolder = document.querySelector(dataset.listSelector);
    const wrapper = document.createElement('tr');
    const removeTarget = dataset.removeTarget;
    wrapper.setAttribute('id', `${removeTarget}_${dataset.index}`)
    let id = `${removeTarget}_${dataset.index}`;
    id = id.substring(6);

    wrapper.setAttribute('data-id', id)
    wrapper.innerHTML = collectionHolder
        .dataset
        .prototype
        .replace(
            /__name__/g,
            dataset.index
        );
    target.append(wrapper);
    dataset.index++;
    $('select.select2').select2({ width: '100%' })
    runInputmask();
};

$(document).on('click', '.add_item_link', e => {
    addFormToCollection(e)
});