(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _css_app_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./css/app.css */ "./assets/css/app.css");
/* harmony import */ var _js_dataTables_bootstrap__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/dataTables.bootstrap */ "./assets/js/dataTables.bootstrap.js");
/* harmony import */ var _js_dataTables_bootstrap__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_js_dataTables_bootstrap__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var select2_dist_js_select2_min__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! select2/dist/js/select2.min */ "./node_modules/select2/dist/js/select2.min.js");
/* harmony import */ var select2_dist_js_select2_min__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(select2_dist_js_select2_min__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _js_datatables_demo__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./js/datatables-demo */ "./assets/js/datatables-demo.js");
/* harmony import */ var _js_datatables_demo__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_js_datatables_demo__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _js_select2_demo__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./js/select2-demo */ "./assets/js/select2-demo.js");
/* harmony import */ var _js_select2_demo__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_js_select2_demo__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _css_custom_min_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./css/custom.min.css */ "./assets/css/custom.min.css");
/* harmony import */ var _js_datatables_config__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./js/datatables-config */ "./assets/js/datatables-config.js");
/* harmony import */ var _js_datatables_config__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_js_datatables_config__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _js_add_form_collection__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./js/add-form-collection */ "./assets/js/add-form-collection.js");
/* harmony import */ var _js_delete_form_collection__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./js/delete.form.collection */ "./assets/js/delete.form.collection.js");
/* harmony import */ var _js_fdb_form_expense__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./js/fdb/form-expense */ "./assets/js/fdb/form-expense.js");
/* harmony import */ var _js_fdb_form_expense__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_js_fdb_form_expense__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _js_page_billetage__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./js/page/billetage */ "./assets/js/page/billetage.js");
/* harmony import */ var _js_page_billetage__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_js_page_billetage__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _js_page_index__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./js/page/index */ "./assets/js/page/index.js");
/* harmony import */ var _js_page_userNameAuto__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./js/page/userNameAuto */ "./assets/js/page/userNameAuto.js");
/* harmony import */ var _js_page_userNameAuto__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_js_page_userNameAuto__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var datatables_net_bs4_js_dataTables_bootstrap4_min__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! datatables.net-bs4/js/dataTables.bootstrap4.min */ "./node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.mjs");
/* harmony import */ var datatables_net_buttons_js_buttons_print__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! datatables.net-buttons/js/buttons.print */ "./node_modules/datatables.net-buttons/js/buttons.print.mjs");
/* harmony import */ var datatables_net_fixedheader_bs4_js_fixedHeader_bootstrap4_min__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! datatables.net-fixedheader-bs4/js/fixedHeader.bootstrap4.min */ "./node_modules/datatables.net-fixedheader-bs4/js/fixedHeader.bootstrap4.min.mjs");
/* harmony import */ var datatables_net_responsive_bs4_js_responsive_bootstrap4_min__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! datatables.net-responsive-bs4/js/responsive.bootstrap4.min */ "./node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.mjs");
/* harmony import */ var _js_input_mask__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./js/input-mask */ "./assets/js/input-mask.js");
/* harmony import */ var _js_page_fdb__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ./js/page/fdb */ "./assets/js/page/fdb.js");
/* harmony import */ var _js_page_fdb__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(_js_page_fdb__WEBPACK_IMPORTED_MODULE_18__);
/* * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)


__webpack_require__(/*! datatables.net-bs4/css/dataTables.bootstrap4.css */ "./node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css");
__webpack_require__(/*! datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css */ "./node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css");
__webpack_require__(/*! datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css */ "./node_modules/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css");
__webpack_require__(/*! datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css */ "./node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css");


__webpack_require__(/*! inputmask */ "./node_modules/inputmask/dist/inputmask.js");



__webpack_require__(/*! ./plugins/tagsinput/tagsinput.css */ "./assets/plugins/tagsinput/tagsinput.css");












var toastr = __webpack_require__(/*! toastr */ "./node_modules/toastr/toastr.js");
__webpack_require__.g.toastr = toastr;
window.Pusher = __webpack_require__(/*! pusher-js */ "./node_modules/pusher-js/dist/web/pusher.js");
var moment = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
__webpack_require__.g.moment = moment;

(0,_js_input_mask__WEBPACK_IMPORTED_MODULE_17__.runInputmask)();

/***/ }),

/***/ "./assets/js/add-form-collection.js":
/*!******************************************!*\
  !*** ./assets/js/add-form-collection.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _inputMark__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./inputMark */ "./assets/js/inputMark.js");
/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");




var addFormToCollection = function addFormToCollection(e) {
  var dataset = e.currentTarget.dataset;
  var target = document.querySelector(dataset.target);
  var collectionHolder = document.querySelector(dataset.listSelector);
  var wrapper = document.createElement('tr');
  var removeTarget = dataset.removeTarget;
  wrapper.setAttribute('id', "".concat(removeTarget, "_").concat(dataset.index));
  var id = "".concat(removeTarget, "_").concat(dataset.index);
  id = id.substring(6);
  wrapper.setAttribute('data-id', id);
  wrapper.innerHTML = collectionHolder.dataset.prototype.replace(/__name__/g, dataset.index);
  target.append(wrapper);
  dataset.index++;
  $('select.select2').select2({
    width: '100%'
  });
  (0,_inputMark__WEBPACK_IMPORTED_MODULE_3__.runInputmask)();
};
$(document).on('click', '.add_item_link', function (e) {
  addFormToCollection(e);
});

/***/ }),

/***/ "./assets/js/dataTables.bootstrap.js":
/*!*******************************************!*\
  !*** ./assets/js/dataTables.bootstrap.js ***!
  \*******************************************/
/***/ ((module, exports, __webpack_require__) => {

"use strict";
var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

__webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
__webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
__webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
__webpack_require__(/*! core-js/modules/es.array.find.js */ "./node_modules/core-js/modules/es.array.find.js");
__webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
__webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
__webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }
  return _typeof(obj);
}

/*! DataTables Bootstrap 3 integration
 * ©2011-2015 SpryMedia Ltd - datatables.net/license
 */

/**
 * DataTables integration for Bootstrap 3. This requires Bootstrap 3 and
 * DataTables 1.10 or newer.
 *
 * This file sets the defaults and adds options to DataTables to style its
 * controls using Bootstrap. See http://datatables.net/manual/styling/bootstrap
 * for further information.
 */
(function (factory) {
  if (true) {
    // AMD
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js"), __webpack_require__(/*! datatables.net */ "./node_modules/datatables.net/js/jquery.dataTables.mjs")], __WEBPACK_AMD_DEFINE_RESULT__ = (function ($) {
      return factory($, window, document);
    }).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else {}
})(function ($, window, document, undefined) {
  'use strict';

  var DataTable = $.fn.dataTable;
  /* Set the defaults for DataTables initialisation */

  $.extend(true, DataTable.defaults, {
    dom: '<\'text-muted\'i>' + '<\'table-responsive\'tr>' + '<\'mt-4\'p>',
    renderer: 'bootstrap'
  });
  /* Default class modification */

  $.extend(DataTable.ext.classes, {
    sWrapper: 'dataTables_wrapper dt-bootstrap4',
    sFilterInput: 'form-control',
    sLengthSelect: 'custom-select',
    sProcessing: 'dataTables_processing card',
    sPageButton: 'paginate_button page-item'
  });
  /* Bootstrap paging button renderer */

  DataTable.ext.renderer.pageButton.bootstrap = function (settings, host, idx, buttons, page, pages) {
    var api = new DataTable.Api(settings);
    var classes = settings.oClasses;
    var lang = settings.oLanguage.oPaginate;
    var aria = settings.oLanguage.oAria.paginate || {};
    var btnDisplay,
      btnClass,
      counter = 0;
    var attach = function attach(container, buttons) {
      var i, ien, node, button;
      var clickHandler = function clickHandler(e) {
        e.preventDefault();
        if (!$(e.currentTarget).hasClass('disabled') && api.page() != e.data.action) {
          api.page(e.data.action).draw('page');
        }
      };
      for (i = 0, ien = buttons.length; i < ien; i++) {
        button = buttons[i];
        if ($.isArray(button)) {
          attach(container, button);
        } else {
          btnDisplay = '';
          btnClass = '';
          switch (button) {
            case 'ellipsis':
              btnDisplay = '&#x2026;';
              btnClass = 'disabled';
              break;
            case 'first':
              btnDisplay = lang.sFirst;
              btnClass = button + (page > 0 ? '' : ' disabled');
              break;
            case 'previous':
              btnDisplay = lang.sPrevious;
              btnClass = button + (page > 0 ? '' : ' disabled');
              break;
            case 'next':
              btnDisplay = lang.sNext;
              btnClass = button + (page < pages - 1 ? '' : ' disabled');
              break;
            case 'last':
              btnDisplay = lang.sLast;
              btnClass = button + (page < pages - 1 ? '' : ' disabled');
              break;
            default:
              btnDisplay = button + 1;
              btnClass = page === button ? 'active' : '';
              break;
          }
          if (btnDisplay) {
            node = $('<li>', {
              'class': classes.sPageButton + ' ' + btnClass,
              'id': idx === 0 && typeof button === 'string' ? settings.sTableId + '_' + button : null
            }).append($('<a>', {
              'href': '#',
              'aria-controls': settings.sTableId,
              'aria-label': aria[button],
              'data-dt-idx': counter,
              'tabindex': settings.iTabIndex,
              'class': 'page-link'
            }).html(btnDisplay)).appendTo(container);
            settings.oApi._fnBindAction(node, {
              action: button
            }, clickHandler);
            counter++;
          }
        }
      }
    }; // IE9 throws an 'unknown error' if document.activeElement is used
    // inside an iframe or frame.

    var activeEl;
    try {
      // Because this approach is destroying and recreating the paging
      // elements, focus is lost on the select button which is bad for
      // accessibility. So we want to restore focus once the draw has
      // completed
      activeEl = $(host).find(document.activeElement).data('dt-idx');
    } catch (e) {}
    attach($(host).empty().html('<ul class="pagination justify-content-center"/>').children('ul'), buttons);
    if (activeEl !== undefined) {
      $(host).find('[data-dt-idx=' + activeEl + ']').focus();
    }
  };
  return DataTable;
});

/***/ }),

/***/ "./assets/js/datatables-config.js":
/*!****************************************!*\
  !*** ./assets/js/datatables-config.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
// $('.basic-datatable').dataTable({
//     dom: '<"row"<"col-sm-12 col-md-4"B><"col-sm-12 col-md-8"f>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><" "p>>',
//     language: {
//         paginate: {
//             previous: '<i class="fa fa-lg fa-angle-left"></i>',
//             next: '<i class="fa fa-lg fa-angle-right"></i>'
//         },
//         url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
//     },
//     autoWidth: false,
//     deferRender: true,
//     order: [1, 'asc'],
//     buttons: [
//         'copy', 'print'
//     ]
// });
//
// $('.export-datatable').dataTable({
//     dom: '<"row"<"col-sm-12 col-md-4"B><"col-sm-12 col-md-8"f>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
//     language: {
//         paginate: {
//             previous: '<i class="fa fa-lg fa-angle-left"></i>',
//             next: '<i class="fa fa-lg fa-angle-right"></i>'
//         },
//         url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
//     },
//     autoWidth: false,
//     deferRender: true,
//     order: [1, 'asc'],
//     buttons: [
//         'excel', 'pdf', 'csv'
//     ]
// });
//

// assets/js/datatables-configs.js

// Configuration pour toutes les tables avec des boutons d'exportation
$(document).ready(function () {
  $('.basic-datatable, .export-datatable, .report-datatable').DataTable({
    dom: '<"row"<"col-sm-12 col-md-4"B><"col-sm-12 col-md-8"f>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
    language: {
      paginate: {
        previous: '<i class="fa fa-lg fa-angle-left"></i>',
        next: '<i class="fa fa-lg fa-angle-right"></i>'
      },
      url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json' // Chargement de la langue française
    },
    autoWidth: false,
    deferRender: true,
    order: [1, 'asc'],
    buttons: [{
      extend: 'copy',
      text: 'Copier'
    }, {
      extend: 'excel',
      text: 'Exporter en Excel'
    }, {
      extend: 'pdf',
      text: 'Exporter en PDF'
    }, {
      extend: 'csv',
      text: 'Exporter en CSV'
    }, {
      extend: 'print',
      text: 'Imprimer'
    }]
  });
});

/***/ }),

/***/ "./assets/js/datatables-demo.js":
/*!**************************************!*\
  !*** ./assets/js/datatables-demo.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
__webpack_require__(/*! core-js/modules/es.array.find.js */ "./node_modules/core-js/modules/es.array.find.js");
__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
$('.report-datatable').dataTable({
  paging: false,
  searching: false,
  retrieve: true,
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
  buttons: ['copy', 'print']
});
var $formJournalCaisse = $('form[name="form_journal_caisse"]');
$formJournalCaisse.submit(function (e) {
  e.preventDefault();
  var $data = $(this).serialize();
  var tab = $data.split('&');
  var tab2_deb = tab[0].split('=');
  var tab2_fin = tab[1].split('=');
  var debut = tab2_deb[1];
  var fin = tab2_fin[1];
  $('#table_reporting_journal').dataTable({
    bDestroy: true,
    ajax: {
      url: "/caisse/etat?".concat($data),
      dataSrc: ''
    },
    columns: [{
      data: 'date',
      sClass: 'text-center'
    }, {
      data: 'num_piece',
      sClass: 'text-left'
    }, {
      data: 'libelle',
      sClass: 'text-left'
    }, {
      data: 'debit',
      sClass: 'text-right'
    }, {
      data: 'credit',
      sClass: 'text-right'
    }, {
      data: 'solde',
      sClass: 'text-right'
    }],
    dom: '<"row"<"col-sm-12 col-md-4"B><"col-sm-12 col-md-8"f>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
    buttons: [{
      extend: 'print',
      customize: function customize(win) {
        $(win.document.body).css('font-size', '10pt');
        $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
      }
    }],
    layout: {
      topStart: 'buttons'
    },
    columnDefs: [{
      targets: 3,
      render: $.fn.dataTable.render.number(' ', ',', 0, '')
    }, {
      targets: 4,
      render: $.fn.dataTable.render.number(' ', ',', 0, '')
    }, {
      targets: 5,
      render: $.fn.dataTable.render.number(' ', ',', 0, '')
    }]
  });
});

/***/ }),

/***/ "./assets/js/delete.form.collection.js":
/*!*********************************************!*\
  !*** ./assets/js/delete.form.collection.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _inputMark__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./inputMark */ "./assets/js/inputMark.js");
/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

var delFormToCollection = function delFormToCollection(e) {
  var dataset = e.currentTarget.dataset;
  var target = document.querySelector(dataset.target);
  $(target).remove();
  (0,_inputMark__WEBPACK_IMPORTED_MODULE_0__.runInputmask)();
};
$(document).on('click', '.del_item_link', function (e) {
  delFormToCollection(e);
});

/***/ }),

/***/ "./assets/js/fdb/form-expense.js":
/*!***************************************!*\
  !*** ./assets/js/fdb/form-expense.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
__webpack_require__(/*! core-js/modules/es.array.find.js */ "./node_modules/core-js/modules/es.array.find.js");
__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
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

$(document).ready(function () {
  console.log("jQuery is working!");
  var typeExpense$ = $('#fdb_typeExpense');
  typeExpense$.change(function () {
    var form$ = typeExpense$.closest('form');
    var data$ = {};
    data$[typeExpense$.attr('name')] = typeExpense$.val();
    $.ajax({
      url: form$.attr('action'),
      type: form$.attr('method'),
      method: 'POST',
      data: data$,
      complete: function complete(html) {
        $('#fdb_expense').replaceWith($(html.responseText).find('#fdb_expense'));
        $('#fdb_expense').select2();
      }
    });
  });
});

/***/ }),

/***/ "./assets/js/input-mask.js":
/*!*********************************!*\
  !*** ./assets/js/input-mask.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   runInputmask: () => (/* binding */ runInputmask)
/* harmony export */ });
/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
var runInputmask = function runInputmask() {
  $(function () {
    Inputmask('', {
      numericInput: true,
      rightAlign: false,
      autoUnmask: true,
      placeholder: '',
      removeMaskOnSubmit: true,
      groupSeparator: " ",
      greedy: false,
      digits: 0,
      alias: 'currency'
    }).mask('.separator');
  });
};

