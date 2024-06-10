// const typeExpense$ = $('#fdb_typeExpense');
// typeExpense$.change(function () {
//     const form$ = typeExpense$.closest('form');
//     const data$ = {};
//     data$[typeExpense$.attr('name')] = typeExpense$.val();
//     $.ajax({
//         url: form$.attr('action'),
//         type: form$.attr('method'),
//         method: 'POST',
//         data: data$,
//         complete: function (html) {
//             $('#fdb_expense').replaceWith($(html.responseText).find('#fdb_expense'))
//             $('#fdb_expense').select2();
//         }
//     });
// })
// assets/js/fdb.js





$(document).ready(function() {
    console.log("jQuery is working!");
    const typeExpense$ = $('#depense_typeExpense');
    typeExpense$.change(function () {
        const form$ = typeExpense$.closest('form');
        const data$ = {};
        data$[typeExpense$.attr('name')] = typeExpense$.val();
        $.ajax({
            url: form$.attr('action'),
            type: form$.attr('method'),
            method: 'POST',
            data: data$,
            complete: function (html) {
                $('#depense_expense').replaceWith($(html.responseText).find('#depense_expense'))
                $('#depense_expense').select2();
            }
        });
    });

});