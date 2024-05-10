$('.basic-datatable').dataTable({
    dom: '<"row"<"col-sm-12 col-md-4"B><"col-sm-12 col-md-8"f>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
    language: {
        paginate: {
            previous: '<i class="fa fa-lg fa-angle-left"></i>',
            next: '<i class="fa fa-lg fa-angle-right"></i>'
        },
        url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
    },
    autoWidth: false,
    deferRender: true,
    order: [1, 'asc'],
    buttons: [
        'copy', 'print'
    ]
});