/***/ }),

/***/ "./assets/js/inputMark.js":
/*!********************************!*\
  !*** ./assets/js/inputMark.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   runInputmask: () => (/* binding */ runInputmask)
/* harmony export */ });
/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
var runInputmask = function runInputmask() {
  $(function () {
    Inputmask('', {
      numericInput: true,
      rightAlign: false,
      autoUnmask: true,
      placeholder: '',
      removeMaskOnSubmit: true,
      groupSeparator: " ",
      greedy: false,
      digits: 0,
      alias: 'currency'
    }).mask('.separator');
  });
};

/***/ }),

/***/ "./assets/js/page/billetage.js":
/*!*************************************!*\
  !*** ./assets/js/page/billetage.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
__webpack_require__(/*! core-js/modules/es.number.constructor.js */ "./node_modules/core-js/modules/es.number.constructor.js");
/**
 /**
 *  billetage billet
 * */

var calculeBillet = function calculeBillet() {
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

var calculeMonnaie = function calculeMonnaie() {
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
  calculeMonnaie();
});
/**
 * */
var calculeMontant = function calculeMontant(e) {
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
};
$('.montant').on('input', function () {
  calculeMontant($(this));
});
$(document).ready(function () {
  calculeBillet();
  calculeMonnaie();
  $('.montant').each(function () {
    calculeMontant($(this));
  });
});

/***/ }),

/***/ "./assets/js/page/fdb.js":
/*!*******************************!*\
  !*** ./assets/js/page/fdb.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
__webpack_require__(/*! core-js/modules/es.array.push.js */ "./node_modules/core-js/modules/es.array.push.js");
__webpack_require__(/*! core-js/modules/es.array.reduce.js */ "./node_modules/core-js/modules/es.array.reduce.js");
__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
$(document).ready(function () {
  calculatePrice();
});
var calculatePrice = function calculatePrice() {
  $('body').on('input', '.price', function () {
    var parentId = $(this).parent().parent().attr('data-id');
    var qte = +$("#".concat(parentId, "_quantite")).val();
    var price = +$(this).val();
    var amount = qte * price;
    $("#".concat(parentId, "_montant")).val(amount);
    calculateTotalAmount();
  });
};
calculatePrice();
var calculateTotalAmount = function calculateTotalAmount() {
  var sumPrice = [];
  var sumAmount = [];
  $('.price').each(function () {
    sumPrice.push(+$(this).val());
  });
  $('.montant').each(function () {
    sumAmount.push(+$(this).val());
  });
  var price;
  var amount;
  if (sumPrice.length > 0) {
    price = sumPrice.reduce(function (previousValue, currentValue) {
      return previousValue + currentValue;
    });
    amount = sumAmount.reduce(function (previousValue, currentValue) {
      return previousValue + currentValue;
    });
  } else {
    price = amount = 0;
  }
  $('#total_price').html(new Intl.NumberFormat('fr-FR').format(price));
  $('#total_montant').html(new Intl.NumberFormat('fr-FR').format(amount));
};
calculateTotalAmount();

/***/ }),

/***/ "./assets/js/page/index.js":
/*!*********************************!*\
  !*** ./assets/js/page/index.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _fdb__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./fdb */ "./assets/js/page/fdb.js");
/* harmony import */ var _fdb__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_fdb__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _billetage__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./billetage */ "./assets/js/page/billetage.js");
/* harmony import */ var _billetage__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_billetage__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./assets/js/page/userNameAuto.js":
/*!****************************************!*\
  !*** ./assets/js/page/userNameAuto.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
__webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
__webpack_require__(/*! core-js/modules/es.string.trim.js */ "./node_modules/core-js/modules/es.string.trim.js");
$(document).ready(function () {
  console.log('Script Loaded'); // Assurez-vous que le script est exécuté

  $('#user_fullName').on('input', function () {
    var fullName = $('#user_fullName').val().toLowerCase().trim();
    var prefix = '';
    if (fullName) {
      // Séparer le prénom et le nom en supposant qu'il y a un espace entre eux
      var nameParts = fullName.split(' ');
      if (nameParts.length > 1) {
        var firstName = nameParts[0];
        var lastName = nameParts[nameParts.length - 1];

        // Prendre les deux premières lettres du prénom et les mettre en majuscules
        var firstNamePrefix = firstName.substring(0, 2).toUpperCase();

        // Utiliser le nom de famille entier
        prefix = lastName + firstNamePrefix;
      } else {
        // Si l'utilisateur ne met qu'un seul mot, on utilise seulement ce mot pour l'identifiant
        prefix = nameParts[0];
      }
    }

    // Générer une chaîne aléatoire de 4 chiffres
    var length = 4;
    var charset = "0123456789";
    var randomString = "";
    for (var i = 0; i < length; i++) {
      randomString += charset.charAt(Math.floor(Math.random() * charset.length));
    }

    // Construire le nom d'utilisateur final
    var username = "".concat(prefix, "_").concat(randomString);

    // Afficher le résultat dans le champ Pseudo (identifiant)
    $('#user_pseudo').val(username);
  });
});

/***/ }),

/***/ "./assets/js/select2-demo.js":
/*!***********************************!*\
  !*** ./assets/js/select2-demo.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
$(document).ready(function () {
  $('.select2').select2({
    width: '100%'
  });
});

/***/ }),

