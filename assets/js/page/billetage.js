// $(document).ready(function () {
//     calculatePrice()
// })
//
//
// const calculatePrice = () => {
//     $('body').on('input', '.price', function () {
//         const parentId = $(this).parent().parent().attr('data-id');
//         const qte = +$(`#${parentId}_quantite`).val();
//         const price = +$(this).val();
//         const amount = qte * price;
//         $(`#${parentId}_montant`).val(amount)
//         calculateTotalAmount()
//     });
// }
// calculatePrice()
//
// const calculateTotalAmount = () => {
//     const sumPrice = [];
//     const sumAmount = [];
//
//     $('.price').each(function () {
//         sumPrice.push(+$(this).val())
//     })
//
//     $('.montant').each(function () {
//         sumAmount.push(+$(this).val())
//     })
//
//     let price;
//     let amount;
//
//     if (sumPrice.length > 0) {
//         price = sumPrice.reduce((previousValue, currentValue) => previousValue + currentValue);
//         amount = sumAmount.reduce((previousValue, currentValue) => previousValue + currentValue);
//     } else {
//         price = amount = 0;
//     }
//
//     $('#total_price').html(new Intl.NumberFormat('fr-FR').format(price));
//     $('#total_montant').html(new Intl.NumberFormat('fr-FR').format(amount));
// }
//
// calculateTotalAmount()