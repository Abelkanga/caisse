$('.basic-datatable').dataTable({
    language: {
        url: '/plugins/i18n/fr-FR.json',
    },
    layout: {
        topEnd: ['buttons'],
        // topStart: ['searchBuilder'],
        topStart: ['search', 'pageLength']
    },
    autoWidth: false,
    deferRender: true,
    order: false,
});