/***/ "./assets/css/app.css":
/*!****************************!*\
  !*** ./assets/css/app.css ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./assets/css/custom.min.css":
/*!***********************************!*\
  !*** ./assets/css/custom.min.css ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./assets/plugins/tagsinput/tagsinput.css":
/*!************************************************!*\
  !*** ./assets/plugins/tagsinput/tagsinput.css ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./node_modules/moment/locale sync recursive ^\\.\\/.*$":
/*!***************************************************!*\
  !*** ./node_modules/moment/locale/ sync ^\.\/.*$ ***!
  \***************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var map = {
	"./af": "./node_modules/moment/locale/af.js",
	"./af.js": "./node_modules/moment/locale/af.js",
	"./ar": "./node_modules/moment/locale/ar.js",
	"./ar-dz": "./node_modules/moment/locale/ar-dz.js",
	"./ar-dz.js": "./node_modules/moment/locale/ar-dz.js",
	"./ar-kw": "./node_modules/moment/locale/ar-kw.js",
	"./ar-kw.js": "./node_modules/moment/locale/ar-kw.js",
	"./ar-ly": "./node_modules/moment/locale/ar-ly.js",
	"./ar-ly.js": "./node_modules/moment/locale/ar-ly.js",
	"./ar-ma": "./node_modules/moment/locale/ar-ma.js",
	"./ar-ma.js": "./node_modules/moment/locale/ar-ma.js",
	"./ar-ps": "./node_modules/moment/locale/ar-ps.js",
	"./ar-ps.js": "./node_modules/moment/locale/ar-ps.js",
	"./ar-sa": "./node_modules/moment/locale/ar-sa.js",
	"./ar-sa.js": "./node_modules/moment/locale/ar-sa.js",
	"./ar-tn": "./node_modules/moment/locale/ar-tn.js",
	"./ar-tn.js": "./node_modules/moment/locale/ar-tn.js",
	"./ar.js": "./node_modules/moment/locale/ar.js",
	"./az": "./node_modules/moment/locale/az.js",
	"./az.js": "./node_modules/moment/locale/az.js",
	"./be": "./node_modules/moment/locale/be.js",
	"./be.js": "./node_modules/moment/locale/be.js",
	"./bg": "./node_modules/moment/locale/bg.js",
	"./bg.js": "./node_modules/moment/locale/bg.js",
	"./bm": "./node_modules/moment/locale/bm.js",
	"./bm.js": "./node_modules/moment/locale/bm.js",
	"./bn": "./node_modules/moment/locale/bn.js",
	"./bn-bd": "./node_modules/moment/locale/bn-bd.js",
	"./bn-bd.js": "./node_modules/moment/locale/bn-bd.js",
	"./bn.js": "./node_modules/moment/locale/bn.js",
	"./bo": "./node_modules/moment/locale/bo.js",
	"./bo.js": "./node_modules/moment/locale/bo.js",
	"./br": "./node_modules/moment/locale/br.js",
	"./br.js": "./node_modules/moment/locale/br.js",
	"./bs": "./node_modules/moment/locale/bs.js",
	"./bs.js": "./node_modules/moment/locale/bs.js",
	"./ca": "./node_modules/moment/locale/ca.js",
	"./ca.js": "./node_modules/moment/locale/ca.js",
	"./cs": "./node_modules/moment/locale/cs.js",
	"./cs.js": "./node_modules/moment/locale/cs.js",
	"./cv": "./node_modules/moment/locale/cv.js",
	"./cv.js": "./node_modules/moment/locale/cv.js",
	"./cy": "./node_modules/moment/locale/cy.js",
	"./cy.js": "./node_modules/moment/locale/cy.js",
	"./da": "./node_modules/moment/locale/da.js",
	"./da.js": "./node_modules/moment/locale/da.js",
	"./de": "./node_modules/moment/locale/de.js",
	"./de-at": "./node_modules/moment/locale/de-at.js",
	"./de-at.js": "./node_modules/moment/locale/de-at.js",
	"./de-ch": "./node_modules/moment/locale/de-ch.js",
	"./de-ch.js": "./node_modules/moment/locale/de-ch.js",
	"./de.js": "./node_modules/moment/locale/de.js",
	"./dv": "./node_modules/moment/locale/dv.js",
	"./dv.js": "./node_modules/moment/locale/dv.js",
	"./el": "./node_modules/moment/locale/el.js",
	"./el.js": "./node_modules/moment/locale/el.js",
	"./en-au": "./node_modules/moment/locale/en-au.js",
	"./en-au.js": "./node_modules/moment/locale/en-au.js",
	"./en-ca": "./node_modules/moment/locale/en-ca.js",
	"./en-ca.js": "./node_modules/moment/locale/en-ca.js",
	"./en-gb": "./node_modules/moment/locale/en-gb.js",
	"./en-gb.js": "./node_modules/moment/locale/en-gb.js",
	"./en-ie": "./node_modules/moment/locale/en-ie.js",
	"./en-ie.js": "./node_modules/moment/locale/en-ie.js",
	"./en-il": "./node_modules/moment/locale/en-il.js",
	"./en-il.js": "./node_modules/moment/locale/en-il.js",
	"./en-in": "./node_modules/moment/locale/en-in.js",
	"./en-in.js": "./node_modules/moment/locale/en-in.js",
	"./en-nz": "./node_modules/moment/locale/en-nz.js",
	"./en-nz.js": "./node_modules/moment/locale/en-nz.js",
	"./en-sg": "./node_modules/moment/locale/en-sg.js",
	"./en-sg.js": "./node_modules/moment/locale/en-sg.js",
	"./eo": "./node_modules/moment/locale/eo.js",
	"./eo.js": "./node_modules/moment/locale/eo.js",
	"./es": "./node_modules/moment/locale/es.js",
	"./es-do": "./node_modules/moment/locale/es-do.js",
	"./es-do.js": "./node_modules/moment/locale/es-do.js",
	"./es-mx": "./node_modules/moment/locale/es-mx.js",
	"./es-mx.js": "./node_modules/moment/locale/es-mx.js",
	"./es-us": "./node_modules/moment/locale/es-us.js",
	"./es-us.js": "./node_modules/moment/locale/es-us.js",
	"./es.js": "./node_modules/moment/locale/es.js",
	"./et": "./node_modules/moment/locale/et.js",
	"./et.js": "./node_modules/moment/locale/et.js",
	"./eu": "./node_modules/moment/locale/eu.js",
	"./eu.js": "./node_modules/moment/locale/eu.js",
	"./fa": "./node_modules/moment/locale/fa.js",
	"./fa.js": "./node_modules/moment/locale/fa.js",
	"./fi": "./node_modules/moment/locale/fi.js",
	"./fi.js": "./node_modules/moment/locale/fi.js",
	"./fil": "./node_modules/moment/locale/fil.js",
	"./fil.js": "./node_modules/moment/locale/fil.js",
	"./fo": "./node_modules/moment/locale/fo.js",
	"./fo.js": "./node_modules/moment/locale/fo.js",
	"./fr": "./node_modules/moment/locale/fr.js",
	"./fr-ca": "./node_modules/moment/locale/fr-ca.js",
	"./fr-ca.js": "./node_modules/moment/locale/fr-ca.js",
	"./fr-ch": "./node_modules/moment/locale/fr-ch.js",
	"./fr-ch.js": "./node_modules/moment/locale/fr-ch.js",
	"./fr.js": "./node_modules/moment/locale/fr.js",
	"./fy": "./node_modules/moment/locale/fy.js",
	"./fy.js": "./node_modules/moment/locale/fy.js",
	"./ga": "./node_modules/moment/locale/ga.js",
	"./ga.js": "./node_modules/moment/locale/ga.js",
	"./gd": "./node_modules/moment/locale/gd.js",
	"./gd.js": "./node_modules/moment/locale/gd.js",
	"./gl": "./node_modules/moment/locale/gl.js",
	"./gl.js": "./node_modules/moment/locale/gl.js",
	"./gom-deva": "./node_modules/moment/locale/gom-deva.js",
	"./gom-deva.js": "./node_modules/moment/locale/gom-deva.js",
	"./gom-latn": "./node_modules/moment/locale/gom-latn.js",
	"./gom-latn.js": "./node_modules/moment/locale/gom-latn.js",
	"./gu": "./node_modules/moment/locale/gu.js",
	"./gu.js": "./node_modules/moment/locale/gu.js",
	"./he": "./node_modules/moment/locale/he.js",
	"./he.js": "./node_modules/moment/locale/he.js",
	"./hi": "./node_modules/moment/locale/hi.js",
	"./hi.js": "./node_modules/moment/locale/hi.js",
	"./hr": "./node_modules/moment/locale/hr.js",
	"./hr.js": "./node_modules/moment/locale/hr.js",
	"./hu": "./node_modules/moment/locale/hu.js",
	"./hu.js": "./node_modules/moment/locale/hu.js",
	"./hy-am": "./node_modules/moment/locale/hy-am.js",
	"./hy-am.js": "./node_modules/moment/locale/hy-am.js",
	"./id": "./node_modules/moment/locale/id.js",
	"./id.js": "./node_modules/moment/locale/id.js",
	"./is": "./node_modules/moment/locale/is.js",
	"./is.js": "./node_modules/moment/locale/is.js",
	"./it": "./node_modules/moment/locale/it.js",
	"./it-ch": "./node_modules/moment/locale/it-ch.js",
	"./it-ch.js": "./node_modules/moment/locale/it-ch.js",
	"./it.js": "./node_modules/moment/locale/it.js",
	"./ja": "./node_modules/moment/locale/ja.js",
	"./ja.js": "./node_modules/moment/locale/ja.js",
	"./jv": "./node_modules/moment/locale/jv.js",
	"./jv.js": "./node_modules/moment/locale/jv.js",
	"./ka": "./node_modules/moment/locale/ka.js",
	"./ka.js": "./node_modules/moment/locale/ka.js",
	"./kk": "./node_modules/moment/locale/kk.js",
	"./kk.js": "./node_modules/moment/locale/kk.js",
	"./km": "./node_modules/moment/locale/km.js",
	"./km.js": "./node_modules/moment/locale/km.js",
	"./kn": "./node_modules/moment/locale/kn.js",
	"./kn.js": "./node_modules/moment/locale/kn.js",
	"./ko": "./node_modules/moment/locale/ko.js",
	"./ko.js": "./node_modules/moment/locale/ko.js",
	"./ku": "./node_modules/moment/locale/ku.js",
	"./ku-kmr": "./node_modules/moment/locale/ku-kmr.js",
	"./ku-kmr.js": "./node_modules/moment/locale/ku-kmr.js",
	"./ku.js": "./node_modules/moment/locale/ku.js",
	"./ky": "./node_modules/moment/locale/ky.js",
	"./ky.js": "./node_modules/moment/locale/ky.js",
	"./lb": "./node_modules/moment/locale/lb.js",
	"./lb.js": "./node_modules/moment/locale/lb.js",
	"./lo": "./node_modules/moment/locale/lo.js",
	"./lo.js": "./node_modules/moment/locale/lo.js",
	"./lt": "./node_modules/moment/locale/lt.js",
	"./lt.js": "./node_modules/moment/locale/lt.js",
	"./lv": "./node_modules/moment/locale/lv.js",
	"./lv.js": "./node_modules/moment/locale/lv.js",
	"./me": "./node_modules/moment/locale/me.js",
	"./me.js": "./node_modules/moment/locale/me.js",
	"./mi": "./node_modules/moment/locale/mi.js",
	"./mi.js": "./node_modules/moment/locale/mi.js",
	"./mk": "./node_modules/moment/locale/mk.js",
	"./mk.js": "./node_modules/moment/locale/mk.js",
	"./ml": "./node_modules/moment/locale/ml.js",
	"./ml.js": "./node_modules/moment/locale/ml.js",
	"./mn": "./node_modules/moment/locale/mn.js",
	"./mn.js": "./node_modules/moment/locale/mn.js",
	"./mr": "./node_modules/moment/locale/mr.js",
	"./mr.js": "./node_modules/moment/locale/mr.js",
	"./ms": "./node_modules/moment/locale/ms.js",
	"./ms-my": "./node_modules/moment/locale/ms-my.js",
	"./ms-my.js": "./node_modules/moment/locale/ms-my.js",
	"./ms.js": "./node_modules/moment/locale/ms.js",
	"./mt": "./node_modules/moment/locale/mt.js",
	"./mt.js": "./node_modules/moment/locale/mt.js",
	"./my": "./node_modules/moment/locale/my.js",
	"./my.js": "./node_modules/moment/locale/my.js",
	"./nb": "./node_modules/moment/locale/nb.js",
	"./nb.js": "./node_modules/moment/locale/nb.js",
	"./ne": "./node_modules/moment/locale/ne.js",
	"./ne.js": "./node_modules/moment/locale/ne.js",
	"./nl": "./node_modules/moment/locale/nl.js",
	"./nl-be": "./node_modules/moment/locale/nl-be.js",
	"./nl-be.js": "./node_modules/moment/locale/nl-be.js",
	"./nl.js": "./node_modules/moment/locale/nl.js",
	"./nn": "./node_modules/moment/locale/nn.js",
	"./nn.js": "./node_modules/moment/locale/nn.js",
	"./oc-lnc": "./node_modules/moment/locale/oc-lnc.js",
	"./oc-lnc.js": "./node_modules/moment/locale/oc-lnc.js",
	"./pa-in": "./node_modules/moment/locale/pa-in.js",
	"./pa-in.js": "./node_modules/moment/locale/pa-in.js",
	"./pl": "./node_modules/moment/locale/pl.js",
	"./pl.js": "./node_modules/moment/locale/pl.js",
	"./pt": "./node_modules/moment/locale/pt.js",
	"./pt-br": "./node_modules/moment/locale/pt-br.js",
	"./pt-br.js": "./node_modules/moment/locale/pt-br.js",
	"./pt.js": "./node_modules/moment/locale/pt.js",
	"./ro": "./node_modules/moment/locale/ro.js",
	"./ro.js": "./node_modules/moment/locale/ro.js",
	"./ru": "./node_modules/moment/locale/ru.js",
	"./ru.js": "./node_modules/moment/locale/ru.js",
	"./sd": "./node_modules/moment/locale/sd.js",
	"./sd.js": "./node_modules/moment/locale/sd.js",
	"./se": "./node_modules/moment/locale/se.js",
	"./se.js": "./node_modules/moment/locale/se.js",
	"./si": "./node_modules/moment/locale/si.js",
	"./si.js": "./node_modules/moment/locale/si.js",
	"./sk": "./node_modules/moment/locale/sk.js",
	"./sk.js": "./node_modules/moment/locale/sk.js",
	"./sl": "./node_modules/moment/locale/sl.js",
	"./sl.js": "./node_modules/moment/locale/sl.js",
	"./sq": "./node_modules/moment/locale/sq.js",
	"./sq.js": "./node_modules/moment/locale/sq.js",
	"./sr": "./node_modules/moment/locale/sr.js",
	"./sr-cyrl": "./node_modules/moment/locale/sr-cyrl.js",
	"./sr-cyrl.js": "./node_modules/moment/locale/sr-cyrl.js",
	"./sr.js": "./node_modules/moment/locale/sr.js",
	"./ss": "./node_modules/moment/locale/ss.js",
	"./ss.js": "./node_modules/moment/locale/ss.js",
	"./sv": "./node_modules/moment/locale/sv.js",
	"./sv.js": "./node_modules/moment/locale/sv.js",
	"./sw": "./node_modules/moment/locale/sw.js",
	"./sw.js": "./node_modules/moment/locale/sw.js",
	"./ta": "./node_modules/moment/locale/ta.js",
	"./ta.js": "./node_modules/moment/locale/ta.js",
	"./te": "./node_modules/moment/locale/te.js",
	"./te.js": "./node_modules/moment/locale/te.js",
	"./tet": "./node_modules/moment/locale/tet.js",
	"./tet.js": "./node_modules/moment/locale/tet.js",
	"./tg": "./node_modules/moment/locale/tg.js",
	"./tg.js": "./node_modules/moment/locale/tg.js",
	"./th": "./node_modules/moment/locale/th.js",
	"./th.js": "./node_modules/moment/locale/th.js",
	"./tk": "./node_modules/moment/locale/tk.js",
	"./tk.js": "./node_modules/moment/locale/tk.js",
	"./tl-ph": "./node_modules/moment/locale/tl-ph.js",
	"./tl-ph.js": "./node_modules/moment/locale/tl-ph.js",
	"./tlh": "./node_modules/moment/locale/tlh.js",
	"./tlh.js": "./node_modules/moment/locale/tlh.js",
	"./tr": "./node_modules/moment/locale/tr.js",
	"./tr.js": "./node_modules/moment/locale/tr.js",
	"./tzl": "./node_modules/moment/locale/tzl.js",
	"./tzl.js": "./node_modules/moment/locale/tzl.js",
	"./tzm": "./node_modules/moment/locale/tzm.js",
	"./tzm-latn": "./node_modules/moment/locale/tzm-latn.js",
	"./tzm-latn.js": "./node_modules/moment/locale/tzm-latn.js",
	"./tzm.js": "./node_modules/moment/locale/tzm.js",
	"./ug-cn": "./node_modules/moment/locale/ug-cn.js",
	"./ug-cn.js": "./node_modules/moment/locale/ug-cn.js",
	"./uk": "./node_modules/moment/locale/uk.js",
	"./uk.js": "./node_modules/moment/locale/uk.js",
	"./ur": "./node_modules/moment/locale/ur.js",
	"./ur.js": "./node_modules/moment/locale/ur.js",
	"./uz": "./node_modules/moment/locale/uz.js",
	"./uz-latn": "./node_modules/moment/locale/uz-latn.js",
	"./uz-latn.js": "./node_modules/moment/locale/uz-latn.js",
	"./uz.js": "./node_modules/moment/locale/uz.js",
	"./vi": "./node_modules/moment/locale/vi.js",
	"./vi.js": "./node_modules/moment/locale/vi.js",
	"./x-pseudo": "./node_modules/moment/locale/x-pseudo.js",
	"./x-pseudo.js": "./node_modules/moment/locale/x-pseudo.js",
	"./yo": "./node_modules/moment/locale/yo.js",
	"./yo.js": "./node_modules/moment/locale/yo.js",
	"./zh-cn": "./node_modules/moment/locale/zh-cn.js",
	"./zh-cn.js": "./node_modules/moment/locale/zh-cn.js",
	"./zh-hk": "./node_modules/moment/locale/zh-hk.js",
	"./zh-hk.js": "./node_modules/moment/locale/zh-hk.js",
	"./zh-mo": "./node_modules/moment/locale/zh-mo.js",
	"./zh-mo.js": "./node_modules/moment/locale/zh-mo.js",
	"./zh-tw": "./node_modules/moment/locale/zh-tw.js",
	"./zh-tw.js": "./node_modules/moment/locale/zh-tw.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./node_modules/moment/locale sync recursive ^\\.\\/.*$";

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_inputmask_dist_inputmask_js-node_modules_datatables_net-bs4_css_dataTabl-49d957"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QyxPQUFPLENBQUM7SUFBQ0MsS0FBSyxFQUFFO0VBQU0sQ0FBQyxDQUFDO0FBQzFDLENBQUMsQ0FBQzs7Ozs7Ozs7Ozs7O0FDRkY7Ozs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvYWRkLWZvcm0tY29sbGVjdGlvbi5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvZGF0YVRhYmxlcy5ib290c3RyYXAuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2RhdGF0YWJsZXMtY29uZmlnLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9kYXRhdGFibGVzLWRlbW8uanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2RlbGV0ZS5mb3JtLmNvbGxlY3Rpb24uanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2ZkYi9mb3JtLWV4cGVuc2UuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2lucHV0LW1hc2suanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2lucHV0TWFyay5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvcGFnZS9iaWxsZXRhZ2UuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL3BhZ2UvZmRiLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9wYWdlL2luZGV4LmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9wYWdlL3VzZXJOYW1lQXV0by5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvc2VsZWN0Mi1kZW1vLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9jc3MvYXBwLmNzcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2N1c3RvbS5taW4uY3NzP2Y5NzYiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3BsdWdpbnMvdGFnc2lucHV0L3RhZ3NpbnB1dC5jc3M/MjlkNiIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS8gc3luYyBeXFwuXFwvLiokIl0sInNvdXJjZXNDb250ZW50IjpbIi8qICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxuICpcbiAqIFdlIHJlY29tbWVuZCBpbmNsdWRpbmcgdGhlIGJ1aWx0IHZlcnNpb24gb2YgdGhpcyBKYXZhU2NyaXB0IGZpbGUgKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxuICovXG4vLyBhbnkgQ1NTIHlvdSBpbXBvcnQgd2lsbCBvdXRwdXQgaW50byBhIHNpbmdsZSBjc3MgZmlsZSAoYXBwLmNzcyBpbiB0aGlzIGNhc2UpXG5cblxuaW1wb3J0ICcuL2Nzcy9hcHAuY3NzJztcbnJlcXVpcmUoJ2RhdGF0YWJsZXMubmV0LWJzNC9jc3MvZGF0YVRhYmxlcy5ib290c3RyYXA0LmNzcycpXG5yZXF1aXJlKCdkYXRhdGFibGVzLm5ldC1idXR0b25zLWJzNC9jc3MvYnV0dG9ucy5ib290c3RyYXA0Lm1pbi5jc3MnKVxucmVxdWlyZSgnZGF0YXRhYmxlcy5uZXQtZml4ZWRoZWFkZXItYnM0L2Nzcy9maXhlZEhlYWRlci5ib290c3RyYXA0Lm1pbi5jc3MnKVxucmVxdWlyZSgnZGF0YXRhYmxlcy5uZXQtcmVzcG9uc2l2ZS1iczQvY3NzL3Jlc3BvbnNpdmUuYm9vdHN0cmFwNC5taW4uY3NzJylcbmltcG9ydCAnLi9qcy9kYXRhVGFibGVzLmJvb3RzdHJhcCc7XG5pbXBvcnQgJ3NlbGVjdDIvZGlzdC9qcy9zZWxlY3QyLm1pbidcbnJlcXVpcmUoJ2lucHV0bWFzaycpO1xuaW1wb3J0ICcuL2pzL2RhdGF0YWJsZXMtZGVtbyc7XG5pbXBvcnQgJy4vanMvc2VsZWN0Mi1kZW1vJztcbmltcG9ydCAnLi9jc3MvY3VzdG9tLm1pbi5jc3MnO1xuXG5cblxucmVxdWlyZSgnLi9wbHVnaW5zL3RhZ3NpbnB1dC90YWdzaW5wdXQuY3NzJyk7XG5pbXBvcnQgJy4vanMvZGF0YXRhYmxlcy1jb25maWcnO1xuaW1wb3J0ICcuL2pzL2FkZC1mb3JtLWNvbGxlY3Rpb24nO1xuaW1wb3J0ICcuL2pzL2RlbGV0ZS5mb3JtLmNvbGxlY3Rpb24nXG5pbXBvcnQgJy4vanMvZmRiL2Zvcm0tZXhwZW5zZSdcbmltcG9ydCAnLi9qcy9wYWdlL2JpbGxldGFnZSdcbmltcG9ydCAnLi9qcy9wYWdlL2luZGV4J1xuaW1wb3J0ICcuL2pzL3BhZ2UvdXNlck5hbWVBdXRvJ1xuaW1wb3J0ICdkYXRhdGFibGVzLm5ldC1iczQvanMvZGF0YVRhYmxlcy5ib290c3RyYXA0Lm1pbidcbmltcG9ydCAnZGF0YXRhYmxlcy5uZXQtYnV0dG9ucy9qcy9idXR0b25zLnByaW50J1xuaW1wb3J0ICdkYXRhdGFibGVzLm5ldC1maXhlZGhlYWRlci1iczQvanMvZml4ZWRIZWFkZXIuYm9vdHN0cmFwNC5taW4nXG5pbXBvcnQgJ2RhdGF0YWJsZXMubmV0LXJlc3BvbnNpdmUtYnM0L2pzL3Jlc3BvbnNpdmUuYm9vdHN0cmFwNC5taW4nXG5cbmltcG9ydCB7IHJ1bklucHV0bWFzayB9IGZyb20gXCIuL2pzL2lucHV0LW1hc2tcIjtcblxuXG5cbmNvbnN0IHRvYXN0ciA9IHJlcXVpcmUoJ3RvYXN0cicpO1xuZ2xvYmFsLnRvYXN0ciA9IHRvYXN0cjtcblxud2luZG93LlB1c2hlciA9IHJlcXVpcmUoJ3B1c2hlci1qcycpO1xuXG5jb25zdCBtb21lbnQgPSByZXF1aXJlKCdtb21lbnQnKVxuZ2xvYmFsLm1vbWVudCA9IG1vbWVudDtcblxuXG5pbXBvcnQgJy4vanMvcGFnZS9mZGInO1xuXG4gcnVuSW5wdXRtYXNrKCk7XG4iLCJpbXBvcnQgeyBydW5JbnB1dG1hc2sgfSBmcm9tIFwiLi9pbnB1dE1hcmtcIjtcblxuY29uc3QgYWRkRm9ybVRvQ29sbGVjdGlvbiA9IChlKSA9PiB7XG4gICAgY29uc3QgZGF0YXNldCA9IGUuY3VycmVudFRhcmdldC5kYXRhc2V0O1xuICAgIGNvbnN0IHRhcmdldCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoZGF0YXNldC50YXJnZXQpO1xuICAgIGNvbnN0IGNvbGxlY3Rpb25Ib2xkZXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKGRhdGFzZXQubGlzdFNlbGVjdG9yKTtcbiAgICBjb25zdCB3cmFwcGVyID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgndHInKTtcbiAgICBjb25zdCByZW1vdmVUYXJnZXQgPSBkYXRhc2V0LnJlbW92ZVRhcmdldDtcbiAgICB3cmFwcGVyLnNldEF0dHJpYnV0ZSgnaWQnLCBgJHtyZW1vdmVUYXJnZXR9XyR7ZGF0YXNldC5pbmRleH1gKVxuICAgIGxldCBpZCA9IGAke3JlbW92ZVRhcmdldH1fJHtkYXRhc2V0LmluZGV4fWA7XG4gICAgaWQgPSBpZC5zdWJzdHJpbmcoNik7XG5cbiAgICB3cmFwcGVyLnNldEF0dHJpYnV0ZSgnZGF0YS1pZCcsIGlkKVxuICAgIHdyYXBwZXIuaW5uZXJIVE1MID0gY29sbGVjdGlvbkhvbGRlclxuICAgICAgICAuZGF0YXNldFxuICAgICAgICAucHJvdG90eXBlXG4gICAgICAgIC5yZXBsYWNlKFxuICAgICAgICAgICAgL19fbmFtZV9fL2csXG4gICAgICAgICAgICBkYXRhc2V0LmluZGV4XG4gICAgICAgICk7XG4gICAgdGFyZ2V0LmFwcGVuZCh3cmFwcGVyKTtcbiAgICBkYXRhc2V0LmluZGV4Kys7XG4gICAgJCgnc2VsZWN0LnNlbGVjdDInKS5zZWxlY3QyKHsgd2lkdGg6ICcxMDAlJyB9KVxuICAgIHJ1bklucHV0bWFzaygpO1xufTtcblxuJChkb2N1bWVudCkub24oJ2NsaWNrJywgJy5hZGRfaXRlbV9saW5rJywgZSA9PiB7XG4gICAgYWRkRm9ybVRvQ29sbGVjdGlvbihlKVxufSk7IiwiXCJ1c2Ugc3RyaWN0XCI7XG5cbmZ1bmN0aW9uIF90eXBlb2Yob2JqKSB7IFwiQGJhYmVsL2hlbHBlcnMgLSB0eXBlb2ZcIjsgaWYgKHR5cGVvZiBTeW1ib2wgPT09IFwiZnVuY3Rpb25cIiAmJiB0eXBlb2YgU3ltYm9sLml0ZXJhdG9yID09PSBcInN5bWJvbFwiKSB7IF90eXBlb2YgPSBmdW5jdGlvbiBfdHlwZW9mKG9iaikgeyByZXR1cm4gdHlwZW9mIG9iajsgfTsgfSBlbHNlIHsgX3R5cGVvZiA9IGZ1bmN0aW9uIF90eXBlb2Yob2JqKSB7IHJldHVybiBvYmogJiYgdHlwZW9mIFN5bWJvbCA9PT0gXCJmdW5jdGlvblwiICYmIG9iai5jb25zdHJ1Y3RvciA9PT0gU3ltYm9sICYmIG9iaiAhPT0gU3ltYm9sLnByb3RvdHlwZSA/IFwic3ltYm9sXCIgOiB0eXBlb2Ygb2JqOyB9OyB9IHJldHVybiBfdHlwZW9mKG9iaik7IH1cblxuLyohIERhdGFUYWJsZXMgQm9vdHN0cmFwIDMgaW50ZWdyYXRpb25cbiAqIMKpMjAxMS0yMDE1IFNwcnlNZWRpYSBMdGQgLSBkYXRhdGFibGVzLm5ldC9saWNlbnNlXG4gKi9cblxuLyoqXG4gKiBEYXRhVGFibGVzIGludGVncmF0aW9uIGZvciBCb290c3RyYXAgMy4gVGhpcyByZXF1aXJlcyBCb290c3RyYXAgMyBhbmRcbiAqIERhdGFUYWJsZXMgMS4xMCBvciBuZXdlci5cbiAqXG4gKiBUaGlzIGZpbGUgc2V0cyB0aGUgZGVmYXVsdHMgYW5kIGFkZHMgb3B0aW9ucyB0byBEYXRhVGFibGVzIHRvIHN0eWxlIGl0c1xuICogY29udHJvbHMgdXNpbmcgQm9vdHN0cmFwLiBTZWUgaHR0cDovL2RhdGF0YWJsZXMubmV0L21hbnVhbC9zdHlsaW5nL2Jvb3RzdHJhcFxuICogZm9yIGZ1cnRoZXIgaW5mb3JtYXRpb24uXG4gKi9cbihmdW5jdGlvbiAoZmFjdG9yeSkge1xuICBpZiAodHlwZW9mIGRlZmluZSA9PT0gJ2Z1bmN0aW9uJyAmJiBkZWZpbmUuYW1kKSB7XG4gICAgLy8gQU1EXG4gICAgZGVmaW5lKFsnanF1ZXJ5JywgJ2RhdGF0YWJsZXMubmV0J10sIGZ1bmN0aW9uICgkKSB7XG4gICAgICByZXR1cm4gZmFjdG9yeSgkLCB3aW5kb3csIGRvY3VtZW50KTtcbiAgICB9KTtcbiAgfSBlbHNlIGlmICgodHlwZW9mIGV4cG9ydHMgPT09IFwidW5kZWZpbmVkXCIgPyBcInVuZGVmaW5lZFwiIDogX3R5cGVvZihleHBvcnRzKSkgPT09ICdvYmplY3QnKSB7XG4gICAgLy8gQ29tbW9uSlNcbiAgICBtb2R1bGUuZXhwb3J0cyA9IGZ1bmN0aW9uIChyb290LCAkKSB7XG4gICAgICBpZiAoIXJvb3QpIHtcbiAgICAgICAgcm9vdCA9IHdpbmRvdztcbiAgICAgIH1cblxuICAgICAgaWYgKCEkIHx8ICEkLmZuLmRhdGFUYWJsZSkge1xuICAgICAgICAvLyBSZXF1aXJlIERhdGFUYWJsZXMsIHdoaWNoIGF0dGFjaGVzIHRvIGpRdWVyeSwgaW5jbHVkaW5nXG4gICAgICAgIC8vIGpRdWVyeSBpZiBuZWVkZWQgYW5kIGhhdmUgYSAkIHByb3BlcnR5IHNvIHdlIGNhbiBhY2Nlc3MgdGhlXG4gICAgICAgIC8vIGpRdWVyeSBvYmplY3QgdGhhdCBpcyB1c2VkXG4gICAgICAgICQgPSByZXF1aXJlKCdkYXRhdGFibGVzLm5ldCcpKHJvb3QsICQpLiQ7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiBmYWN0b3J5KCQsIHJvb3QsIHJvb3QuZG9jdW1lbnQpO1xuICAgIH07XG4gIH0gZWxzZSB7XG4gICAgLy8gQnJvd3NlclxuICAgIGZhY3RvcnkoalF1ZXJ5LCB3aW5kb3csIGRvY3VtZW50KTtcbiAgfVxufSkoZnVuY3Rpb24gKCQsIHdpbmRvdywgZG9jdW1lbnQsIHVuZGVmaW5lZCkge1xuICAndXNlIHN0cmljdCc7XG5cbiAgdmFyIERhdGFUYWJsZSA9ICQuZm4uZGF0YVRhYmxlO1xuICAvKiBTZXQgdGhlIGRlZmF1bHRzIGZvciBEYXRhVGFibGVzIGluaXRpYWxpc2F0aW9uICovXG5cbiAgJC5leHRlbmQodHJ1ZSwgRGF0YVRhYmxlLmRlZmF1bHRzLCB7XG4gICAgZG9tOiAnPFxcJ3RleHQtbXV0ZWRcXCdpPicgKyAnPFxcJ3RhYmxlLXJlc3BvbnNpdmVcXCd0cj4nICsgJzxcXCdtdC00XFwncD4nLFxuICAgIHJlbmRlcmVyOiAnYm9vdHN0cmFwJ1xuICB9KTtcbiAgLyogRGVmYXVsdCBjbGFzcyBtb2RpZmljYXRpb24gKi9cblxuICAkLmV4dGVuZChEYXRhVGFibGUuZXh0LmNsYXNzZXMsIHtcbiAgICBzV3JhcHBlcjogJ2RhdGFUYWJsZXNfd3JhcHBlciBkdC1ib290c3RyYXA0JyxcbiAgICBzRmlsdGVySW5wdXQ6ICdmb3JtLWNvbnRyb2wnLFxuICAgIHNMZW5ndGhTZWxlY3Q6ICdjdXN0b20tc2VsZWN0JyxcbiAgICBzUHJvY2Vzc2luZzogJ2RhdGFUYWJsZXNfcHJvY2Vzc2luZyBjYXJkJyxcbiAgICBzUGFnZUJ1dHRvbjogJ3BhZ2luYXRlX2J1dHRvbiBwYWdlLWl0ZW0nXG4gIH0pO1xuICAvKiBCb290c3RyYXAgcGFnaW5nIGJ1dHRvbiByZW5kZXJlciAqL1xuXG4gIERhdGFUYWJsZS5leHQucmVuZGVyZXIucGFnZUJ1dHRvbi5ib290c3RyYXAgPSBmdW5jdGlvbiAoc2V0dGluZ3MsIGhvc3QsIGlkeCwgYnV0dG9ucywgcGFnZSwgcGFnZXMpIHtcbiAgICB2YXIgYXBpID0gbmV3IERhdGFUYWJsZS5BcGkoc2V0dGluZ3MpO1xuICAgIHZhciBjbGFzc2VzID0gc2V0dGluZ3Mub0NsYXNzZXM7XG4gICAgdmFyIGxhbmcgPSBzZXR0aW5ncy5vTGFuZ3VhZ2Uub1BhZ2luYXRlO1xuICAgIHZhciBhcmlhID0gc2V0dGluZ3Mub0xhbmd1YWdlLm9BcmlhLnBhZ2luYXRlIHx8IHt9O1xuICAgIHZhciBidG5EaXNwbGF5LFxuICAgICAgICBidG5DbGFzcyxcbiAgICAgICAgY291bnRlciA9IDA7XG5cbiAgICB2YXIgYXR0YWNoID0gZnVuY3Rpb24gYXR0YWNoKGNvbnRhaW5lciwgYnV0dG9ucykge1xuICAgICAgdmFyIGksIGllbiwgbm9kZSwgYnV0dG9uO1xuXG4gICAgICB2YXIgY2xpY2tIYW5kbGVyID0gZnVuY3Rpb24gY2xpY2tIYW5kbGVyKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgICAgIGlmICghJChlLmN1cnJlbnRUYXJnZXQpLmhhc0NsYXNzKCdkaXNhYmxlZCcpICYmIGFwaS5wYWdlKCkgIT0gZS5kYXRhLmFjdGlvbikge1xuICAgICAgICAgIGFwaS5wYWdlKGUuZGF0YS5hY3Rpb24pLmRyYXcoJ3BhZ2UnKTtcbiAgICAgICAgfVxuICAgICAgfTtcblxuICAgICAgZm9yIChpID0gMCwgaWVuID0gYnV0dG9ucy5sZW5ndGg7IGkgPCBpZW47IGkrKykge1xuICAgICAgICBidXR0b24gPSBidXR0b25zW2ldO1xuXG4gICAgICAgIGlmICgkLmlzQXJyYXkoYnV0dG9uKSkge1xuICAgICAgICAgIGF0dGFjaChjb250YWluZXIsIGJ1dHRvbik7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgYnRuRGlzcGxheSA9ICcnO1xuICAgICAgICAgIGJ0bkNsYXNzID0gJyc7XG5cbiAgICAgICAgICBzd2l0Y2ggKGJ1dHRvbikge1xuICAgICAgICAgICAgY2FzZSAnZWxsaXBzaXMnOlxuICAgICAgICAgICAgICBidG5EaXNwbGF5ID0gJyYjeDIwMjY7JztcbiAgICAgICAgICAgICAgYnRuQ2xhc3MgPSAnZGlzYWJsZWQnO1xuICAgICAgICAgICAgICBicmVhaztcblxuICAgICAgICAgICAgY2FzZSAnZmlyc3QnOlxuICAgICAgICAgICAgICBidG5EaXNwbGF5ID0gbGFuZy5zRmlyc3Q7XG4gICAgICAgICAgICAgIGJ0bkNsYXNzID0gYnV0dG9uICsgKHBhZ2UgPiAwID8gJycgOiAnIGRpc2FibGVkJyk7XG4gICAgICAgICAgICAgIGJyZWFrO1xuXG4gICAgICAgICAgICBjYXNlICdwcmV2aW91cyc6XG4gICAgICAgICAgICAgIGJ0bkRpc3BsYXkgPSBsYW5nLnNQcmV2aW91cztcbiAgICAgICAgICAgICAgYnRuQ2xhc3MgPSBidXR0b24gKyAocGFnZSA+IDAgPyAnJyA6ICcgZGlzYWJsZWQnKTtcbiAgICAgICAgICAgICAgYnJlYWs7XG5cbiAgICAgICAgICAgIGNhc2UgJ25leHQnOlxuICAgICAgICAgICAgICBidG5EaXNwbGF5ID0gbGFuZy5zTmV4dDtcbiAgICAgICAgICAgICAgYnRuQ2xhc3MgPSBidXR0b24gKyAocGFnZSA8IHBhZ2VzIC0gMSA/ICcnIDogJyBkaXNhYmxlZCcpO1xuICAgICAgICAgICAgICBicmVhaztcblxuICAgICAgICAgICAgY2FzZSAnbGFzdCc6XG4gICAgICAgICAgICAgIGJ0bkRpc3BsYXkgPSBsYW5nLnNMYXN0O1xuICAgICAgICAgICAgICBidG5DbGFzcyA9IGJ1dHRvbiArIChwYWdlIDwgcGFnZXMgLSAxID8gJycgOiAnIGRpc2FibGVkJyk7XG4gICAgICAgICAgICAgIGJyZWFrO1xuXG4gICAgICAgICAgICBkZWZhdWx0OlxuICAgICAgICAgICAgICBidG5EaXNwbGF5ID0gYnV0dG9uICsgMTtcbiAgICAgICAgICAgICAgYnRuQ2xhc3MgPSBwYWdlID09PSBidXR0b24gPyAnYWN0aXZlJyA6ICcnO1xuICAgICAgICAgICAgICBicmVhaztcbiAgICAgICAgICB9XG5cbiAgICAgICAgICBpZiAoYnRuRGlzcGxheSkge1xuICAgICAgICAgICAgbm9kZSA9ICQoJzxsaT4nLCB7XG4gICAgICAgICAgICAgICdjbGFzcyc6IGNsYXNzZXMuc1BhZ2VCdXR0b24gKyAnICcgKyBidG5DbGFzcyxcbiAgICAgICAgICAgICAgJ2lkJzogaWR4ID09PSAwICYmIHR5cGVvZiBidXR0b24gPT09ICdzdHJpbmcnID8gc2V0dGluZ3Muc1RhYmxlSWQgKyAnXycgKyBidXR0b24gOiBudWxsXG4gICAgICAgICAgICB9KS5hcHBlbmQoJCgnPGE+Jywge1xuICAgICAgICAgICAgICAnaHJlZic6ICcjJyxcbiAgICAgICAgICAgICAgJ2FyaWEtY29udHJvbHMnOiBzZXR0aW5ncy5zVGFibGVJZCxcbiAgICAgICAgICAgICAgJ2FyaWEtbGFiZWwnOiBhcmlhW2J1dHRvbl0sXG4gICAgICAgICAgICAgICdkYXRhLWR0LWlkeCc6IGNvdW50ZXIsXG4gICAgICAgICAgICAgICd0YWJpbmRleCc6IHNldHRpbmdzLmlUYWJJbmRleCxcbiAgICAgICAgICAgICAgJ2NsYXNzJzogJ3BhZ2UtbGluaydcbiAgICAgICAgICAgIH0pLmh0bWwoYnRuRGlzcGxheSkpLmFwcGVuZFRvKGNvbnRhaW5lcik7XG5cbiAgICAgICAgICAgIHNldHRpbmdzLm9BcGkuX2ZuQmluZEFjdGlvbihub2RlLCB7XG4gICAgICAgICAgICAgIGFjdGlvbjogYnV0dG9uXG4gICAgICAgICAgICB9LCBjbGlja0hhbmRsZXIpO1xuXG4gICAgICAgICAgICBjb3VudGVyKys7XG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9XG4gICAgfTsgLy8gSUU5IHRocm93cyBhbiAndW5rbm93biBlcnJvcicgaWYgZG9jdW1lbnQuYWN0aXZlRWxlbWVudCBpcyB1c2VkXG4gICAgLy8gaW5zaWRlIGFuIGlmcmFtZSBvciBmcmFtZS5cblxuXG4gICAgdmFyIGFjdGl2ZUVsO1xuXG4gICAgdHJ5IHtcbiAgICAgIC8vIEJlY2F1c2UgdGhpcyBhcHByb2FjaCBpcyBkZXN0cm95aW5nIGFuZCByZWNyZWF0aW5nIHRoZSBwYWdpbmdcbiAgICAgIC8vIGVsZW1lbnRzLCBmb2N1cyBpcyBsb3N0IG9uIHRoZSBzZWxlY3QgYnV0dG9uIHdoaWNoIGlzIGJhZCBmb3JcbiAgICAgIC8vIGFjY2Vzc2liaWxpdHkuIFNvIHdlIHdhbnQgdG8gcmVzdG9yZSBmb2N1cyBvbmNlIHRoZSBkcmF3IGhhc1xuICAgICAgLy8gY29tcGxldGVkXG4gICAgICBhY3RpdmVFbCA9ICQoaG9zdCkuZmluZChkb2N1bWVudC5hY3RpdmVFbGVtZW50KS5kYXRhKCdkdC1pZHgnKTtcbiAgICB9IGNhdGNoIChlKSB7fVxuXG4gICAgYXR0YWNoKCQoaG9zdCkuZW1wdHkoKS5odG1sKCc8dWwgY2xhc3M9XCJwYWdpbmF0aW9uIGp1c3RpZnktY29udGVudC1jZW50ZXJcIi8+JykuY2hpbGRyZW4oJ3VsJyksIGJ1dHRvbnMpO1xuXG4gICAgaWYgKGFjdGl2ZUVsICE9PSB1bmRlZmluZWQpIHtcbiAgICAgICQoaG9zdCkuZmluZCgnW2RhdGEtZHQtaWR4PScgKyBhY3RpdmVFbCArICddJykuZm9jdXMoKTtcbiAgICB9XG4gIH07XG5cbiAgcmV0dXJuIERhdGFUYWJsZTtcbn0pOyIsIi8vICQoJy5iYXNpYy1kYXRhdGFibGUnKS5kYXRhVGFibGUoe1xuLy8gICAgIGRvbTogJzxcInJvd1wiPFwiY29sLXNtLTEyIGNvbC1tZC00XCJCPjxcImNvbC1zbS0xMiBjb2wtbWQtOFwiZj4+PFwicm93XCI8XCJjb2wtc20tMTJcInQ+PjxcInJvd1wiPFwiY29sLXNtLTEyIGNvbC1tZC01XCJpPjxcIiBcInA+PicsXG4vLyAgICAgbGFuZ3VhZ2U6IHtcbi8vICAgICAgICAgcGFnaW5hdGU6IHtcbi8vICAgICAgICAgICAgIHByZXZpb3VzOiAnPGkgY2xhc3M9XCJmYSBmYS1sZyBmYS1hbmdsZS1sZWZ0XCI+PC9pPicsXG4vLyAgICAgICAgICAgICBuZXh0OiAnPGkgY2xhc3M9XCJmYSBmYS1sZyBmYS1hbmdsZS1yaWdodFwiPjwvaT4nXG4vLyAgICAgICAgIH0sXG4vLyAgICAgICAgIHVybDogJy8vY2RuLmRhdGF0YWJsZXMubmV0L3BsdWctaW5zLzEuMTIuMS9pMThuL2ZyLUZSLmpzb24nXG4vLyAgICAgfSxcbi8vICAgICBhdXRvV2lkdGg6IGZhbHNlLFxuLy8gICAgIGRlZmVyUmVuZGVyOiB0cnVlLFxuLy8gICAgIG9yZGVyOiBbMSwgJ2FzYyddLFxuLy8gICAgIGJ1dHRvbnM6IFtcbi8vICAgICAgICAgJ2NvcHknLCAncHJpbnQnXG4vLyAgICAgXVxuLy8gfSk7XG4vL1xuLy8gJCgnLmV4cG9ydC1kYXRhdGFibGUnKS5kYXRhVGFibGUoe1xuLy8gICAgIGRvbTogJzxcInJvd1wiPFwiY29sLXNtLTEyIGNvbC1tZC00XCJCPjxcImNvbC1zbS0xMiBjb2wtbWQtOFwiZj4+PFwicm93XCI8XCJjb2wtc20tMTJcInQ+PjxcInJvd1wiPFwiY29sLXNtLTEyIGNvbC1tZC01XCJpPjxcImNvbC1zbS0xMiBjb2wtbWQtN1wicD4+Jyxcbi8vICAgICBsYW5ndWFnZToge1xuLy8gICAgICAgICBwYWdpbmF0ZToge1xuLy8gICAgICAgICAgICAgcHJldmlvdXM6ICc8aSBjbGFzcz1cImZhIGZhLWxnIGZhLWFuZ2xlLWxlZnRcIj48L2k+Jyxcbi8vICAgICAgICAgICAgIG5leHQ6ICc8aSBjbGFzcz1cImZhIGZhLWxnIGZhLWFuZ2xlLXJpZ2h0XCI+PC9pPidcbi8vICAgICAgICAgfSxcbi8vICAgICAgICAgdXJsOiAnLy9jZG4uZGF0YXRhYmxlcy5uZXQvcGx1Zy1pbnMvMS4xMi4xL2kxOG4vZnItRlIuanNvbidcbi8vICAgICB9LFxuLy8gICAgIGF1dG9XaWR0aDogZmFsc2UsXG4vLyAgICAgZGVmZXJSZW5kZXI6IHRydWUsXG4vLyAgICAgb3JkZXI6IFsxLCAnYXNjJ10sXG4vLyAgICAgYnV0dG9uczogW1xuLy8gICAgICAgICAnZXhjZWwnLCAncGRmJywgJ2Nzdidcbi8vICAgICBdXG4vLyB9KTtcbi8vXG5cbi8vIGFzc2V0cy9qcy9kYXRhdGFibGVzLWNvbmZpZ3MuanNcblxuLy8gQ29uZmlndXJhdGlvbiBwb3VyIHRvdXRlcyBsZXMgdGFibGVzIGF2ZWMgZGVzIGJvdXRvbnMgZCdleHBvcnRhdGlvblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuICAgICQoJy5iYXNpYy1kYXRhdGFibGUsIC5leHBvcnQtZGF0YXRhYmxlLCAucmVwb3J0LWRhdGF0YWJsZScpLkRhdGFUYWJsZSh7XG4gICAgICAgIGRvbTogJzxcInJvd1wiPFwiY29sLXNtLTEyIGNvbC1tZC00XCJCPjxcImNvbC1zbS0xMiBjb2wtbWQtOFwiZj4+PFwicm93XCI8XCJjb2wtc20tMTJcInQ+PjxcInJvd1wiPFwiY29sLXNtLTEyIGNvbC1tZC01XCJpPjxcImNvbC1zbS0xMiBjb2wtbWQtN1wicD4+JyxcbiAgICAgICAgbGFuZ3VhZ2U6IHtcbiAgICAgICAgICAgIHBhZ2luYXRlOiB7XG4gICAgICAgICAgICAgICAgcHJldmlvdXM6ICc8aSBjbGFzcz1cImZhIGZhLWxnIGZhLWFuZ2xlLWxlZnRcIj48L2k+JyxcbiAgICAgICAgICAgICAgICBuZXh0OiAnPGkgY2xhc3M9XCJmYSBmYS1sZyBmYS1hbmdsZS1yaWdodFwiPjwvaT4nXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgdXJsOiAnLy9jZG4uZGF0YXRhYmxlcy5uZXQvcGx1Zy1pbnMvMS4xMi4xL2kxOG4vZnItRlIuanNvbicgIC8vIENoYXJnZW1lbnQgZGUgbGEgbGFuZ3VlIGZyYW7Dp2Fpc2VcbiAgICAgICAgfSxcbiAgICAgICAgYXV0b1dpZHRoOiBmYWxzZSxcbiAgICAgICAgZGVmZXJSZW5kZXI6IHRydWUsXG4gICAgICAgIG9yZGVyOiBbMSwgJ2FzYyddLFxuICAgICAgICBidXR0b25zOiBbXG4gICAgICAgICAgICB7XG4gICAgICAgICAgICAgICAgZXh0ZW5kOiAnY29weScsXG4gICAgICAgICAgICAgICAgdGV4dDogJ0NvcGllcidcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICB7XG4gICAgICAgICAgICAgICAgZXh0ZW5kOiAnZXhjZWwnLFxuICAgICAgICAgICAgICAgIHRleHQ6ICdFeHBvcnRlciBlbiBFeGNlbCdcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICB7XG4gICAgICAgICAgICAgICAgZXh0ZW5kOiAncGRmJyxcbiAgICAgICAgICAgICAgICB0ZXh0OiAnRXhwb3J0ZXIgZW4gUERGJ1xuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIHtcbiAgICAgICAgICAgICAgICBleHRlbmQ6ICdjc3YnLFxuICAgICAgICAgICAgICAgIHRleHQ6ICdFeHBvcnRlciBlbiBDU1YnXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAge1xuICAgICAgICAgICAgICAgIGV4dGVuZDogJ3ByaW50JyxcbiAgICAgICAgICAgICAgICB0ZXh0OiAnSW1wcmltZXInXG4gICAgICAgICAgICB9XG4gICAgICAgIF1cbiAgICB9KTtcbn0pO1xuIiwiJCgnLnJlcG9ydC1kYXRhdGFibGUnKS5kYXRhVGFibGUoe1xyXG4gICAgcGFnaW5nOiBmYWxzZSxcclxuICAgIHNlYXJjaGluZzogZmFsc2UsXHJcbiAgICByZXRyaWV2ZTogdHJ1ZSxcclxuICAgIGRvbTogJzxcInJvd1wiPFwiY29sLXNtLTEyIGNvbC1tZC00XCJCPjxcImNvbC1zbS0xMiBjb2wtbWQtOFwiZj4+PFwicm93XCI8XCJjb2wtc20tMTJcInQ+PjxcInJvd1wiPFwiY29sLXNtLTEyIGNvbC1tZC01XCJpPjxcImNvbC1zbS0xMiBjb2wtbWQtN1wicD4+JyxcclxuICAgIGxhbmd1YWdlOiB7XHJcbiAgICAgICAgcGFnaW5hdGU6IHtcclxuICAgICAgICAgICAgcHJldmlvdXM6ICc8aSBjbGFzcz1cImZhIGZhLWxnIGZhLWFuZ2xlLWxlZnRcIj48L2k+JyxcclxuICAgICAgICAgICAgbmV4dDogJzxpIGNsYXNzPVwiZmEgZmEtbGcgZmEtYW5nbGUtcmlnaHRcIj48L2k+J1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAgdXJsOiAnLy9jZG4uZGF0YXRhYmxlcy5uZXQvcGx1Zy1pbnMvMS4xMi4xL2kxOG4vZnItRlIuanNvbidcclxuICAgIH0sXHJcbiAgICBhdXRvV2lkdGg6IGZhbHNlLFxyXG4gICAgZGVmZXJSZW5kZXI6IHRydWUsXHJcbiAgICBvcmRlcjogWzEsICdhc2MnXSxcclxuICAgIGJ1dHRvbnM6IFtcclxuICAgICAgICAnY29weScsICdwcmludCdcclxuICAgIF0sXHJcbn0pO1xyXG5cclxuXHJcbmNvbnN0ICRmb3JtSm91cm5hbENhaXNzZSA9ICQoJ2Zvcm1bbmFtZT1cImZvcm1fam91cm5hbF9jYWlzc2VcIl0nKTtcclxuJGZvcm1Kb3VybmFsQ2Fpc3NlLnN1Ym1pdChmdW5jdGlvbiAoZSkge1xyXG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgY29uc3QgJGRhdGEgPSAkKHRoaXMpLnNlcmlhbGl6ZSgpO1xyXG4gICAgY29uc3QgdGFiID0gJGRhdGEuc3BsaXQoJyYnKTtcclxuICAgIGNvbnN0IHRhYjJfZGViID0gdGFiWzBdLnNwbGl0KCc9Jyk7XHJcbiAgICBjb25zdCB0YWIyX2ZpbiA9IHRhYlsxXS5zcGxpdCgnPScpO1xyXG4gICAgY29uc3QgZGVidXQgPSB0YWIyX2RlYlsxXTtcclxuICAgIGNvbnN0IGZpbiA9IHRhYjJfZmluWzFdO1xyXG4gICAgJCgnI3RhYmxlX3JlcG9ydGluZ19qb3VybmFsJykuZGF0YVRhYmxlKHtcclxuICAgICAgICBiRGVzdHJveTogdHJ1ZSxcclxuICAgICAgICBhamF4OiB7XHJcbiAgICAgICAgICAgIHVybDogYC9jYWlzc2UvZXRhdD8keyRkYXRhfWAsXHJcbiAgICAgICAgICAgIGRhdGFTcmM6ICcnXHJcbiAgICAgICAgfSxcclxuICAgICAgICBjb2x1bW5zOiBbXHJcbiAgICAgICAgICAgIHsgZGF0YTogJ2RhdGUnLCBzQ2xhc3M6ICd0ZXh0LWNlbnRlcicgfSxcclxuICAgICAgICAgICAgeyBkYXRhOiAnbnVtX3BpZWNlJywgc0NsYXNzOiAndGV4dC1sZWZ0JyB9LFxyXG4gICAgICAgICAgICB7IGRhdGE6ICdsaWJlbGxlJywgc0NsYXNzOiAndGV4dC1sZWZ0JyB9LFxyXG4gICAgICAgICAgICB7IGRhdGE6ICdkZWJpdCcsIHNDbGFzczogJ3RleHQtcmlnaHQnIH0sXHJcbiAgICAgICAgICAgIHsgZGF0YTogJ2NyZWRpdCcsIHNDbGFzczogJ3RleHQtcmlnaHQnIH0sXHJcbiAgICAgICAgICAgIHsgZGF0YTogJ3NvbGRlJywgc0NsYXNzOiAndGV4dC1yaWdodCcgfSxcclxuICAgICAgICBdLFxyXG4gICAgICAgIGRvbTogJzxcInJvd1wiPFwiY29sLXNtLTEyIGNvbC1tZC00XCJCPjxcImNvbC1zbS0xMiBjb2wtbWQtOFwiZj4+PFwicm93XCI8XCJjb2wtc20tMTJcInQ+PjxcInJvd1wiPFwiY29sLXNtLTEyIGNvbC1tZC01XCJpPjxcImNvbC1zbS0xMiBjb2wtbWQtN1wicD4+JyxcclxuICAgICAgICBidXR0b25zOiBbXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIGV4dGVuZDogJ3ByaW50JyxcclxuICAgICAgICAgICAgICAgIGN1c3RvbWl6ZTogZnVuY3Rpb24gKHdpbikge1xyXG4gICAgICAgICAgICAgICAgICAgICQod2luLmRvY3VtZW50LmJvZHkpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC5jc3MoJ2ZvbnQtc2l6ZScsICcxMHB0JylcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgJCh3aW4uZG9jdW1lbnQuYm9keSlcclxuICAgICAgICAgICAgICAgICAgICAgICAgLmZpbmQoJ3RhYmxlJylcclxuICAgICAgICAgICAgICAgICAgICAgICAgLmFkZENsYXNzKCdjb21wYWN0JylcclxuICAgICAgICAgICAgICAgICAgICAgICAgLmNzcygnZm9udC1zaXplJywgJ2luaGVyaXQnKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIF0sXHJcbiAgICAgICAgbGF5b3V0OiB7XHJcbiAgICAgICAgICAgIHRvcFN0YXJ0OiAnYnV0dG9ucydcclxuICAgICAgICB9LFxyXG4gICAgICAgIGNvbHVtbkRlZnM6IFtcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogMyxcclxuICAgICAgICAgICAgICAgIHJlbmRlcjogJC5mbi5kYXRhVGFibGUucmVuZGVyLm51bWJlcignICcsICcsJywgMCwgJycpLFxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRzOiA0LFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiAkLmZuLmRhdGFUYWJsZS5yZW5kZXIubnVtYmVyKCcgJywgJywnLCAwLCAnJyksXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldHM6IDUsXHJcbiAgICAgICAgICAgICAgICByZW5kZXI6ICQuZm4uZGF0YVRhYmxlLnJlbmRlci5udW1iZXIoJyAnLCAnLCcsIDAsICcnKSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICBdXHJcbiAgICB9KTtcclxufSk7IiwiaW1wb3J0IHsgcnVuSW5wdXRtYXNrIH0gZnJvbSBcIi4vaW5wdXRNYXJrXCI7XG5cbmNvbnN0IGRlbEZvcm1Ub0NvbGxlY3Rpb24gPSAoZSkgPT4ge1xuICAgIGNvbnN0IGRhdGFzZXQgPSBlLmN1cnJlbnRUYXJnZXQuZGF0YXNldDtcbiAgICBjb25zdCB0YXJnZXQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKGRhdGFzZXQudGFyZ2V0KTtcbiAgICAkKHRhcmdldCkucmVtb3ZlKCk7XG4gICAgcnVuSW5wdXRtYXNrKCk7XG59XG5cbiQoZG9jdW1lbnQpLm9uKCdjbGljaycsICcuZGVsX2l0ZW1fbGluaycsIGUgPT4ge1xuICAgIGRlbEZvcm1Ub0NvbGxlY3Rpb24oZSlcbn0pOyIsIi8vIGNvbnN0IHR5cGVFeHBlbnNlJCA9ICQoJyNmZGJfdHlwZUV4cGVuc2UnKTtcclxuLy8gdHlwZUV4cGVuc2UkLmNoYW5nZShmdW5jdGlvbiAoKSB7XHJcbi8vICAgICBjb25zdCBmb3JtJCA9IHR5cGVFeHBlbnNlJC5jbG9zZXN0KCdmb3JtJyk7XHJcbi8vICAgICBjb25zdCBkYXRhJCA9IHt9O1xyXG4vLyAgICAgZGF0YSRbdHlwZUV4cGVuc2UkLmF0dHIoJ25hbWUnKV0gPSB0eXBlRXhwZW5zZSQudmFsKCk7XHJcbi8vICAgICAkLmFqYXgoe1xyXG4vLyAgICAgICAgIHVybDogZm9ybSQuYXR0cignYWN0aW9uJyksXHJcbi8vICAgICAgICAgdHlwZTogZm9ybSQuYXR0cignbWV0aG9kJyksXHJcbi8vICAgICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcbi8vICAgICAgICAgZGF0YTogZGF0YSQsXHJcbi8vICAgICAgICAgY29tcGxldGU6IGZ1bmN0aW9uIChodG1sKSB7XHJcbi8vICAgICAgICAgICAgICQoJyNmZGJfZXhwZW5zZScpLnJlcGxhY2VXaXRoKCQoaHRtbC5yZXNwb25zZVRleHQpLmZpbmQoJyNmZGJfZXhwZW5zZScpKVxyXG4vLyAgICAgICAgICAgICAkKCcjZmRiX2V4cGVuc2UnKS5zZWxlY3QyKCk7XHJcbi8vICAgICAgICAgfVxyXG4vLyAgICAgfSk7XHJcbi8vIH0pXHJcbi8vIGFzc2V0cy9qcy9mZGIuanNcclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xyXG4gICAgY29uc29sZS5sb2coXCJqUXVlcnkgaXMgd29ya2luZyFcIik7XHJcbiAgICBjb25zdCB0eXBlRXhwZW5zZSQgPSAkKCcjZmRiX3R5cGVFeHBlbnNlJyk7XHJcbiAgICB0eXBlRXhwZW5zZSQuY2hhbmdlKGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBjb25zdCBmb3JtJCA9IHR5cGVFeHBlbnNlJC5jbG9zZXN0KCdmb3JtJyk7XHJcbiAgICAgICAgY29uc3QgZGF0YSQgPSB7fTtcclxuICAgICAgICBkYXRhJFt0eXBlRXhwZW5zZSQuYXR0cignbmFtZScpXSA9IHR5cGVFeHBlbnNlJC52YWwoKTtcclxuICAgICAgICAkLmFqYXgoe1xyXG4gICAgICAgICAgICB1cmw6IGZvcm0kLmF0dHIoJ2FjdGlvbicpLFxyXG4gICAgICAgICAgICB0eXBlOiBmb3JtJC5hdHRyKCdtZXRob2QnKSxcclxuICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcbiAgICAgICAgICAgIGRhdGE6IGRhdGEkLFxyXG4gICAgICAgICAgICBjb21wbGV0ZTogZnVuY3Rpb24gKGh0bWwpIHtcclxuICAgICAgICAgICAgICAgICQoJyNmZGJfZXhwZW5zZScpLnJlcGxhY2VXaXRoKCQoaHRtbC5yZXNwb25zZVRleHQpLmZpbmQoJyNmZGJfZXhwZW5zZScpKVxyXG4gICAgICAgICAgICAgICAgJCgnI2ZkYl9leHBlbnNlJykuc2VsZWN0MigpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcbiAgICB9KTtcclxuXHJcbn0pOyIsImV4cG9ydCBjb25zdCBydW5JbnB1dG1hc2sgPSAoKSA9PiB7XHJcbiAgICAkKGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIElucHV0bWFzaygnJywge1xyXG4gICAgICAgICAgICBudW1lcmljSW5wdXQ6IHRydWUsXHJcbiAgICAgICAgICAgIHJpZ2h0QWxpZ246IGZhbHNlLFxyXG4gICAgICAgICAgICBhdXRvVW5tYXNrOiB0cnVlLFxyXG4gICAgICAgICAgICBwbGFjZWhvbGRlcjogJycsXHJcbiAgICAgICAgICAgIHJlbW92ZU1hc2tPblN1Ym1pdDogdHJ1ZSxcclxuICAgICAgICAgICAgZ3JvdXBTZXBhcmF0b3I6IFwiIFwiLFxyXG4gICAgICAgICAgICBncmVlZHk6IGZhbHNlLFxyXG4gICAgICAgICAgICBkaWdpdHM6IDAsXHJcbiAgICAgICAgICAgIGFsaWFzOiAnY3VycmVuY3knLFxyXG4gICAgICAgIH0pLm1hc2soJy5zZXBhcmF0b3InKTtcclxuICAgIH0pO1xyXG5cclxufTsiLCJleHBvcnQgY29uc3QgcnVuSW5wdXRtYXNrID0gKCkgPT4ge1xuICAgICQoZnVuY3Rpb24oKSB7XG4gICAgICAgIElucHV0bWFzaygnJywge1xuICAgICAgICAgICAgbnVtZXJpY0lucHV0OiB0cnVlLFxuICAgICAgICAgICAgcmlnaHRBbGlnbjogZmFsc2UsXG4gICAgICAgICAgICBhdXRvVW5tYXNrOiB0cnVlLFxuICAgICAgICAgICAgcGxhY2Vob2xkZXI6ICcnLFxuICAgICAgICAgICAgcmVtb3ZlTWFza09uU3VibWl0OiB0cnVlLFxuICAgICAgICAgICAgZ3JvdXBTZXBhcmF0b3I6IFwiIFwiLFxuICAgICAgICAgICAgZ3JlZWR5OiBmYWxzZSxcbiAgICAgICAgICAgIGRpZ2l0czogMCxcbiAgICAgICAgICAgIGFsaWFzOiAnY3VycmVuY3knLFxuICAgICAgICB9KS5tYXNrKCcuc2VwYXJhdG9yJyk7XG4gICAgfSk7XG5cbn07XG4iLCIvKipcclxuIC8qKlxyXG4gKiAgYmlsbGV0YWdlIGJpbGxldFxyXG4gKiAqL1xyXG5cclxuY29uc3QgY2FsY3VsZUJpbGxldCA9ICgpID0+IHtcclxuICAgIHZhciBNb250YW50QmlsbGV0cyA9IDA7XHJcblxyXG4gICAgdmFyIGJpbGxldHMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCdiaWxsZXQnKTtcclxuICAgICQuZWFjaChiaWxsZXRzLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgdmFyIG11bHRpcGxpY2F0ZXVyID0gJCh0aGlzKS5hdHRyKCdkYXRhLWlkJyk7XHJcbiAgICAgICAgTW9udGFudCA9IG11bHRpcGxpY2F0ZXVyICogTnVtYmVyKCQodGhpcykudmFsKCkpO1xyXG4gICAgICAgIE1vbnRhbnRCaWxsZXRzID0gTnVtYmVyKE1vbnRhbnRCaWxsZXRzKSArIE1vbnRhbnQ7XHJcbiAgICB9KTtcclxuICAgICQoJyNyZXN1YWx0VG90YWwxJykuZW1wdHkoKTtcclxuICAgICQoJyNyZXN1YWx0VG90YWwxJykudmFsKG5ldyBJbnRsLk51bWJlckZvcm1hdCgpLmZvcm1hdChNb250YW50QmlsbGV0cykpO1xyXG59O1xyXG4kKCcuYmlsbGV0Jykub24oJ2lucHV0JywgZnVuY3Rpb24gKCkge1xyXG4gICAgY2FsY3VsZUJpbGxldCgpO1xyXG59KTtcclxuXHJcbi8qKlxyXG4gKiBiaWxsZXRhZ2UgbW9ubmFpZVxyXG4gKi9cclxuXHJcblxyXG5jb25zdCBjYWxjdWxlTW9ubmFpZSA9ICgpID0+IHtcclxuICAgIHZhciBNb250YW50TW9ubmFpZSA9IDA7XHJcbiAgICB2YXIgTW9ubmFpZSA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ21vbm5haWUnKTtcclxuICAgICQuZWFjaChNb25uYWllLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgdmFyIG11bHRpcGxpY2F0ZXVyID0gJCh0aGlzKS5hdHRyKCdkYXRhLWlkJyk7XHJcbiAgICAgICAgTW9udGFudDIgPSBtdWx0aXBsaWNhdGV1ciAqIE51bWJlcigkKHRoaXMpLnZhbCgpKTtcclxuICAgICAgICBNb250YW50TW9ubmFpZSA9IE51bWJlcihNb250YW50TW9ubmFpZSkgKyBNb250YW50MjtcclxuICAgIH0pO1xyXG4gICAgJCgnI3Jlc3VhbHRUb3RhbDInKS5lbXB0eSgpO1xyXG4gICAgJCgnI3Jlc3VhbHRUb3RhbDInKS52YWwobmV3IEludGwuTnVtYmVyRm9ybWF0KCkuZm9ybWF0KE1vbnRhbnRNb25uYWllKSk7XHJcbn07XHJcbiQoJy5tb25uYWllJykub24oJ2lucHV0JywgZnVuY3Rpb24gKCkge1xyXG4gICAgY2FsY3VsZU1vbm5haWUoKVxyXG59KTtcclxuLyoqXHJcbiAqICovXHJcbmNvbnN0IGNhbGN1bGVNb250YW50ID0gKGUpID0+IHtcclxuICAgIHZhciBNb250YW50VG90YWwgPSAwO1xyXG4gICAgdmFyIE1vbm5haWUgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCdtb250YW50Jyk7XHJcbiAgICB2YXIgaWQgPSAkKGUpLmF0dHIoJ2lkJyk7XHJcbiAgICB2YXIgdmFsdWVzID0gJChlKS52YWwoKTtcclxuICAgIHZhciBtdWx0aXBsaWNhdGV1ciA9ICQoZSkuYXR0cignZGF0YS1pZCcpO1xyXG4gICAgdmFyIHRvdGFsID0gdmFsdWVzICogbXVsdGlwbGljYXRldXI7XHJcbiAgICB2YXIgb3JiaXMgPSAkKCcjYmlsbGV0YWdlX2JhbGFuY2UnKS52YWwoKTtcclxuICAgIHZhciBlY2FydCA9ICQoJyNlY2FydCcpLnZhbCgpO1xyXG4gICAgJCgnI3InICsgaWQpLnZhbChuZXcgSW50bC5OdW1iZXJGb3JtYXQoKS5mb3JtYXQodG90YWwpKTtcclxuICAgICQuZWFjaChNb25uYWllLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgdmFyIG11bHRpcGxpY2F0ZXVyID0gJCh0aGlzKS5hdHRyKCdkYXRhLWlkJyk7XHJcbiAgICAgICAgTW9udGFudDMgPSBtdWx0aXBsaWNhdGV1ciAqIE51bWJlcigkKHRoaXMpLnZhbCgpKTtcclxuICAgICAgICBNb250YW50VG90YWwgPSBOdW1iZXIoTW9udGFudFRvdGFsKSArIE1vbnRhbnQzO1xyXG4gICAgICAgIGVjYXJ0ID0gTnVtYmVyKE1vbnRhbnRUb3RhbCAtIG9yYmlzKTtcclxuICAgIH0pO1xyXG4gICAgJCgnI2JpbGxldGFnZV9hbW91bnQnKS52YWwoKTtcclxuICAgICQoJyNiaWxsZXRhZ2VfYW1vdW50JykudmFsKG5ldyBJbnRsLk51bWJlckZvcm1hdCgpLmZvcm1hdChNb250YW50VG90YWwpKTtcclxuICAgICQoJyNiaWxsZXRhZ2VfZWNhcnQnKS52YWwoZWNhcnQpO1xyXG59XHJcbiQoJy5tb250YW50Jykub24oJ2lucHV0JywgZnVuY3Rpb24gKCkge1xyXG4gICAgY2FsY3VsZU1vbnRhbnQoJCh0aGlzKSlcclxufSk7XHJcblxyXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XHJcbiAgICBjYWxjdWxlQmlsbGV0KCk7XHJcbiAgICBjYWxjdWxlTW9ubmFpZSgpO1xyXG4gICAgJCgnLm1vbnRhbnQnKS5lYWNoKGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBjYWxjdWxlTW9udGFudCgkKHRoaXMpKVxyXG4gICAgfSk7XHJcbn0pXHJcbiIsIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcclxuICAgIGNhbGN1bGF0ZVByaWNlKClcclxufSlcclxuXHJcblxyXG5jb25zdCBjYWxjdWxhdGVQcmljZSA9ICgpID0+IHtcclxuICAgICQoJ2JvZHknKS5vbignaW5wdXQnLCAnLnByaWNlJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGNvbnN0IHBhcmVudElkID0gJCh0aGlzKS5wYXJlbnQoKS5wYXJlbnQoKS5hdHRyKCdkYXRhLWlkJyk7XHJcbiAgICAgICAgY29uc3QgcXRlID0gKyQoYCMke3BhcmVudElkfV9xdWFudGl0ZWApLnZhbCgpO1xyXG4gICAgICAgIGNvbnN0IHByaWNlID0gKyQodGhpcykudmFsKCk7XHJcbiAgICAgICAgY29uc3QgYW1vdW50ID0gcXRlICogcHJpY2U7XHJcbiAgICAgICAgJChgIyR7cGFyZW50SWR9X21vbnRhbnRgKS52YWwoYW1vdW50KVxyXG4gICAgICAgIGNhbGN1bGF0ZVRvdGFsQW1vdW50KClcclxuICAgIH0pO1xyXG59XHJcbmNhbGN1bGF0ZVByaWNlKClcclxuXHJcbmNvbnN0IGNhbGN1bGF0ZVRvdGFsQW1vdW50ID0gKCkgPT4ge1xyXG4gICAgY29uc3Qgc3VtUHJpY2UgPSBbXTtcclxuICAgIGNvbnN0IHN1bUFtb3VudCA9IFtdO1xyXG5cclxuICAgICQoJy5wcmljZScpLmVhY2goZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIHN1bVByaWNlLnB1c2goKyQodGhpcykudmFsKCkpXHJcbiAgICB9KVxyXG5cclxuICAgICQoJy5tb250YW50JykuZWFjaChmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgc3VtQW1vdW50LnB1c2goKyQodGhpcykudmFsKCkpXHJcbiAgICB9KVxyXG5cclxuICAgIGxldCBwcmljZTtcclxuICAgIGxldCBhbW91bnQ7XHJcblxyXG4gICAgaWYgKHN1bVByaWNlLmxlbmd0aCA+IDApIHtcclxuICAgICAgICBwcmljZSA9IHN1bVByaWNlLnJlZHVjZSgocHJldmlvdXNWYWx1ZSwgY3VycmVudFZhbHVlKSA9PiBwcmV2aW91c1ZhbHVlICsgY3VycmVudFZhbHVlKTtcclxuICAgICAgICBhbW91bnQgPSBzdW1BbW91bnQucmVkdWNlKChwcmV2aW91c1ZhbHVlLCBjdXJyZW50VmFsdWUpID0+IHByZXZpb3VzVmFsdWUgKyBjdXJyZW50VmFsdWUpO1xyXG4gICAgfSBlbHNlIHtcclxuICAgICAgICBwcmljZSA9IGFtb3VudCA9IDA7XHJcbiAgICB9XHJcblxyXG4gICAgJCgnI3RvdGFsX3ByaWNlJykuaHRtbChuZXcgSW50bC5OdW1iZXJGb3JtYXQoJ2ZyLUZSJykuZm9ybWF0KHByaWNlKSk7XHJcbiAgICAkKCcjdG90YWxfbW9udGFudCcpLmh0bWwobmV3IEludGwuTnVtYmVyRm9ybWF0KCdmci1GUicpLmZvcm1hdChhbW91bnQpKTtcclxufVxyXG5cclxuY2FsY3VsYXRlVG90YWxBbW91bnQoKSIsImltcG9ydCAnLi9mZGInXHJcbmltcG9ydCAnLi9iaWxsZXRhZ2UnXHJcblxyXG5cclxuIiwiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xyXG4gICAgY29uc29sZS5sb2coJ1NjcmlwdCBMb2FkZWQnKTsgLy8gQXNzdXJlei12b3VzIHF1ZSBsZSBzY3JpcHQgZXN0IGV4w6ljdXTDqVxyXG5cclxuICAgICQoJyN1c2VyX2Z1bGxOYW1lJykub24oJ2lucHV0JywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGNvbnN0IGZ1bGxOYW1lID0gJCgnI3VzZXJfZnVsbE5hbWUnKS52YWwoKS50b0xvd2VyQ2FzZSgpLnRyaW0oKTtcclxuXHJcbiAgICAgICAgbGV0IHByZWZpeCA9ICcnO1xyXG4gICAgICAgIGlmIChmdWxsTmFtZSkge1xyXG4gICAgICAgICAgICAvLyBTw6lwYXJlciBsZSBwcsOpbm9tIGV0IGxlIG5vbSBlbiBzdXBwb3NhbnQgcXUnaWwgeSBhIHVuIGVzcGFjZSBlbnRyZSBldXhcclxuICAgICAgICAgICAgY29uc3QgbmFtZVBhcnRzID0gZnVsbE5hbWUuc3BsaXQoJyAnKTtcclxuXHJcbiAgICAgICAgICAgIGlmIChuYW1lUGFydHMubGVuZ3RoID4gMSkge1xyXG4gICAgICAgICAgICAgICAgY29uc3QgZmlyc3ROYW1lID0gbmFtZVBhcnRzWzBdO1xyXG4gICAgICAgICAgICAgICAgY29uc3QgbGFzdE5hbWUgPSBuYW1lUGFydHNbbmFtZVBhcnRzLmxlbmd0aCAtIDFdO1xyXG5cclxuICAgICAgICAgICAgICAgIC8vIFByZW5kcmUgbGVzIGRldXggcHJlbWnDqHJlcyBsZXR0cmVzIGR1IHByw6lub20gZXQgbGVzIG1ldHRyZSBlbiBtYWp1c2N1bGVzXHJcbiAgICAgICAgICAgICAgICBjb25zdCBmaXJzdE5hbWVQcmVmaXggPSBmaXJzdE5hbWUuc3Vic3RyaW5nKDAsIDIpLnRvVXBwZXJDYXNlKCk7XHJcblxyXG4gICAgICAgICAgICAgICAgLy8gVXRpbGlzZXIgbGUgbm9tIGRlIGZhbWlsbGUgZW50aWVyXHJcbiAgICAgICAgICAgICAgICBwcmVmaXggPSBsYXN0TmFtZSArIGZpcnN0TmFtZVByZWZpeDtcclxuICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgIC8vIFNpIGwndXRpbGlzYXRldXIgbmUgbWV0IHF1J3VuIHNldWwgbW90LCBvbiB1dGlsaXNlIHNldWxlbWVudCBjZSBtb3QgcG91ciBsJ2lkZW50aWZpYW50XHJcbiAgICAgICAgICAgICAgICBwcmVmaXggPSBuYW1lUGFydHNbMF07XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIC8vIEfDqW7DqXJlciB1bmUgY2hhw65uZSBhbMOpYXRvaXJlIGRlIDQgY2hpZmZyZXNcclxuICAgICAgICBsZXQgbGVuZ3RoID0gNDtcclxuICAgICAgICBsZXQgY2hhcnNldCA9IFwiMDEyMzQ1Njc4OVwiO1xyXG4gICAgICAgIGxldCByYW5kb21TdHJpbmcgPSBcIlwiO1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgbGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgcmFuZG9tU3RyaW5nICs9IGNoYXJzZXQuY2hhckF0KE1hdGguZmxvb3IoTWF0aC5yYW5kb20oKSAqIGNoYXJzZXQubGVuZ3RoKSk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICAvLyBDb25zdHJ1aXJlIGxlIG5vbSBkJ3V0aWxpc2F0ZXVyIGZpbmFsXHJcbiAgICAgICAgY29uc3QgdXNlcm5hbWUgPSBgJHtwcmVmaXh9XyR7cmFuZG9tU3RyaW5nfWA7XHJcblxyXG4gICAgICAgIC8vIEFmZmljaGVyIGxlIHLDqXN1bHRhdCBkYW5zIGxlIGNoYW1wIFBzZXVkbyAoaWRlbnRpZmlhbnQpXHJcbiAgICAgICAgJCgnI3VzZXJfcHNldWRvJykudmFsKHVzZXJuYW1lKTtcclxuICAgIH0pO1xyXG59KTtcclxuIiwiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuICAgICQoJy5zZWxlY3QyJykuc2VsZWN0Mih7d2lkdGg6ICcxMDAlJ30pXG59KSIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyIsInZhciBtYXAgPSB7XG5cdFwiLi9hZlwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYWYuanNcIixcblx0XCIuL2FmLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hZi5qc1wiLFxuXHRcIi4vYXJcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FyLmpzXCIsXG5cdFwiLi9hci1kelwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXItZHouanNcIixcblx0XCIuL2FyLWR6LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hci1kei5qc1wiLFxuXHRcIi4vYXIta3dcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FyLWt3LmpzXCIsXG5cdFwiLi9hci1rdy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXIta3cuanNcIixcblx0XCIuL2FyLWx5XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hci1seS5qc1wiLFxuXHRcIi4vYXItbHkuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FyLWx5LmpzXCIsXG5cdFwiLi9hci1tYVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXItbWEuanNcIixcblx0XCIuL2FyLW1hLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hci1tYS5qc1wiLFxuXHRcIi4vYXItcHNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FyLXBzLmpzXCIsXG5cdFwiLi9hci1wcy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXItcHMuanNcIixcblx0XCIuL2FyLXNhXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hci1zYS5qc1wiLFxuXHRcIi4vYXItc2EuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FyLXNhLmpzXCIsXG5cdFwiLi9hci10blwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXItdG4uanNcIixcblx0XCIuL2FyLXRuLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hci10bi5qc1wiLFxuXHRcIi4vYXIuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FyLmpzXCIsXG5cdFwiLi9helwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXouanNcIixcblx0XCIuL2F6LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hei5qc1wiLFxuXHRcIi4vYmVcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2JlLmpzXCIsXG5cdFwiLi9iZS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYmUuanNcIixcblx0XCIuL2JnXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9iZy5qc1wiLFxuXHRcIi4vYmcuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2JnLmpzXCIsXG5cdFwiLi9ibVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYm0uanNcIixcblx0XCIuL2JtLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ibS5qc1wiLFxuXHRcIi4vYm5cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2JuLmpzXCIsXG5cdFwiLi9ibi1iZFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYm4tYmQuanNcIixcblx0XCIuL2JuLWJkLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ibi1iZC5qc1wiLFxuXHRcIi4vYm4uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2JuLmpzXCIsXG5cdFwiLi9ib1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYm8uanNcIixcblx0XCIuL2JvLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9iby5qc1wiLFxuXHRcIi4vYnJcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2JyLmpzXCIsXG5cdFwiLi9ici5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYnIuanNcIixcblx0XCIuL2JzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9icy5qc1wiLFxuXHRcIi4vYnMuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2JzLmpzXCIsXG5cdFwiLi9jYVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvY2EuanNcIixcblx0XCIuL2NhLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9jYS5qc1wiLFxuXHRcIi4vY3NcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2NzLmpzXCIsXG5cdFwiLi9jcy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvY3MuanNcIixcblx0XCIuL2N2XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9jdi5qc1wiLFxuXHRcIi4vY3YuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2N2LmpzXCIsXG5cdFwiLi9jeVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvY3kuanNcIixcblx0XCIuL2N5LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9jeS5qc1wiLFxuXHRcIi4vZGFcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2RhLmpzXCIsXG5cdFwiLi9kYS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZGEuanNcIixcblx0XCIuL2RlXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9kZS5qc1wiLFxuXHRcIi4vZGUtYXRcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2RlLWF0LmpzXCIsXG5cdFwiLi9kZS1hdC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZGUtYXQuanNcIixcblx0XCIuL2RlLWNoXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9kZS1jaC5qc1wiLFxuXHRcIi4vZGUtY2guanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2RlLWNoLmpzXCIsXG5cdFwiLi9kZS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZGUuanNcIixcblx0XCIuL2R2XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9kdi5qc1wiLFxuXHRcIi4vZHYuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2R2LmpzXCIsXG5cdFwiLi9lbFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZWwuanNcIixcblx0XCIuL2VsLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbC5qc1wiLFxuXHRcIi4vZW4tYXVcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VuLWF1LmpzXCIsXG5cdFwiLi9lbi1hdS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW4tYXUuanNcIixcblx0XCIuL2VuLWNhXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbi1jYS5qc1wiLFxuXHRcIi4vZW4tY2EuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VuLWNhLmpzXCIsXG5cdFwiLi9lbi1nYlwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW4tZ2IuanNcIixcblx0XCIuL2VuLWdiLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbi1nYi5qc1wiLFxuXHRcIi4vZW4taWVcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VuLWllLmpzXCIsXG5cdFwiLi9lbi1pZS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW4taWUuanNcIixcblx0XCIuL2VuLWlsXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbi1pbC5qc1wiLFxuXHRcIi4vZW4taWwuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VuLWlsLmpzXCIsXG5cdFwiLi9lbi1pblwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW4taW4uanNcIixcblx0XCIuL2VuLWluLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbi1pbi5qc1wiLFxuXHRcIi4vZW4tbnpcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VuLW56LmpzXCIsXG5cdFwiLi9lbi1uei5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW4tbnouanNcIixcblx0XCIuL2VuLXNnXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbi1zZy5qc1wiLFxuXHRcIi4vZW4tc2cuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VuLXNnLmpzXCIsXG5cdFwiLi9lb1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW8uanNcIixcblx0XCIuL2VvLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lby5qc1wiLFxuXHRcIi4vZXNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VzLmpzXCIsXG5cdFwiLi9lcy1kb1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZXMtZG8uanNcIixcblx0XCIuL2VzLWRvLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lcy1kby5qc1wiLFxuXHRcIi4vZXMtbXhcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VzLW14LmpzXCIsXG5cdFwiLi9lcy1teC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZXMtbXguanNcIixcblx0XCIuL2VzLXVzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lcy11cy5qc1wiLFxuXHRcIi4vZXMtdXMuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VzLXVzLmpzXCIsXG5cdFwiLi9lcy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZXMuanNcIixcblx0XCIuL2V0XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ldC5qc1wiLFxuXHRcIi4vZXQuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2V0LmpzXCIsXG5cdFwiLi9ldVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZXUuanNcIixcblx0XCIuL2V1LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ldS5qc1wiLFxuXHRcIi4vZmFcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ZhLmpzXCIsXG5cdFwiLi9mYS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZmEuanNcIixcblx0XCIuL2ZpXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9maS5qc1wiLFxuXHRcIi4vZmkuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ZpLmpzXCIsXG5cdFwiLi9maWxcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ZpbC5qc1wiLFxuXHRcIi4vZmlsLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9maWwuanNcIixcblx0XCIuL2ZvXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9mby5qc1wiLFxuXHRcIi4vZm8uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ZvLmpzXCIsXG5cdFwiLi9mclwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZnIuanNcIixcblx0XCIuL2ZyLWNhXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9mci1jYS5qc1wiLFxuXHRcIi4vZnItY2EuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ZyLWNhLmpzXCIsXG5cdFwiLi9mci1jaFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZnItY2guanNcIixcblx0XCIuL2ZyLWNoLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9mci1jaC5qc1wiLFxuXHRcIi4vZnIuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ZyLmpzXCIsXG5cdFwiLi9meVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZnkuanNcIixcblx0XCIuL2Z5LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9meS5qc1wiLFxuXHRcIi4vZ2FcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2dhLmpzXCIsXG5cdFwiLi9nYS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZ2EuanNcIixcblx0XCIuL2dkXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9nZC5qc1wiLFxuXHRcIi4vZ2QuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2dkLmpzXCIsXG5cdFwiLi9nbFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZ2wuanNcIixcblx0XCIuL2dsLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9nbC5qc1wiLFxuXHRcIi4vZ29tLWRldmFcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2dvbS1kZXZhLmpzXCIsXG5cdFwiLi9nb20tZGV2YS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZ29tLWRldmEuanNcIixcblx0XCIuL2dvbS1sYXRuXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9nb20tbGF0bi5qc1wiLFxuXHRcIi4vZ29tLWxhdG4uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2dvbS1sYXRuLmpzXCIsXG5cdFwiLi9ndVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZ3UuanNcIixcblx0XCIuL2d1LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ndS5qc1wiLFxuXHRcIi4vaGVcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2hlLmpzXCIsXG5cdFwiLi9oZS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaGUuanNcIixcblx0XCIuL2hpXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9oaS5qc1wiLFxuXHRcIi4vaGkuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2hpLmpzXCIsXG5cdFwiLi9oclwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaHIuanNcIixcblx0XCIuL2hyLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9oci5qc1wiLFxuXHRcIi4vaHVcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2h1LmpzXCIsXG5cdFwiLi9odS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaHUuanNcIixcblx0XCIuL2h5LWFtXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9oeS1hbS5qc1wiLFxuXHRcIi4vaHktYW0uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2h5LWFtLmpzXCIsXG5cdFwiLi9pZFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaWQuanNcIixcblx0XCIuL2lkLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9pZC5qc1wiLFxuXHRcIi4vaXNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2lzLmpzXCIsXG5cdFwiLi9pcy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaXMuanNcIixcblx0XCIuL2l0XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9pdC5qc1wiLFxuXHRcIi4vaXQtY2hcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2l0LWNoLmpzXCIsXG5cdFwiLi9pdC1jaC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaXQtY2guanNcIixcblx0XCIuL2l0LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9pdC5qc1wiLFxuXHRcIi4vamFcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2phLmpzXCIsXG5cdFwiLi9qYS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvamEuanNcIixcblx0XCIuL2p2XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9qdi5qc1wiLFxuXHRcIi4vanYuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2p2LmpzXCIsXG5cdFwiLi9rYVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUva2EuanNcIixcblx0XCIuL2thLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9rYS5qc1wiLFxuXHRcIi4va2tcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2trLmpzXCIsXG5cdFwiLi9ray5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUva2suanNcIixcblx0XCIuL2ttXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9rbS5qc1wiLFxuXHRcIi4va20uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ttLmpzXCIsXG5cdFwiLi9rblwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUva24uanNcIixcblx0XCIuL2tuLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9rbi5qc1wiLFxuXHRcIi4va29cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2tvLmpzXCIsXG5cdFwiLi9rby5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUva28uanNcIixcblx0XCIuL2t1XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9rdS5qc1wiLFxuXHRcIi4va3Uta21yXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9rdS1rbXIuanNcIixcblx0XCIuL2t1LWttci5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUva3Uta21yLmpzXCIsXG5cdFwiLi9rdS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUva3UuanNcIixcblx0XCIuL2t5XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9reS5qc1wiLFxuXHRcIi4va3kuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2t5LmpzXCIsXG5cdFwiLi9sYlwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbGIuanNcIixcblx0XCIuL2xiLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9sYi5qc1wiLFxuXHRcIi4vbG9cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2xvLmpzXCIsXG5cdFwiLi9sby5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbG8uanNcIixcblx0XCIuL2x0XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9sdC5qc1wiLFxuXHRcIi4vbHQuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2x0LmpzXCIsXG5cdFwiLi9sdlwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbHYuanNcIixcblx0XCIuL2x2LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9sdi5qc1wiLFxuXHRcIi4vbWVcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL21lLmpzXCIsXG5cdFwiLi9tZS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbWUuanNcIixcblx0XCIuL21pXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9taS5qc1wiLFxuXHRcIi4vbWkuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL21pLmpzXCIsXG5cdFwiLi9ta1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbWsuanNcIixcblx0XCIuL21rLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9tay5qc1wiLFxuXHRcIi4vbWxcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL21sLmpzXCIsXG5cdFwiLi9tbC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbWwuanNcIixcblx0XCIuL21uXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9tbi5qc1wiLFxuXHRcIi4vbW4uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL21uLmpzXCIsXG5cdFwiLi9tclwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbXIuanNcIixcblx0XCIuL21yLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9tci5qc1wiLFxuXHRcIi4vbXNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL21zLmpzXCIsXG5cdFwiLi9tcy1teVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbXMtbXkuanNcIixcblx0XCIuL21zLW15LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9tcy1teS5qc1wiLFxuXHRcIi4vbXMuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL21zLmpzXCIsXG5cdFwiLi9tdFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbXQuanNcIixcblx0XCIuL210LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9tdC5qc1wiLFxuXHRcIi4vbXlcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL215LmpzXCIsXG5cdFwiLi9teS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbXkuanNcIixcblx0XCIuL25iXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9uYi5qc1wiLFxuXHRcIi4vbmIuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL25iLmpzXCIsXG5cdFwiLi9uZVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbmUuanNcIixcblx0XCIuL25lLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9uZS5qc1wiLFxuXHRcIi4vbmxcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL25sLmpzXCIsXG5cdFwiLi9ubC1iZVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbmwtYmUuanNcIixcblx0XCIuL25sLWJlLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ubC1iZS5qc1wiLFxuXHRcIi4vbmwuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL25sLmpzXCIsXG5cdFwiLi9ublwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbm4uanNcIixcblx0XCIuL25uLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ubi5qc1wiLFxuXHRcIi4vb2MtbG5jXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9vYy1sbmMuanNcIixcblx0XCIuL29jLWxuYy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvb2MtbG5jLmpzXCIsXG5cdFwiLi9wYS1pblwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvcGEtaW4uanNcIixcblx0XCIuL3BhLWluLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9wYS1pbi5qc1wiLFxuXHRcIi4vcGxcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3BsLmpzXCIsXG5cdFwiLi9wbC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvcGwuanNcIixcblx0XCIuL3B0XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9wdC5qc1wiLFxuXHRcIi4vcHQtYnJcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3B0LWJyLmpzXCIsXG5cdFwiLi9wdC1ici5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvcHQtYnIuanNcIixcblx0XCIuL3B0LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9wdC5qc1wiLFxuXHRcIi4vcm9cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3JvLmpzXCIsXG5cdFwiLi9yby5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvcm8uanNcIixcblx0XCIuL3J1XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ydS5qc1wiLFxuXHRcIi4vcnUuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3J1LmpzXCIsXG5cdFwiLi9zZFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc2QuanNcIixcblx0XCIuL3NkLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zZC5qc1wiLFxuXHRcIi4vc2VcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NlLmpzXCIsXG5cdFwiLi9zZS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc2UuanNcIixcblx0XCIuL3NpXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zaS5qc1wiLFxuXHRcIi4vc2kuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NpLmpzXCIsXG5cdFwiLi9za1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc2suanNcIixcblx0XCIuL3NrLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zay5qc1wiLFxuXHRcIi4vc2xcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NsLmpzXCIsXG5cdFwiLi9zbC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc2wuanNcIixcblx0XCIuL3NxXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zcS5qc1wiLFxuXHRcIi4vc3EuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NxLmpzXCIsXG5cdFwiLi9zclwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc3IuanNcIixcblx0XCIuL3NyLWN5cmxcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NyLWN5cmwuanNcIixcblx0XCIuL3NyLWN5cmwuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NyLWN5cmwuanNcIixcblx0XCIuL3NyLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zci5qc1wiLFxuXHRcIi4vc3NcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NzLmpzXCIsXG5cdFwiLi9zcy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc3MuanNcIixcblx0XCIuL3N2XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zdi5qc1wiLFxuXHRcIi4vc3YuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3N2LmpzXCIsXG5cdFwiLi9zd1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc3cuanNcIixcblx0XCIuL3N3LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zdy5qc1wiLFxuXHRcIi4vdGFcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RhLmpzXCIsXG5cdFwiLi90YS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdGEuanNcIixcblx0XCIuL3RlXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90ZS5qc1wiLFxuXHRcIi4vdGUuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RlLmpzXCIsXG5cdFwiLi90ZXRcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RldC5qc1wiLFxuXHRcIi4vdGV0LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90ZXQuanNcIixcblx0XCIuL3RnXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90Zy5qc1wiLFxuXHRcIi4vdGcuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RnLmpzXCIsXG5cdFwiLi90aFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdGguanNcIixcblx0XCIuL3RoLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90aC5qc1wiLFxuXHRcIi4vdGtcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RrLmpzXCIsXG5cdFwiLi90ay5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdGsuanNcIixcblx0XCIuL3RsLXBoXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90bC1waC5qc1wiLFxuXHRcIi4vdGwtcGguanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RsLXBoLmpzXCIsXG5cdFwiLi90bGhcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RsaC5qc1wiLFxuXHRcIi4vdGxoLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90bGguanNcIixcblx0XCIuL3RyXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90ci5qc1wiLFxuXHRcIi4vdHIuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RyLmpzXCIsXG5cdFwiLi90emxcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3R6bC5qc1wiLFxuXHRcIi4vdHpsLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90emwuanNcIixcblx0XCIuL3R6bVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdHptLmpzXCIsXG5cdFwiLi90em0tbGF0blwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdHptLWxhdG4uanNcIixcblx0XCIuL3R6bS1sYXRuLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90em0tbGF0bi5qc1wiLFxuXHRcIi4vdHptLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90em0uanNcIixcblx0XCIuL3VnLWNuXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS91Zy1jbi5qc1wiLFxuXHRcIi4vdWctY24uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3VnLWNuLmpzXCIsXG5cdFwiLi91a1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdWsuanNcIixcblx0XCIuL3VrLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS91ay5qc1wiLFxuXHRcIi4vdXJcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3VyLmpzXCIsXG5cdFwiLi91ci5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdXIuanNcIixcblx0XCIuL3V6XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS91ei5qc1wiLFxuXHRcIi4vdXotbGF0blwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdXotbGF0bi5qc1wiLFxuXHRcIi4vdXotbGF0bi5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdXotbGF0bi5qc1wiLFxuXHRcIi4vdXouanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3V6LmpzXCIsXG5cdFwiLi92aVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdmkuanNcIixcblx0XCIuL3ZpLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS92aS5qc1wiLFxuXHRcIi4veC1wc2V1ZG9cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3gtcHNldWRvLmpzXCIsXG5cdFwiLi94LXBzZXVkby5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUveC1wc2V1ZG8uanNcIixcblx0XCIuL3lvXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS95by5qc1wiLFxuXHRcIi4veW8uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3lvLmpzXCIsXG5cdFwiLi96aC1jblwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvemgtY24uanNcIixcblx0XCIuL3poLWNuLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS96aC1jbi5qc1wiLFxuXHRcIi4vemgtaGtcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3poLWhrLmpzXCIsXG5cdFwiLi96aC1oay5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvemgtaGsuanNcIixcblx0XCIuL3poLW1vXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS96aC1tby5qc1wiLFxuXHRcIi4vemgtbW8uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3poLW1vLmpzXCIsXG5cdFwiLi96aC10d1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvemgtdHcuanNcIixcblx0XCIuL3poLXR3LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS96aC10dy5qc1wiXG59O1xuXG5cbmZ1bmN0aW9uIHdlYnBhY2tDb250ZXh0KHJlcSkge1xuXHR2YXIgaWQgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKTtcblx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oaWQpO1xufVxuZnVuY3Rpb24gd2VicGFja0NvbnRleHRSZXNvbHZlKHJlcSkge1xuXHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKG1hcCwgcmVxKSkge1xuXHRcdHZhciBlID0gbmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIiArIHJlcSArIFwiJ1wiKTtcblx0XHRlLmNvZGUgPSAnTU9EVUxFX05PVF9GT1VORCc7XG5cdFx0dGhyb3cgZTtcblx0fVxuXHRyZXR1cm4gbWFwW3JlcV07XG59XG53ZWJwYWNrQ29udGV4dC5rZXlzID0gZnVuY3Rpb24gd2VicGFja0NvbnRleHRLZXlzKCkge1xuXHRyZXR1cm4gT2JqZWN0LmtleXMobWFwKTtcbn07XG53ZWJwYWNrQ29udGV4dC5yZXNvbHZlID0gd2VicGFja0NvbnRleHRSZXNvbHZlO1xubW9kdWxlLmV4cG9ydHMgPSB3ZWJwYWNrQ29udGV4dDtcbndlYnBhY2tDb250ZXh0LmlkID0gXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlIHN5bmMgcmVjdXJzaXZlIF5cXFxcLlxcXFwvLiokXCI7Il0sIm5hbWVzIjpbInJlcXVpcmUiLCJydW5JbnB1dG1hc2siLCJ0b2FzdHIiLCJnbG9iYWwiLCJ3aW5kb3ciLCJQdXNoZXIiLCJtb21lbnQiLCJhZGRGb3JtVG9Db2xsZWN0aW9uIiwiZSIsImRhdGFzZXQiLCJjdXJyZW50VGFyZ2V0IiwidGFyZ2V0IiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiY29sbGVjdGlvbkhvbGRlciIsImxpc3RTZWxlY3RvciIsIndyYXBwZXIiLCJjcmVhdGVFbGVtZW50IiwicmVtb3ZlVGFyZ2V0Iiwic2V0QXR0cmlidXRlIiwiY29uY2F0IiwiaW5kZXgiLCJpZCIsInN1YnN0cmluZyIsImlubmVySFRNTCIsInByb3RvdHlwZSIsInJlcGxhY2UiLCJhcHBlbmQiLCIkIiwic2VsZWN0MiIsIndpZHRoIiwib24iLCJfdHlwZW9mIiwib2JqIiwiU3ltYm9sIiwiaXRlcmF0b3IiLCJjb25zdHJ1Y3RvciIsImZhY3RvcnkiLCJkZWZpbmUiLCJhbWQiLCJleHBvcnRzIiwibW9kdWxlIiwicm9vdCIsImZuIiwiZGF0YVRhYmxlIiwialF1ZXJ5IiwidW5kZWZpbmVkIiwiRGF0YVRhYmxlIiwiZXh0ZW5kIiwiZGVmYXVsdHMiLCJkb20iLCJyZW5kZXJlciIsImV4dCIsImNsYXNzZXMiLCJzV3JhcHBlciIsInNGaWx0ZXJJbnB1dCIsInNMZW5ndGhTZWxlY3QiLCJzUHJvY2Vzc2luZyIsInNQYWdlQnV0dG9uIiwicGFnZUJ1dHRvbiIsImJvb3RzdHJhcCIsInNldHRpbmdzIiwiaG9zdCIsImlkeCIsImJ1dHRvbnMiLCJwYWdlIiwicGFnZXMiLCJhcGkiLCJBcGkiLCJvQ2xhc3NlcyIsImxhbmciLCJvTGFuZ3VhZ2UiLCJvUGFnaW5hdGUiLCJhcmlhIiwib0FyaWEiLCJwYWdpbmF0ZSIsImJ0bkRpc3BsYXkiLCJidG5DbGFzcyIsImNvdW50ZXIiLCJhdHRhY2giLCJjb250YWluZXIiLCJpIiwiaWVuIiwibm9kZSIsImJ1dHRvbiIsImNsaWNrSGFuZGxlciIsInByZXZlbnREZWZhdWx0IiwiaGFzQ2xhc3MiLCJkYXRhIiwiYWN0aW9uIiwiZHJhdyIsImxlbmd0aCIsImlzQXJyYXkiLCJzRmlyc3QiLCJzUHJldmlvdXMiLCJzTmV4dCIsInNMYXN0Iiwic1RhYmxlSWQiLCJpVGFiSW5kZXgiLCJodG1sIiwiYXBwZW5kVG8iLCJvQXBpIiwiX2ZuQmluZEFjdGlvbiIsImFjdGl2ZUVsIiwiZmluZCIsImFjdGl2ZUVsZW1lbnQiLCJlbXB0eSIsImNoaWxkcmVuIiwiZm9jdXMiLCJyZWFkeSIsImxhbmd1YWdlIiwicHJldmlvdXMiLCJuZXh0IiwidXJsIiwiYXV0b1dpZHRoIiwiZGVmZXJSZW5kZXIiLCJvcmRlciIsInRleHQiLCJwYWdpbmciLCJzZWFyY2hpbmciLCJyZXRyaWV2ZSIsIiRmb3JtSm91cm5hbENhaXNzZSIsInN1Ym1pdCIsIiRkYXRhIiwic2VyaWFsaXplIiwidGFiIiwic3BsaXQiLCJ0YWIyX2RlYiIsInRhYjJfZmluIiwiZGVidXQiLCJmaW4iLCJiRGVzdHJveSIsImFqYXgiLCJkYXRhU3JjIiwiY29sdW1ucyIsInNDbGFzcyIsImN1c3RvbWl6ZSIsIndpbiIsImJvZHkiLCJjc3MiLCJhZGRDbGFzcyIsImxheW91dCIsInRvcFN0YXJ0IiwiY29sdW1uRGVmcyIsInRhcmdldHMiLCJyZW5kZXIiLCJudW1iZXIiLCJkZWxGb3JtVG9Db2xsZWN0aW9uIiwicmVtb3ZlIiwiY29uc29sZSIsImxvZyIsInR5cGVFeHBlbnNlJCIsImNoYW5nZSIsImZvcm0kIiwiY2xvc2VzdCIsImRhdGEkIiwiYXR0ciIsInZhbCIsInR5cGUiLCJtZXRob2QiLCJjb21wbGV0ZSIsInJlcGxhY2VXaXRoIiwicmVzcG9uc2VUZXh0IiwiSW5wdXRtYXNrIiwibnVtZXJpY0lucHV0IiwicmlnaHRBbGlnbiIsImF1dG9Vbm1hc2siLCJwbGFjZWhvbGRlciIsInJlbW92ZU1hc2tPblN1Ym1pdCIsImdyb3VwU2VwYXJhdG9yIiwiZ3JlZWR5IiwiZGlnaXRzIiwiYWxpYXMiLCJtYXNrIiwiY2FsY3VsZUJpbGxldCIsIk1vbnRhbnRCaWxsZXRzIiwiYmlsbGV0cyIsImdldEVsZW1lbnRzQnlDbGFzc05hbWUiLCJlYWNoIiwibXVsdGlwbGljYXRldXIiLCJNb250YW50IiwiTnVtYmVyIiwiSW50bCIsIk51bWJlckZvcm1hdCIsImZvcm1hdCIsImNhbGN1bGVNb25uYWllIiwiTW9udGFudE1vbm5haWUiLCJNb25uYWllIiwiTW9udGFudDIiLCJjYWxjdWxlTW9udGFudCIsIk1vbnRhbnRUb3RhbCIsInZhbHVlcyIsInRvdGFsIiwib3JiaXMiLCJlY2FydCIsIk1vbnRhbnQzIiwiY2FsY3VsYXRlUHJpY2UiLCJwYXJlbnRJZCIsInBhcmVudCIsInF0ZSIsInByaWNlIiwiYW1vdW50IiwiY2FsY3VsYXRlVG90YWxBbW91bnQiLCJzdW1QcmljZSIsInN1bUFtb3VudCIsInB1c2giLCJyZWR1Y2UiLCJwcmV2aW91c1ZhbHVlIiwiY3VycmVudFZhbHVlIiwiZnVsbE5hbWUiLCJ0b0xvd2VyQ2FzZSIsInRyaW0iLCJwcmVmaXgiLCJuYW1lUGFydHMiLCJmaXJzdE5hbWUiLCJsYXN0TmFtZSIsImZpcnN0TmFtZVByZWZpeCIsInRvVXBwZXJDYXNlIiwiY2hhcnNldCIsInJhbmRvbVN0cmluZyIsImNoYXJBdCIsIk1hdGgiLCJmbG9vciIsInJhbmRvbSIsInVzZXJuYW1lIl0sInNvdXJjZVJvb3QiOiIifQ==