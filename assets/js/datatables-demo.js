
const $formJournalCaisse = $('form[name="form_journal_caisse"]');
$formJournalCaisse.submit(function (e) {
    e.preventDefault();
    const $data = $(this).serialize();
    const tab = $data.split('&');
    const tab2_deb = tab[0].split('=');
    const tab2_fin = tab[1].split('=');
    const debut = tab2_deb[1];
    const fin = tab2_fin[1];
    $('#table_reporting_journal').dataTable({
        bDestroy: true,
        ajax: {
            url: `/caisse/etat?${$data}`,
            dataSrc: ''
        },
        columns: [
            { data: 'date', sClass: 'text-center' },
            { data: 'num_piece', sClass: 'text-left' },
            { data: 'libelle', sClass: 'text-left' },
            { data: 'intitule', sClass: 'text-left' },
            { data: 'debit', sClass: 'text-right' },
            { data: 'credit', sClass: 'text-right' },
            { data: 'solde', sClass: 'text-right' },
        ],
        dom: '<"row"<"col-sm-12 col-md-4"B><"col-sm-12 col-md-8"f>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        buttons: [
            {
                extend: 'print',
                customize: function (win) {
                    $(win.document.body)
                        .css('font-size', '10pt')

                    $(win.document.body)
                        .find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ],
        layout: {
            topStart: 'buttons'
        },
        columnDefs: [
            {
                targets: 3,
                render: $.fn.dataTable.render.number(' ', ',', 0, ''),
            },
            {
                targets: 4,
                render: $.fn.dataTable.render.number(' ', ',', 0, ''),
            },
            {
                targets: 5,
                render: $.fn.dataTable.render.number(' ', ',', 0, ''),
            },
        ]
    });
});