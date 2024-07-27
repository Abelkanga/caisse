/**
 /**
 *  billetage billet
 * */

const calculeBillet = () => {
    var MontantBillets = 0;

    var billets = document.getElementsByClassName('billet');
    $.each(billets, function () {
        var multiplicateur = $(this).attr('data-id');
        Montant = multiplicateur * Number($(this).val());
        MontantBillets = Number(MontantBillets) + Montant;
    });
    $('#resualtTotal1').empty();
    $('#resualtTotal1').val(new Intl.NumberFormat().format(MontantBillets));
};
$('.billet').on('input', function () {
    calculeBillet();
});

/**
 * billetage monnaie
 */


const calculeMonnaie = () => {
    var MontantMonnaie = 0;
    var Monnaie = document.getElementsByClassName('monnaie');
    $.each(Monnaie, function () {
        var multiplicateur = $(this).attr('data-id');
        Montant2 = multiplicateur * Number($(this).val());
        MontantMonnaie = Number(MontantMonnaie) + Montant2;
    });
    $('#resualtTotal2').empty();
    $('#resualtTotal2').val(new Intl.NumberFormat().format(MontantMonnaie));
};
$('.monnaie').on('input', function () {
    calculeMonnaie()
});
/**
 * */
const calculeMontant = (e) => {
    var MontantTotal = 0;
    var Monnaie = document.getElementsByClassName('montant');
    var id = $(e).attr('id');
    var values = $(e).val();
    var multiplicateur = $(e).attr('data-id');
    var total = values * multiplicateur;
    var orbis = $('#billetage_balance').val();
    var ecart = $('#ecart').val();
    $('#r' + id).val(new Intl.NumberFormat().format(total));
    $.each(Monnaie, function () {
        var multiplicateur = $(this).attr('data-id');
        Montant3 = multiplicateur * Number($(this).val());
        MontantTotal = Number(MontantTotal) + Montant3;
        ecart = Number(MontantTotal - orbis);
    });
    $('#billetage_amount').val();
    $('#billetage_amount').val(new Intl.NumberFormat().format(MontantTotal));
    $('#billetage_ecart').val(ecart);
}
$('.montant').on('input', function () {
    calculeMontant($(this))
});

$(document).ready(function () {
    calculeBillet();
    calculeMonnaie();
    $('.montant').each(function () {
        calculeMontant($(this))
    });
})
