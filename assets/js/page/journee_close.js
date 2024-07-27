const calculateEcartClose = () => {
    $('body').on('input', '#journee_close_amount', function (e) {
        const physique = $("#journee_close_amount");
        const theorique = $("#journee_close_balance");
        $("#journee_close_ecart").val(physique.val() - theorique.val());
    });
}


calculateEcartClose();