export const runInputmask = () => {
    $(function() {
        Inputmask('', {
            numericInput: true,
            rightAlign: false,
            autoUnmask: true,
            placeholder: '',
            removeMaskOnSubmit: true,
            groupSeparator: " ",
            greedy: false,
            digits: 0,
            alias: 'currency',
        }).mask('.separator');
    });

};