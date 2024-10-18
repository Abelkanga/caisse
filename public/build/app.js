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












var toastr = __webpack_require__(/*! toastr/build/toastr.min */ "./node_modules/toastr/build/toastr.min.js");
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
$('.basic-datatable').dataTable({
  dom: '<"row"<"col-sm-12 col-md-4"B><"col-sm-12 col-md-8"f>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><" "p>>',
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
$('.export-datatable').dataTable({
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
  buttons: ['excel', 'pdf', 'csv']
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
/******/ __webpack_require__.O(0, ["vendors-node_modules_inputmask_dist_inputmask_js-node_modules_datatables_net-bs4_css_dataTabl-613d26"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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Q0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9hZGQtZm9ybS1jb2xsZWN0aW9uLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9kYXRhVGFibGVzLmJvb3RzdHJhcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvZGF0YXRhYmxlcy1jb25maWcuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2RhdGF0YWJsZXMtZGVtby5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvZGVsZXRlLmZvcm0uY29sbGVjdGlvbi5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvZmRiL2Zvcm0tZXhwZW5zZS5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvaW5wdXQtbWFzay5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvaW5wdXRNYXJrLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9wYWdlL2JpbGxldGFnZS5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvcGFnZS9mZGIuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL3BhZ2UvaW5kZXguanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL3BhZ2UvdXNlck5hbWVBdXRvLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9zZWxlY3QyLWRlbW8uanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2Nzcy9hcHAuY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9jc3MvY3VzdG9tLm1pbi5jc3M/Zjk3NiIsIndlYnBhY2s6Ly8vLi9hc3NldHMvcGx1Z2lucy90YWdzaW5wdXQvdGFnc2lucHV0LmNzcz8yOWQ2Iiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlLyBzeW5jIF5cXC5cXC8uKiQiXSwic291cmNlc0NvbnRlbnQiOlsiLyogKiBXZWxjb21lIHRvIHlvdXIgYXBwJ3MgbWFpbiBKYXZhU2NyaXB0IGZpbGUhXG4gKlxuICogV2UgcmVjb21tZW5kIGluY2x1ZGluZyB0aGUgYnVpbHQgdmVyc2lvbiBvZiB0aGlzIEphdmFTY3JpcHQgZmlsZSAqIChhbmQgaXRzIENTUyBmaWxlKSBpbiB5b3VyIGJhc2UgbGF5b3V0IChiYXNlLmh0bWwudHdpZykuXG4gKi9cbi8vIGFueSBDU1MgeW91IGltcG9ydCB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChhcHAuY3NzIGluIHRoaXMgY2FzZSlcblxuXG5pbXBvcnQgJy4vY3NzL2FwcC5jc3MnO1xucmVxdWlyZSgnZGF0YXRhYmxlcy5uZXQtYnM0L2Nzcy9kYXRhVGFibGVzLmJvb3RzdHJhcDQuY3NzJylcbnJlcXVpcmUoJ2RhdGF0YWJsZXMubmV0LWJ1dHRvbnMtYnM0L2Nzcy9idXR0b25zLmJvb3RzdHJhcDQubWluLmNzcycpXG5yZXF1aXJlKCdkYXRhdGFibGVzLm5ldC1maXhlZGhlYWRlci1iczQvY3NzL2ZpeGVkSGVhZGVyLmJvb3RzdHJhcDQubWluLmNzcycpXG5yZXF1aXJlKCdkYXRhdGFibGVzLm5ldC1yZXNwb25zaXZlLWJzNC9jc3MvcmVzcG9uc2l2ZS5ib290c3RyYXA0Lm1pbi5jc3MnKVxuaW1wb3J0ICcuL2pzL2RhdGFUYWJsZXMuYm9vdHN0cmFwJztcbmltcG9ydCAnc2VsZWN0Mi9kaXN0L2pzL3NlbGVjdDIubWluJ1xucmVxdWlyZSgnaW5wdXRtYXNrJyk7XG5pbXBvcnQgJy4vanMvZGF0YXRhYmxlcy1kZW1vJztcbmltcG9ydCAnLi9qcy9zZWxlY3QyLWRlbW8nO1xuaW1wb3J0ICcuL2Nzcy9jdXN0b20ubWluLmNzcyc7XG5cblxuXG5yZXF1aXJlKCcuL3BsdWdpbnMvdGFnc2lucHV0L3RhZ3NpbnB1dC5jc3MnKTtcbmltcG9ydCAnLi9qcy9kYXRhdGFibGVzLWNvbmZpZyc7XG5pbXBvcnQgJy4vanMvYWRkLWZvcm0tY29sbGVjdGlvbic7XG5pbXBvcnQgJy4vanMvZGVsZXRlLmZvcm0uY29sbGVjdGlvbidcbmltcG9ydCAnLi9qcy9mZGIvZm9ybS1leHBlbnNlJ1xuaW1wb3J0ICcuL2pzL3BhZ2UvYmlsbGV0YWdlJ1xuaW1wb3J0ICcuL2pzL3BhZ2UvaW5kZXgnXG5pbXBvcnQgJy4vanMvcGFnZS91c2VyTmFtZUF1dG8nXG5pbXBvcnQgJ2RhdGF0YWJsZXMubmV0LWJzNC9qcy9kYXRhVGFibGVzLmJvb3RzdHJhcDQubWluJ1xuaW1wb3J0ICdkYXRhdGFibGVzLm5ldC1idXR0b25zL2pzL2J1dHRvbnMucHJpbnQnXG5pbXBvcnQgJ2RhdGF0YWJsZXMubmV0LWZpeGVkaGVhZGVyLWJzNC9qcy9maXhlZEhlYWRlci5ib290c3RyYXA0Lm1pbidcbmltcG9ydCAnZGF0YXRhYmxlcy5uZXQtcmVzcG9uc2l2ZS1iczQvanMvcmVzcG9uc2l2ZS5ib290c3RyYXA0Lm1pbidcblxuaW1wb3J0IHsgcnVuSW5wdXRtYXNrIH0gZnJvbSBcIi4vanMvaW5wdXQtbWFza1wiO1xuXG5cblxuY29uc3QgdG9hc3RyID0gcmVxdWlyZSgndG9hc3RyL2J1aWxkL3RvYXN0ci5taW4nKTtcbmdsb2JhbC50b2FzdHIgPSB0b2FzdHI7XG5cbndpbmRvdy5QdXNoZXIgPSByZXF1aXJlKCdwdXNoZXItanMnKTtcblxuY29uc3QgbW9tZW50ID0gcmVxdWlyZSgnbW9tZW50Jylcbmdsb2JhbC5tb21lbnQgPSBtb21lbnQ7XG5cblxuaW1wb3J0ICcuL2pzL3BhZ2UvZmRiJztcblxuIHJ1bklucHV0bWFzaygpO1xuIiwiaW1wb3J0IHsgcnVuSW5wdXRtYXNrIH0gZnJvbSBcIi4vaW5wdXRNYXJrXCI7XG5cbmNvbnN0IGFkZEZvcm1Ub0NvbGxlY3Rpb24gPSAoZSkgPT4ge1xuICAgIGNvbnN0IGRhdGFzZXQgPSBlLmN1cnJlbnRUYXJnZXQuZGF0YXNldDtcbiAgICBjb25zdCB0YXJnZXQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKGRhdGFzZXQudGFyZ2V0KTtcbiAgICBjb25zdCBjb2xsZWN0aW9uSG9sZGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihkYXRhc2V0Lmxpc3RTZWxlY3Rvcik7XG4gICAgY29uc3Qgd3JhcHBlciA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ3RyJyk7XG4gICAgY29uc3QgcmVtb3ZlVGFyZ2V0ID0gZGF0YXNldC5yZW1vdmVUYXJnZXQ7XG4gICAgd3JhcHBlci5zZXRBdHRyaWJ1dGUoJ2lkJywgYCR7cmVtb3ZlVGFyZ2V0fV8ke2RhdGFzZXQuaW5kZXh9YClcbiAgICBsZXQgaWQgPSBgJHtyZW1vdmVUYXJnZXR9XyR7ZGF0YXNldC5pbmRleH1gO1xuICAgIGlkID0gaWQuc3Vic3RyaW5nKDYpO1xuXG4gICAgd3JhcHBlci5zZXRBdHRyaWJ1dGUoJ2RhdGEtaWQnLCBpZClcbiAgICB3cmFwcGVyLmlubmVySFRNTCA9IGNvbGxlY3Rpb25Ib2xkZXJcbiAgICAgICAgLmRhdGFzZXRcbiAgICAgICAgLnByb3RvdHlwZVxuICAgICAgICAucmVwbGFjZShcbiAgICAgICAgICAgIC9fX25hbWVfXy9nLFxuICAgICAgICAgICAgZGF0YXNldC5pbmRleFxuICAgICAgICApO1xuICAgIHRhcmdldC5hcHBlbmQod3JhcHBlcik7XG4gICAgZGF0YXNldC5pbmRleCsrO1xuICAgICQoJ3NlbGVjdC5zZWxlY3QyJykuc2VsZWN0Mih7IHdpZHRoOiAnMTAwJScgfSlcbiAgICBydW5JbnB1dG1hc2soKTtcbn07XG5cbiQoZG9jdW1lbnQpLm9uKCdjbGljaycsICcuYWRkX2l0ZW1fbGluaycsIGUgPT4ge1xuICAgIGFkZEZvcm1Ub0NvbGxlY3Rpb24oZSlcbn0pOyIsIlwidXNlIHN0cmljdFwiO1xuXG5mdW5jdGlvbiBfdHlwZW9mKG9iaikgeyBcIkBiYWJlbC9oZWxwZXJzIC0gdHlwZW9mXCI7IGlmICh0eXBlb2YgU3ltYm9sID09PSBcImZ1bmN0aW9uXCIgJiYgdHlwZW9mIFN5bWJvbC5pdGVyYXRvciA9PT0gXCJzeW1ib2xcIikgeyBfdHlwZW9mID0gZnVuY3Rpb24gX3R5cGVvZihvYmopIHsgcmV0dXJuIHR5cGVvZiBvYmo7IH07IH0gZWxzZSB7IF90eXBlb2YgPSBmdW5jdGlvbiBfdHlwZW9mKG9iaikgeyByZXR1cm4gb2JqICYmIHR5cGVvZiBTeW1ib2wgPT09IFwiZnVuY3Rpb25cIiAmJiBvYmouY29uc3RydWN0b3IgPT09IFN5bWJvbCAmJiBvYmogIT09IFN5bWJvbC5wcm90b3R5cGUgPyBcInN5bWJvbFwiIDogdHlwZW9mIG9iajsgfTsgfSByZXR1cm4gX3R5cGVvZihvYmopOyB9XG5cbi8qISBEYXRhVGFibGVzIEJvb3RzdHJhcCAzIGludGVncmF0aW9uXG4gKiDCqTIwMTEtMjAxNSBTcHJ5TWVkaWEgTHRkIC0gZGF0YXRhYmxlcy5uZXQvbGljZW5zZVxuICovXG5cbi8qKlxuICogRGF0YVRhYmxlcyBpbnRlZ3JhdGlvbiBmb3IgQm9vdHN0cmFwIDMuIFRoaXMgcmVxdWlyZXMgQm9vdHN0cmFwIDMgYW5kXG4gKiBEYXRhVGFibGVzIDEuMTAgb3IgbmV3ZXIuXG4gKlxuICogVGhpcyBmaWxlIHNldHMgdGhlIGRlZmF1bHRzIGFuZCBhZGRzIG9wdGlvbnMgdG8gRGF0YVRhYmxlcyB0byBzdHlsZSBpdHNcbiAqIGNvbnRyb2xzIHVzaW5nIEJvb3RzdHJhcC4gU2VlIGh0dHA6Ly9kYXRhdGFibGVzLm5ldC9tYW51YWwvc3R5bGluZy9ib290c3RyYXBcbiAqIGZvciBmdXJ0aGVyIGluZm9ybWF0aW9uLlxuICovXG4oZnVuY3Rpb24gKGZhY3RvcnkpIHtcbiAgaWYgKHR5cGVvZiBkZWZpbmUgPT09ICdmdW5jdGlvbicgJiYgZGVmaW5lLmFtZCkge1xuICAgIC8vIEFNRFxuICAgIGRlZmluZShbJ2pxdWVyeScsICdkYXRhdGFibGVzLm5ldCddLCBmdW5jdGlvbiAoJCkge1xuICAgICAgcmV0dXJuIGZhY3RvcnkoJCwgd2luZG93LCBkb2N1bWVudCk7XG4gICAgfSk7XG4gIH0gZWxzZSBpZiAoKHR5cGVvZiBleHBvcnRzID09PSBcInVuZGVmaW5lZFwiID8gXCJ1bmRlZmluZWRcIiA6IF90eXBlb2YoZXhwb3J0cykpID09PSAnb2JqZWN0Jykge1xuICAgIC8vIENvbW1vbkpTXG4gICAgbW9kdWxlLmV4cG9ydHMgPSBmdW5jdGlvbiAocm9vdCwgJCkge1xuICAgICAgaWYgKCFyb290KSB7XG4gICAgICAgIHJvb3QgPSB3aW5kb3c7XG4gICAgICB9XG5cbiAgICAgIGlmICghJCB8fCAhJC5mbi5kYXRhVGFibGUpIHtcbiAgICAgICAgLy8gUmVxdWlyZSBEYXRhVGFibGVzLCB3aGljaCBhdHRhY2hlcyB0byBqUXVlcnksIGluY2x1ZGluZ1xuICAgICAgICAvLyBqUXVlcnkgaWYgbmVlZGVkIGFuZCBoYXZlIGEgJCBwcm9wZXJ0eSBzbyB3ZSBjYW4gYWNjZXNzIHRoZVxuICAgICAgICAvLyBqUXVlcnkgb2JqZWN0IHRoYXQgaXMgdXNlZFxuICAgICAgICAkID0gcmVxdWlyZSgnZGF0YXRhYmxlcy5uZXQnKShyb290LCAkKS4kO1xuICAgICAgfVxuXG4gICAgICByZXR1cm4gZmFjdG9yeSgkLCByb290LCByb290LmRvY3VtZW50KTtcbiAgICB9O1xuICB9IGVsc2Uge1xuICAgIC8vIEJyb3dzZXJcbiAgICBmYWN0b3J5KGpRdWVyeSwgd2luZG93LCBkb2N1bWVudCk7XG4gIH1cbn0pKGZ1bmN0aW9uICgkLCB3aW5kb3csIGRvY3VtZW50LCB1bmRlZmluZWQpIHtcbiAgJ3VzZSBzdHJpY3QnO1xuXG4gIHZhciBEYXRhVGFibGUgPSAkLmZuLmRhdGFUYWJsZTtcbiAgLyogU2V0IHRoZSBkZWZhdWx0cyBmb3IgRGF0YVRhYmxlcyBpbml0aWFsaXNhdGlvbiAqL1xuXG4gICQuZXh0ZW5kKHRydWUsIERhdGFUYWJsZS5kZWZhdWx0cywge1xuICAgIGRvbTogJzxcXCd0ZXh0LW11dGVkXFwnaT4nICsgJzxcXCd0YWJsZS1yZXNwb25zaXZlXFwndHI+JyArICc8XFwnbXQtNFxcJ3A+JyxcbiAgICByZW5kZXJlcjogJ2Jvb3RzdHJhcCdcbiAgfSk7XG4gIC8qIERlZmF1bHQgY2xhc3MgbW9kaWZpY2F0aW9uICovXG5cbiAgJC5leHRlbmQoRGF0YVRhYmxlLmV4dC5jbGFzc2VzLCB7XG4gICAgc1dyYXBwZXI6ICdkYXRhVGFibGVzX3dyYXBwZXIgZHQtYm9vdHN0cmFwNCcsXG4gICAgc0ZpbHRlcklucHV0OiAnZm9ybS1jb250cm9sJyxcbiAgICBzTGVuZ3RoU2VsZWN0OiAnY3VzdG9tLXNlbGVjdCcsXG4gICAgc1Byb2Nlc3Npbmc6ICdkYXRhVGFibGVzX3Byb2Nlc3NpbmcgY2FyZCcsXG4gICAgc1BhZ2VCdXR0b246ICdwYWdpbmF0ZV9idXR0b24gcGFnZS1pdGVtJ1xuICB9KTtcbiAgLyogQm9vdHN0cmFwIHBhZ2luZyBidXR0b24gcmVuZGVyZXIgKi9cblxuICBEYXRhVGFibGUuZXh0LnJlbmRlcmVyLnBhZ2VCdXR0b24uYm9vdHN0cmFwID0gZnVuY3Rpb24gKHNldHRpbmdzLCBob3N0LCBpZHgsIGJ1dHRvbnMsIHBhZ2UsIHBhZ2VzKSB7XG4gICAgdmFyIGFwaSA9IG5ldyBEYXRhVGFibGUuQXBpKHNldHRpbmdzKTtcbiAgICB2YXIgY2xhc3NlcyA9IHNldHRpbmdzLm9DbGFzc2VzO1xuICAgIHZhciBsYW5nID0gc2V0dGluZ3Mub0xhbmd1YWdlLm9QYWdpbmF0ZTtcbiAgICB2YXIgYXJpYSA9IHNldHRpbmdzLm9MYW5ndWFnZS5vQXJpYS5wYWdpbmF0ZSB8fCB7fTtcbiAgICB2YXIgYnRuRGlzcGxheSxcbiAgICAgICAgYnRuQ2xhc3MsXG4gICAgICAgIGNvdW50ZXIgPSAwO1xuXG4gICAgdmFyIGF0dGFjaCA9IGZ1bmN0aW9uIGF0dGFjaChjb250YWluZXIsIGJ1dHRvbnMpIHtcbiAgICAgIHZhciBpLCBpZW4sIG5vZGUsIGJ1dHRvbjtcblxuICAgICAgdmFyIGNsaWNrSGFuZGxlciA9IGZ1bmN0aW9uIGNsaWNrSGFuZGxlcihlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICBpZiAoISQoZS5jdXJyZW50VGFyZ2V0KS5oYXNDbGFzcygnZGlzYWJsZWQnKSAmJiBhcGkucGFnZSgpICE9IGUuZGF0YS5hY3Rpb24pIHtcbiAgICAgICAgICBhcGkucGFnZShlLmRhdGEuYWN0aW9uKS5kcmF3KCdwYWdlJyk7XG4gICAgICAgIH1cbiAgICAgIH07XG5cbiAgICAgIGZvciAoaSA9IDAsIGllbiA9IGJ1dHRvbnMubGVuZ3RoOyBpIDwgaWVuOyBpKyspIHtcbiAgICAgICAgYnV0dG9uID0gYnV0dG9uc1tpXTtcblxuICAgICAgICBpZiAoJC5pc0FycmF5KGJ1dHRvbikpIHtcbiAgICAgICAgICBhdHRhY2goY29udGFpbmVyLCBidXR0b24pO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIGJ0bkRpc3BsYXkgPSAnJztcbiAgICAgICAgICBidG5DbGFzcyA9ICcnO1xuXG4gICAgICAgICAgc3dpdGNoIChidXR0b24pIHtcbiAgICAgICAgICAgIGNhc2UgJ2VsbGlwc2lzJzpcbiAgICAgICAgICAgICAgYnRuRGlzcGxheSA9ICcmI3gyMDI2Oyc7XG4gICAgICAgICAgICAgIGJ0bkNsYXNzID0gJ2Rpc2FibGVkJztcbiAgICAgICAgICAgICAgYnJlYWs7XG5cbiAgICAgICAgICAgIGNhc2UgJ2ZpcnN0JzpcbiAgICAgICAgICAgICAgYnRuRGlzcGxheSA9IGxhbmcuc0ZpcnN0O1xuICAgICAgICAgICAgICBidG5DbGFzcyA9IGJ1dHRvbiArIChwYWdlID4gMCA/ICcnIDogJyBkaXNhYmxlZCcpO1xuICAgICAgICAgICAgICBicmVhaztcblxuICAgICAgICAgICAgY2FzZSAncHJldmlvdXMnOlxuICAgICAgICAgICAgICBidG5EaXNwbGF5ID0gbGFuZy5zUHJldmlvdXM7XG4gICAgICAgICAgICAgIGJ0bkNsYXNzID0gYnV0dG9uICsgKHBhZ2UgPiAwID8gJycgOiAnIGRpc2FibGVkJyk7XG4gICAgICAgICAgICAgIGJyZWFrO1xuXG4gICAgICAgICAgICBjYXNlICduZXh0JzpcbiAgICAgICAgICAgICAgYnRuRGlzcGxheSA9IGxhbmcuc05leHQ7XG4gICAgICAgICAgICAgIGJ0bkNsYXNzID0gYnV0dG9uICsgKHBhZ2UgPCBwYWdlcyAtIDEgPyAnJyA6ICcgZGlzYWJsZWQnKTtcbiAgICAgICAgICAgICAgYnJlYWs7XG5cbiAgICAgICAgICAgIGNhc2UgJ2xhc3QnOlxuICAgICAgICAgICAgICBidG5EaXNwbGF5ID0gbGFuZy5zTGFzdDtcbiAgICAgICAgICAgICAgYnRuQ2xhc3MgPSBidXR0b24gKyAocGFnZSA8IHBhZ2VzIC0gMSA/ICcnIDogJyBkaXNhYmxlZCcpO1xuICAgICAgICAgICAgICBicmVhaztcblxuICAgICAgICAgICAgZGVmYXVsdDpcbiAgICAgICAgICAgICAgYnRuRGlzcGxheSA9IGJ1dHRvbiArIDE7XG4gICAgICAgICAgICAgIGJ0bkNsYXNzID0gcGFnZSA9PT0gYnV0dG9uID8gJ2FjdGl2ZScgOiAnJztcbiAgICAgICAgICAgICAgYnJlYWs7XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgaWYgKGJ0bkRpc3BsYXkpIHtcbiAgICAgICAgICAgIG5vZGUgPSAkKCc8bGk+Jywge1xuICAgICAgICAgICAgICAnY2xhc3MnOiBjbGFzc2VzLnNQYWdlQnV0dG9uICsgJyAnICsgYnRuQ2xhc3MsXG4gICAgICAgICAgICAgICdpZCc6IGlkeCA9PT0gMCAmJiB0eXBlb2YgYnV0dG9uID09PSAnc3RyaW5nJyA/IHNldHRpbmdzLnNUYWJsZUlkICsgJ18nICsgYnV0dG9uIDogbnVsbFxuICAgICAgICAgICAgfSkuYXBwZW5kKCQoJzxhPicsIHtcbiAgICAgICAgICAgICAgJ2hyZWYnOiAnIycsXG4gICAgICAgICAgICAgICdhcmlhLWNvbnRyb2xzJzogc2V0dGluZ3Muc1RhYmxlSWQsXG4gICAgICAgICAgICAgICdhcmlhLWxhYmVsJzogYXJpYVtidXR0b25dLFxuICAgICAgICAgICAgICAnZGF0YS1kdC1pZHgnOiBjb3VudGVyLFxuICAgICAgICAgICAgICAndGFiaW5kZXgnOiBzZXR0aW5ncy5pVGFiSW5kZXgsXG4gICAgICAgICAgICAgICdjbGFzcyc6ICdwYWdlLWxpbmsnXG4gICAgICAgICAgICB9KS5odG1sKGJ0bkRpc3BsYXkpKS5hcHBlbmRUbyhjb250YWluZXIpO1xuXG4gICAgICAgICAgICBzZXR0aW5ncy5vQXBpLl9mbkJpbmRBY3Rpb24obm9kZSwge1xuICAgICAgICAgICAgICBhY3Rpb246IGJ1dHRvblxuICAgICAgICAgICAgfSwgY2xpY2tIYW5kbGVyKTtcblxuICAgICAgICAgICAgY291bnRlcisrO1xuICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgfVxuICAgIH07IC8vIElFOSB0aHJvd3MgYW4gJ3Vua25vd24gZXJyb3InIGlmIGRvY3VtZW50LmFjdGl2ZUVsZW1lbnQgaXMgdXNlZFxuICAgIC8vIGluc2lkZSBhbiBpZnJhbWUgb3IgZnJhbWUuXG5cblxuICAgIHZhciBhY3RpdmVFbDtcblxuICAgIHRyeSB7XG4gICAgICAvLyBCZWNhdXNlIHRoaXMgYXBwcm9hY2ggaXMgZGVzdHJveWluZyBhbmQgcmVjcmVhdGluZyB0aGUgcGFnaW5nXG4gICAgICAvLyBlbGVtZW50cywgZm9jdXMgaXMgbG9zdCBvbiB0aGUgc2VsZWN0IGJ1dHRvbiB3aGljaCBpcyBiYWQgZm9yXG4gICAgICAvLyBhY2Nlc3NpYmlsaXR5LiBTbyB3ZSB3YW50IHRvIHJlc3RvcmUgZm9jdXMgb25jZSB0aGUgZHJhdyBoYXNcbiAgICAgIC8vIGNvbXBsZXRlZFxuICAgICAgYWN0aXZlRWwgPSAkKGhvc3QpLmZpbmQoZG9jdW1lbnQuYWN0aXZlRWxlbWVudCkuZGF0YSgnZHQtaWR4Jyk7XG4gICAgfSBjYXRjaCAoZSkge31cblxuICAgIGF0dGFjaCgkKGhvc3QpLmVtcHR5KCkuaHRtbCgnPHVsIGNsYXNzPVwicGFnaW5hdGlvbiBqdXN0aWZ5LWNvbnRlbnQtY2VudGVyXCIvPicpLmNoaWxkcmVuKCd1bCcpLCBidXR0b25zKTtcblxuICAgIGlmIChhY3RpdmVFbCAhPT0gdW5kZWZpbmVkKSB7XG4gICAgICAkKGhvc3QpLmZpbmQoJ1tkYXRhLWR0LWlkeD0nICsgYWN0aXZlRWwgKyAnXScpLmZvY3VzKCk7XG4gICAgfVxuICB9O1xuXG4gIHJldHVybiBEYXRhVGFibGU7XG59KTsiLCIkKCcuYmFzaWMtZGF0YXRhYmxlJykuZGF0YVRhYmxlKHtcbiAgICBkb206ICc8XCJyb3dcIjxcImNvbC1zbS0xMiBjb2wtbWQtNFwiQj48XCJjb2wtc20tMTIgY29sLW1kLThcImY+PjxcInJvd1wiPFwiY29sLXNtLTEyXCJ0Pj48XCJyb3dcIjxcImNvbC1zbS0xMiBjb2wtbWQtNVwiaT48XCIgXCJwPj4nLFxuICAgIGxhbmd1YWdlOiB7XG4gICAgICAgIHBhZ2luYXRlOiB7XG4gICAgICAgICAgICBwcmV2aW91czogJzxpIGNsYXNzPVwiZmEgZmEtbGcgZmEtYW5nbGUtbGVmdFwiPjwvaT4nLFxuICAgICAgICAgICAgbmV4dDogJzxpIGNsYXNzPVwiZmEgZmEtbGcgZmEtYW5nbGUtcmlnaHRcIj48L2k+J1xuICAgICAgICB9LFxuICAgICAgICB1cmw6ICcvL2Nkbi5kYXRhdGFibGVzLm5ldC9wbHVnLWlucy8xLjEyLjEvaTE4bi9mci1GUi5qc29uJ1xuICAgIH0sXG4gICAgYXV0b1dpZHRoOiBmYWxzZSxcbiAgICBkZWZlclJlbmRlcjogdHJ1ZSxcbiAgICBvcmRlcjogWzEsICdhc2MnXSxcbiAgICBidXR0b25zOiBbXG4gICAgICAgICdjb3B5JywgJ3ByaW50J1xuICAgIF1cbn0pO1xuXG4kKCcuZXhwb3J0LWRhdGF0YWJsZScpLmRhdGFUYWJsZSh7XG4gICAgZG9tOiAnPFwicm93XCI8XCJjb2wtc20tMTIgY29sLW1kLTRcIkI+PFwiY29sLXNtLTEyIGNvbC1tZC04XCJmPj48XCJyb3dcIjxcImNvbC1zbS0xMlwidD4+PFwicm93XCI8XCJjb2wtc20tMTIgY29sLW1kLTVcImk+PFwiY29sLXNtLTEyIGNvbC1tZC03XCJwPj4nLFxuICAgIGxhbmd1YWdlOiB7XG4gICAgICAgIHBhZ2luYXRlOiB7XG4gICAgICAgICAgICBwcmV2aW91czogJzxpIGNsYXNzPVwiZmEgZmEtbGcgZmEtYW5nbGUtbGVmdFwiPjwvaT4nLFxuICAgICAgICAgICAgbmV4dDogJzxpIGNsYXNzPVwiZmEgZmEtbGcgZmEtYW5nbGUtcmlnaHRcIj48L2k+J1xuICAgICAgICB9LFxuICAgICAgICB1cmw6ICcvL2Nkbi5kYXRhdGFibGVzLm5ldC9wbHVnLWlucy8xLjEyLjEvaTE4bi9mci1GUi5qc29uJ1xuICAgIH0sXG4gICAgYXV0b1dpZHRoOiBmYWxzZSxcbiAgICBkZWZlclJlbmRlcjogdHJ1ZSxcbiAgICBvcmRlcjogWzEsICdhc2MnXSxcbiAgICBidXR0b25zOiBbXG4gICAgICAgICdleGNlbCcsICdwZGYnLCAnY3N2J1xuICAgIF1cbn0pO1xuXG4iLCIkKCcucmVwb3J0LWRhdGF0YWJsZScpLmRhdGFUYWJsZSh7XHJcbiAgICBwYWdpbmc6IGZhbHNlLFxyXG4gICAgc2VhcmNoaW5nOiBmYWxzZSxcclxuICAgIHJldHJpZXZlOiB0cnVlLFxyXG4gICAgZG9tOiAnPFwicm93XCI8XCJjb2wtc20tMTIgY29sLW1kLTRcIkI+PFwiY29sLXNtLTEyIGNvbC1tZC04XCJmPj48XCJyb3dcIjxcImNvbC1zbS0xMlwidD4+PFwicm93XCI8XCJjb2wtc20tMTIgY29sLW1kLTVcImk+PFwiY29sLXNtLTEyIGNvbC1tZC03XCJwPj4nLFxyXG4gICAgbGFuZ3VhZ2U6IHtcclxuICAgICAgICBwYWdpbmF0ZToge1xyXG4gICAgICAgICAgICBwcmV2aW91czogJzxpIGNsYXNzPVwiZmEgZmEtbGcgZmEtYW5nbGUtbGVmdFwiPjwvaT4nLFxyXG4gICAgICAgICAgICBuZXh0OiAnPGkgY2xhc3M9XCJmYSBmYS1sZyBmYS1hbmdsZS1yaWdodFwiPjwvaT4nXHJcbiAgICAgICAgfSxcclxuICAgICAgICB1cmw6ICcvL2Nkbi5kYXRhdGFibGVzLm5ldC9wbHVnLWlucy8xLjEyLjEvaTE4bi9mci1GUi5qc29uJ1xyXG4gICAgfSxcclxuICAgIGF1dG9XaWR0aDogZmFsc2UsXHJcbiAgICBkZWZlclJlbmRlcjogdHJ1ZSxcclxuICAgIG9yZGVyOiBbMSwgJ2FzYyddLFxyXG4gICAgYnV0dG9uczogW1xyXG4gICAgICAgICdjb3B5JywgJ3ByaW50J1xyXG4gICAgXSxcclxufSk7XHJcblxyXG5cclxuY29uc3QgJGZvcm1Kb3VybmFsQ2Fpc3NlID0gJCgnZm9ybVtuYW1lPVwiZm9ybV9qb3VybmFsX2NhaXNzZVwiXScpO1xyXG4kZm9ybUpvdXJuYWxDYWlzc2Uuc3VibWl0KGZ1bmN0aW9uIChlKSB7XHJcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICBjb25zdCAkZGF0YSA9ICQodGhpcykuc2VyaWFsaXplKCk7XHJcbiAgICBjb25zdCB0YWIgPSAkZGF0YS5zcGxpdCgnJicpO1xyXG4gICAgY29uc3QgdGFiMl9kZWIgPSB0YWJbMF0uc3BsaXQoJz0nKTtcclxuICAgIGNvbnN0IHRhYjJfZmluID0gdGFiWzFdLnNwbGl0KCc9Jyk7XHJcbiAgICBjb25zdCBkZWJ1dCA9IHRhYjJfZGViWzFdO1xyXG4gICAgY29uc3QgZmluID0gdGFiMl9maW5bMV07XHJcbiAgICAkKCcjdGFibGVfcmVwb3J0aW5nX2pvdXJuYWwnKS5kYXRhVGFibGUoe1xyXG4gICAgICAgIGJEZXN0cm95OiB0cnVlLFxyXG4gICAgICAgIGFqYXg6IHtcclxuICAgICAgICAgICAgdXJsOiBgL2NhaXNzZS9ldGF0PyR7JGRhdGF9YCxcclxuICAgICAgICAgICAgZGF0YVNyYzogJydcclxuICAgICAgICB9LFxyXG4gICAgICAgIGNvbHVtbnM6IFtcclxuICAgICAgICAgICAgeyBkYXRhOiAnZGF0ZScsIHNDbGFzczogJ3RleHQtY2VudGVyJyB9LFxyXG4gICAgICAgICAgICB7IGRhdGE6ICdudW1fcGllY2UnLCBzQ2xhc3M6ICd0ZXh0LWxlZnQnIH0sXHJcbiAgICAgICAgICAgIHsgZGF0YTogJ2xpYmVsbGUnLCBzQ2xhc3M6ICd0ZXh0LWxlZnQnIH0sXHJcbiAgICAgICAgICAgIHsgZGF0YTogJ2RlYml0Jywgc0NsYXNzOiAndGV4dC1yaWdodCcgfSxcclxuICAgICAgICAgICAgeyBkYXRhOiAnY3JlZGl0Jywgc0NsYXNzOiAndGV4dC1yaWdodCcgfSxcclxuICAgICAgICAgICAgeyBkYXRhOiAnc29sZGUnLCBzQ2xhc3M6ICd0ZXh0LXJpZ2h0JyB9LFxyXG4gICAgICAgIF0sXHJcbiAgICAgICAgZG9tOiAnPFwicm93XCI8XCJjb2wtc20tMTIgY29sLW1kLTRcIkI+PFwiY29sLXNtLTEyIGNvbC1tZC04XCJmPj48XCJyb3dcIjxcImNvbC1zbS0xMlwidD4+PFwicm93XCI8XCJjb2wtc20tMTIgY29sLW1kLTVcImk+PFwiY29sLXNtLTEyIGNvbC1tZC03XCJwPj4nLFxyXG4gICAgICAgIGJ1dHRvbnM6IFtcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgZXh0ZW5kOiAncHJpbnQnLFxyXG4gICAgICAgICAgICAgICAgY3VzdG9taXplOiBmdW5jdGlvbiAod2luKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJCh3aW4uZG9jdW1lbnQuYm9keSlcclxuICAgICAgICAgICAgICAgICAgICAgICAgLmNzcygnZm9udC1zaXplJywgJzEwcHQnKVxyXG5cclxuICAgICAgICAgICAgICAgICAgICAkKHdpbi5kb2N1bWVudC5ib2R5KVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAuZmluZCgndGFibGUnKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAuYWRkQ2xhc3MoJ2NvbXBhY3QnKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAuY3NzKCdmb250LXNpemUnLCAnaW5oZXJpdCcpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgXSxcclxuICAgICAgICBsYXlvdXQ6IHtcclxuICAgICAgICAgICAgdG9wU3RhcnQ6ICdidXR0b25zJ1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAgY29sdW1uRGVmczogW1xyXG4gICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRzOiAzLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiAkLmZuLmRhdGFUYWJsZS5yZW5kZXIubnVtYmVyKCcgJywgJywnLCAwLCAnJyksXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldHM6IDQsXHJcbiAgICAgICAgICAgICAgICByZW5kZXI6ICQuZm4uZGF0YVRhYmxlLnJlbmRlci5udW1iZXIoJyAnLCAnLCcsIDAsICcnKSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogNSxcclxuICAgICAgICAgICAgICAgIHJlbmRlcjogJC5mbi5kYXRhVGFibGUucmVuZGVyLm51bWJlcignICcsICcsJywgMCwgJycpLFxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgIF1cclxuICAgIH0pO1xyXG59KTsiLCJpbXBvcnQgeyBydW5JbnB1dG1hc2sgfSBmcm9tIFwiLi9pbnB1dE1hcmtcIjtcblxuY29uc3QgZGVsRm9ybVRvQ29sbGVjdGlvbiA9IChlKSA9PiB7XG4gICAgY29uc3QgZGF0YXNldCA9IGUuY3VycmVudFRhcmdldC5kYXRhc2V0O1xuICAgIGNvbnN0IHRhcmdldCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoZGF0YXNldC50YXJnZXQpO1xuICAgICQodGFyZ2V0KS5yZW1vdmUoKTtcbiAgICBydW5JbnB1dG1hc2soKTtcbn1cblxuJChkb2N1bWVudCkub24oJ2NsaWNrJywgJy5kZWxfaXRlbV9saW5rJywgZSA9PiB7XG4gICAgZGVsRm9ybVRvQ29sbGVjdGlvbihlKVxufSk7IiwiLy8gY29uc3QgdHlwZUV4cGVuc2UkID0gJCgnI2ZkYl90eXBlRXhwZW5zZScpO1xyXG4vLyB0eXBlRXhwZW5zZSQuY2hhbmdlKGZ1bmN0aW9uICgpIHtcclxuLy8gICAgIGNvbnN0IGZvcm0kID0gdHlwZUV4cGVuc2UkLmNsb3Nlc3QoJ2Zvcm0nKTtcclxuLy8gICAgIGNvbnN0IGRhdGEkID0ge307XHJcbi8vICAgICBkYXRhJFt0eXBlRXhwZW5zZSQuYXR0cignbmFtZScpXSA9IHR5cGVFeHBlbnNlJC52YWwoKTtcclxuLy8gICAgICQuYWpheCh7XHJcbi8vICAgICAgICAgdXJsOiBmb3JtJC5hdHRyKCdhY3Rpb24nKSxcclxuLy8gICAgICAgICB0eXBlOiBmb3JtJC5hdHRyKCdtZXRob2QnKSxcclxuLy8gICAgICAgICBtZXRob2Q6ICdQT1NUJyxcclxuLy8gICAgICAgICBkYXRhOiBkYXRhJCxcclxuLy8gICAgICAgICBjb21wbGV0ZTogZnVuY3Rpb24gKGh0bWwpIHtcclxuLy8gICAgICAgICAgICAgJCgnI2ZkYl9leHBlbnNlJykucmVwbGFjZVdpdGgoJChodG1sLnJlc3BvbnNlVGV4dCkuZmluZCgnI2ZkYl9leHBlbnNlJykpXHJcbi8vICAgICAgICAgICAgICQoJyNmZGJfZXhwZW5zZScpLnNlbGVjdDIoKTtcclxuLy8gICAgICAgICB9XHJcbi8vICAgICB9KTtcclxuLy8gfSlcclxuLy8gYXNzZXRzL2pzL2ZkYi5qc1xyXG5cclxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XHJcbiAgICBjb25zb2xlLmxvZyhcImpRdWVyeSBpcyB3b3JraW5nIVwiKTtcclxuICAgIGNvbnN0IHR5cGVFeHBlbnNlJCA9ICQoJyNmZGJfdHlwZUV4cGVuc2UnKTtcclxuICAgIHR5cGVFeHBlbnNlJC5jaGFuZ2UoZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGNvbnN0IGZvcm0kID0gdHlwZUV4cGVuc2UkLmNsb3Nlc3QoJ2Zvcm0nKTtcclxuICAgICAgICBjb25zdCBkYXRhJCA9IHt9O1xyXG4gICAgICAgIGRhdGEkW3R5cGVFeHBlbnNlJC5hdHRyKCduYW1lJyldID0gdHlwZUV4cGVuc2UkLnZhbCgpO1xyXG4gICAgICAgICQuYWpheCh7XHJcbiAgICAgICAgICAgIHVybDogZm9ybSQuYXR0cignYWN0aW9uJyksXHJcbiAgICAgICAgICAgIHR5cGU6IGZvcm0kLmF0dHIoJ21ldGhvZCcpLFxyXG4gICAgICAgICAgICBtZXRob2Q6ICdQT1NUJyxcclxuICAgICAgICAgICAgZGF0YTogZGF0YSQsXHJcbiAgICAgICAgICAgIGNvbXBsZXRlOiBmdW5jdGlvbiAoaHRtbCkge1xyXG4gICAgICAgICAgICAgICAgJCgnI2ZkYl9leHBlbnNlJykucmVwbGFjZVdpdGgoJChodG1sLnJlc3BvbnNlVGV4dCkuZmluZCgnI2ZkYl9leHBlbnNlJykpXHJcbiAgICAgICAgICAgICAgICAkKCcjZmRiX2V4cGVuc2UnKS5zZWxlY3QyKCk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH0pO1xyXG5cclxufSk7IiwiZXhwb3J0IGNvbnN0IHJ1bklucHV0bWFzayA9ICgpID0+IHtcclxuICAgICQoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgSW5wdXRtYXNrKCcnLCB7XHJcbiAgICAgICAgICAgIG51bWVyaWNJbnB1dDogdHJ1ZSxcclxuICAgICAgICAgICAgcmlnaHRBbGlnbjogZmFsc2UsXHJcbiAgICAgICAgICAgIGF1dG9Vbm1hc2s6IHRydWUsXHJcbiAgICAgICAgICAgIHBsYWNlaG9sZGVyOiAnJyxcclxuICAgICAgICAgICAgcmVtb3ZlTWFza09uU3VibWl0OiB0cnVlLFxyXG4gICAgICAgICAgICBncm91cFNlcGFyYXRvcjogXCIgXCIsXHJcbiAgICAgICAgICAgIGdyZWVkeTogZmFsc2UsXHJcbiAgICAgICAgICAgIGRpZ2l0czogMCxcclxuICAgICAgICAgICAgYWxpYXM6ICdjdXJyZW5jeScsXHJcbiAgICAgICAgfSkubWFzaygnLnNlcGFyYXRvcicpO1xyXG4gICAgfSk7XHJcblxyXG59OyIsImV4cG9ydCBjb25zdCBydW5JbnB1dG1hc2sgPSAoKSA9PiB7XG4gICAgJChmdW5jdGlvbigpIHtcbiAgICAgICAgSW5wdXRtYXNrKCcnLCB7XG4gICAgICAgICAgICBudW1lcmljSW5wdXQ6IHRydWUsXG4gICAgICAgICAgICByaWdodEFsaWduOiBmYWxzZSxcbiAgICAgICAgICAgIGF1dG9Vbm1hc2s6IHRydWUsXG4gICAgICAgICAgICBwbGFjZWhvbGRlcjogJycsXG4gICAgICAgICAgICByZW1vdmVNYXNrT25TdWJtaXQ6IHRydWUsXG4gICAgICAgICAgICBncm91cFNlcGFyYXRvcjogXCIgXCIsXG4gICAgICAgICAgICBncmVlZHk6IGZhbHNlLFxuICAgICAgICAgICAgZGlnaXRzOiAwLFxuICAgICAgICAgICAgYWxpYXM6ICdjdXJyZW5jeScsXG4gICAgICAgIH0pLm1hc2soJy5zZXBhcmF0b3InKTtcbiAgICB9KTtcblxufTtcbiIsIi8qKlxyXG4gLyoqXHJcbiAqICBiaWxsZXRhZ2UgYmlsbGV0XHJcbiAqICovXHJcblxyXG5jb25zdCBjYWxjdWxlQmlsbGV0ID0gKCkgPT4ge1xyXG4gICAgdmFyIE1vbnRhbnRCaWxsZXRzID0gMDtcclxuXHJcbiAgICB2YXIgYmlsbGV0cyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ2JpbGxldCcpO1xyXG4gICAgJC5lYWNoKGJpbGxldHMsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICB2YXIgbXVsdGlwbGljYXRldXIgPSAkKHRoaXMpLmF0dHIoJ2RhdGEtaWQnKTtcclxuICAgICAgICBNb250YW50ID0gbXVsdGlwbGljYXRldXIgKiBOdW1iZXIoJCh0aGlzKS52YWwoKSk7XHJcbiAgICAgICAgTW9udGFudEJpbGxldHMgPSBOdW1iZXIoTW9udGFudEJpbGxldHMpICsgTW9udGFudDtcclxuICAgIH0pO1xyXG4gICAgJCgnI3Jlc3VhbHRUb3RhbDEnKS5lbXB0eSgpO1xyXG4gICAgJCgnI3Jlc3VhbHRUb3RhbDEnKS52YWwobmV3IEludGwuTnVtYmVyRm9ybWF0KCkuZm9ybWF0KE1vbnRhbnRCaWxsZXRzKSk7XHJcbn07XHJcbiQoJy5iaWxsZXQnKS5vbignaW5wdXQnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICBjYWxjdWxlQmlsbGV0KCk7XHJcbn0pO1xyXG5cclxuLyoqXHJcbiAqIGJpbGxldGFnZSBtb25uYWllXHJcbiAqL1xyXG5cclxuXHJcbmNvbnN0IGNhbGN1bGVNb25uYWllID0gKCkgPT4ge1xyXG4gICAgdmFyIE1vbnRhbnRNb25uYWllID0gMDtcclxuICAgIHZhciBNb25uYWllID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgnbW9ubmFpZScpO1xyXG4gICAgJC5lYWNoKE1vbm5haWUsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICB2YXIgbXVsdGlwbGljYXRldXIgPSAkKHRoaXMpLmF0dHIoJ2RhdGEtaWQnKTtcclxuICAgICAgICBNb250YW50MiA9IG11bHRpcGxpY2F0ZXVyICogTnVtYmVyKCQodGhpcykudmFsKCkpO1xyXG4gICAgICAgIE1vbnRhbnRNb25uYWllID0gTnVtYmVyKE1vbnRhbnRNb25uYWllKSArIE1vbnRhbnQyO1xyXG4gICAgfSk7XHJcbiAgICAkKCcjcmVzdWFsdFRvdGFsMicpLmVtcHR5KCk7XHJcbiAgICAkKCcjcmVzdWFsdFRvdGFsMicpLnZhbChuZXcgSW50bC5OdW1iZXJGb3JtYXQoKS5mb3JtYXQoTW9udGFudE1vbm5haWUpKTtcclxufTtcclxuJCgnLm1vbm5haWUnKS5vbignaW5wdXQnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICBjYWxjdWxlTW9ubmFpZSgpXHJcbn0pO1xyXG4vKipcclxuICogKi9cclxuY29uc3QgY2FsY3VsZU1vbnRhbnQgPSAoZSkgPT4ge1xyXG4gICAgdmFyIE1vbnRhbnRUb3RhbCA9IDA7XHJcbiAgICB2YXIgTW9ubmFpZSA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ21vbnRhbnQnKTtcclxuICAgIHZhciBpZCA9ICQoZSkuYXR0cignaWQnKTtcclxuICAgIHZhciB2YWx1ZXMgPSAkKGUpLnZhbCgpO1xyXG4gICAgdmFyIG11bHRpcGxpY2F0ZXVyID0gJChlKS5hdHRyKCdkYXRhLWlkJyk7XHJcbiAgICB2YXIgdG90YWwgPSB2YWx1ZXMgKiBtdWx0aXBsaWNhdGV1cjtcclxuICAgIHZhciBvcmJpcyA9ICQoJyNiaWxsZXRhZ2VfYmFsYW5jZScpLnZhbCgpO1xyXG4gICAgdmFyIGVjYXJ0ID0gJCgnI2VjYXJ0JykudmFsKCk7XHJcbiAgICAkKCcjcicgKyBpZCkudmFsKG5ldyBJbnRsLk51bWJlckZvcm1hdCgpLmZvcm1hdCh0b3RhbCkpO1xyXG4gICAgJC5lYWNoKE1vbm5haWUsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICB2YXIgbXVsdGlwbGljYXRldXIgPSAkKHRoaXMpLmF0dHIoJ2RhdGEtaWQnKTtcclxuICAgICAgICBNb250YW50MyA9IG11bHRpcGxpY2F0ZXVyICogTnVtYmVyKCQodGhpcykudmFsKCkpO1xyXG4gICAgICAgIE1vbnRhbnRUb3RhbCA9IE51bWJlcihNb250YW50VG90YWwpICsgTW9udGFudDM7XHJcbiAgICAgICAgZWNhcnQgPSBOdW1iZXIoTW9udGFudFRvdGFsIC0gb3JiaXMpO1xyXG4gICAgfSk7XHJcbiAgICAkKCcjYmlsbGV0YWdlX2Ftb3VudCcpLnZhbCgpO1xyXG4gICAgJCgnI2JpbGxldGFnZV9hbW91bnQnKS52YWwobmV3IEludGwuTnVtYmVyRm9ybWF0KCkuZm9ybWF0KE1vbnRhbnRUb3RhbCkpO1xyXG4gICAgJCgnI2JpbGxldGFnZV9lY2FydCcpLnZhbChlY2FydCk7XHJcbn1cclxuJCgnLm1vbnRhbnQnKS5vbignaW5wdXQnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICBjYWxjdWxlTW9udGFudCgkKHRoaXMpKVxyXG59KTtcclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcclxuICAgIGNhbGN1bGVCaWxsZXQoKTtcclxuICAgIGNhbGN1bGVNb25uYWllKCk7XHJcbiAgICAkKCcubW9udGFudCcpLmVhY2goZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGNhbGN1bGVNb250YW50KCQodGhpcykpXHJcbiAgICB9KTtcclxufSlcclxuIiwiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xyXG4gICAgY2FsY3VsYXRlUHJpY2UoKVxyXG59KVxyXG5cclxuXHJcbmNvbnN0IGNhbGN1bGF0ZVByaWNlID0gKCkgPT4ge1xyXG4gICAgJCgnYm9keScpLm9uKCdpbnB1dCcsICcucHJpY2UnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgY29uc3QgcGFyZW50SWQgPSAkKHRoaXMpLnBhcmVudCgpLnBhcmVudCgpLmF0dHIoJ2RhdGEtaWQnKTtcclxuICAgICAgICBjb25zdCBxdGUgPSArJChgIyR7cGFyZW50SWR9X3F1YW50aXRlYCkudmFsKCk7XHJcbiAgICAgICAgY29uc3QgcHJpY2UgPSArJCh0aGlzKS52YWwoKTtcclxuICAgICAgICBjb25zdCBhbW91bnQgPSBxdGUgKiBwcmljZTtcclxuICAgICAgICAkKGAjJHtwYXJlbnRJZH1fbW9udGFudGApLnZhbChhbW91bnQpXHJcbiAgICAgICAgY2FsY3VsYXRlVG90YWxBbW91bnQoKVxyXG4gICAgfSk7XHJcbn1cclxuY2FsY3VsYXRlUHJpY2UoKVxyXG5cclxuY29uc3QgY2FsY3VsYXRlVG90YWxBbW91bnQgPSAoKSA9PiB7XHJcbiAgICBjb25zdCBzdW1QcmljZSA9IFtdO1xyXG4gICAgY29uc3Qgc3VtQW1vdW50ID0gW107XHJcblxyXG4gICAgJCgnLnByaWNlJykuZWFjaChmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgc3VtUHJpY2UucHVzaCgrJCh0aGlzKS52YWwoKSlcclxuICAgIH0pXHJcblxyXG4gICAgJCgnLm1vbnRhbnQnKS5lYWNoKGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBzdW1BbW91bnQucHVzaCgrJCh0aGlzKS52YWwoKSlcclxuICAgIH0pXHJcblxyXG4gICAgbGV0IHByaWNlO1xyXG4gICAgbGV0IGFtb3VudDtcclxuXHJcbiAgICBpZiAoc3VtUHJpY2UubGVuZ3RoID4gMCkge1xyXG4gICAgICAgIHByaWNlID0gc3VtUHJpY2UucmVkdWNlKChwcmV2aW91c1ZhbHVlLCBjdXJyZW50VmFsdWUpID0+IHByZXZpb3VzVmFsdWUgKyBjdXJyZW50VmFsdWUpO1xyXG4gICAgICAgIGFtb3VudCA9IHN1bUFtb3VudC5yZWR1Y2UoKHByZXZpb3VzVmFsdWUsIGN1cnJlbnRWYWx1ZSkgPT4gcHJldmlvdXNWYWx1ZSArIGN1cnJlbnRWYWx1ZSk7XHJcbiAgICB9IGVsc2Uge1xyXG4gICAgICAgIHByaWNlID0gYW1vdW50ID0gMDtcclxuICAgIH1cclxuXHJcbiAgICAkKCcjdG90YWxfcHJpY2UnKS5odG1sKG5ldyBJbnRsLk51bWJlckZvcm1hdCgnZnItRlInKS5mb3JtYXQocHJpY2UpKTtcclxuICAgICQoJyN0b3RhbF9tb250YW50JykuaHRtbChuZXcgSW50bC5OdW1iZXJGb3JtYXQoJ2ZyLUZSJykuZm9ybWF0KGFtb3VudCkpO1xyXG59XHJcblxyXG5jYWxjdWxhdGVUb3RhbEFtb3VudCgpIiwiaW1wb3J0ICcuL2ZkYidcclxuaW1wb3J0ICcuL2JpbGxldGFnZSdcclxuXHJcblxyXG4iLCIkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XHJcbiAgICBjb25zb2xlLmxvZygnU2NyaXB0IExvYWRlZCcpOyAvLyBBc3N1cmV6LXZvdXMgcXVlIGxlIHNjcmlwdCBlc3QgZXjDqWN1dMOpXHJcblxyXG4gICAgJCgnI3VzZXJfZnVsbE5hbWUnKS5vbignaW5wdXQnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgY29uc3QgZnVsbE5hbWUgPSAkKCcjdXNlcl9mdWxsTmFtZScpLnZhbCgpLnRvTG93ZXJDYXNlKCkudHJpbSgpO1xyXG5cclxuICAgICAgICBsZXQgcHJlZml4ID0gJyc7XHJcbiAgICAgICAgaWYgKGZ1bGxOYW1lKSB7XHJcbiAgICAgICAgICAgIC8vIFPDqXBhcmVyIGxlIHByw6lub20gZXQgbGUgbm9tIGVuIHN1cHBvc2FudCBxdSdpbCB5IGEgdW4gZXNwYWNlIGVudHJlIGV1eFxyXG4gICAgICAgICAgICBjb25zdCBuYW1lUGFydHMgPSBmdWxsTmFtZS5zcGxpdCgnICcpO1xyXG5cclxuICAgICAgICAgICAgaWYgKG5hbWVQYXJ0cy5sZW5ndGggPiAxKSB7XHJcbiAgICAgICAgICAgICAgICBjb25zdCBmaXJzdE5hbWUgPSBuYW1lUGFydHNbMF07XHJcbiAgICAgICAgICAgICAgICBjb25zdCBsYXN0TmFtZSA9IG5hbWVQYXJ0c1tuYW1lUGFydHMubGVuZ3RoIC0gMV07XHJcblxyXG4gICAgICAgICAgICAgICAgLy8gUHJlbmRyZSBsZXMgZGV1eCBwcmVtacOocmVzIGxldHRyZXMgZHUgcHLDqW5vbSBldCBsZXMgbWV0dHJlIGVuIG1hanVzY3VsZXNcclxuICAgICAgICAgICAgICAgIGNvbnN0IGZpcnN0TmFtZVByZWZpeCA9IGZpcnN0TmFtZS5zdWJzdHJpbmcoMCwgMikudG9VcHBlckNhc2UoKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvLyBVdGlsaXNlciBsZSBub20gZGUgZmFtaWxsZSBlbnRpZXJcclxuICAgICAgICAgICAgICAgIHByZWZpeCA9IGxhc3ROYW1lICsgZmlyc3ROYW1lUHJlZml4O1xyXG4gICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgLy8gU2kgbCd1dGlsaXNhdGV1ciBuZSBtZXQgcXUndW4gc2V1bCBtb3QsIG9uIHV0aWxpc2Ugc2V1bGVtZW50IGNlIG1vdCBwb3VyIGwnaWRlbnRpZmlhbnRcclxuICAgICAgICAgICAgICAgIHByZWZpeCA9IG5hbWVQYXJ0c1swXTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgLy8gR8OpbsOpcmVyIHVuZSBjaGHDrm5lIGFsw6lhdG9pcmUgZGUgNCBjaGlmZnJlc1xyXG4gICAgICAgIGxldCBsZW5ndGggPSA0O1xyXG4gICAgICAgIGxldCBjaGFyc2V0ID0gXCIwMTIzNDU2Nzg5XCI7XHJcbiAgICAgICAgbGV0IHJhbmRvbVN0cmluZyA9IFwiXCI7XHJcbiAgICAgICAgZm9yIChsZXQgaSA9IDA7IGkgPCBsZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICByYW5kb21TdHJpbmcgKz0gY2hhcnNldC5jaGFyQXQoTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpICogY2hhcnNldC5sZW5ndGgpKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIC8vIENvbnN0cnVpcmUgbGUgbm9tIGQndXRpbGlzYXRldXIgZmluYWxcclxuICAgICAgICBjb25zdCB1c2VybmFtZSA9IGAke3ByZWZpeH1fJHtyYW5kb21TdHJpbmd9YDtcclxuXHJcbiAgICAgICAgLy8gQWZmaWNoZXIgbGUgcsOpc3VsdGF0IGRhbnMgbGUgY2hhbXAgUHNldWRvIChpZGVudGlmaWFudClcclxuICAgICAgICAkKCcjdXNlcl9wc2V1ZG8nKS52YWwodXNlcm5hbWUpO1xyXG4gICAgfSk7XHJcbn0pO1xyXG4iLCIkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgJCgnLnNlbGVjdDInKS5zZWxlY3QyKHt3aWR0aDogJzEwMCUnfSlcbn0pIiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307IiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307IiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307IiwidmFyIG1hcCA9IHtcblx0XCIuL2FmXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hZi5qc1wiLFxuXHRcIi4vYWYuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FmLmpzXCIsXG5cdFwiLi9hclwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXIuanNcIixcblx0XCIuL2FyLWR6XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hci1kei5qc1wiLFxuXHRcIi4vYXItZHouanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FyLWR6LmpzXCIsXG5cdFwiLi9hci1rd1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXIta3cuanNcIixcblx0XCIuL2FyLWt3LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hci1rdy5qc1wiLFxuXHRcIi4vYXItbHlcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FyLWx5LmpzXCIsXG5cdFwiLi9hci1seS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXItbHkuanNcIixcblx0XCIuL2FyLW1hXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hci1tYS5qc1wiLFxuXHRcIi4vYXItbWEuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FyLW1hLmpzXCIsXG5cdFwiLi9hci1wc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXItcHMuanNcIixcblx0XCIuL2FyLXBzLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hci1wcy5qc1wiLFxuXHRcIi4vYXItc2FcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FyLXNhLmpzXCIsXG5cdFwiLi9hci1zYS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXItc2EuanNcIixcblx0XCIuL2FyLXRuXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hci10bi5qc1wiLFxuXHRcIi4vYXItdG4uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2FyLXRuLmpzXCIsXG5cdFwiLi9hci5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYXIuanNcIixcblx0XCIuL2F6XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9hei5qc1wiLFxuXHRcIi4vYXouanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2F6LmpzXCIsXG5cdFwiLi9iZVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYmUuanNcIixcblx0XCIuL2JlLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9iZS5qc1wiLFxuXHRcIi4vYmdcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2JnLmpzXCIsXG5cdFwiLi9iZy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYmcuanNcIixcblx0XCIuL2JtXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ibS5qc1wiLFxuXHRcIi4vYm0uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2JtLmpzXCIsXG5cdFwiLi9iblwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYm4uanNcIixcblx0XCIuL2JuLWJkXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ibi1iZC5qc1wiLFxuXHRcIi4vYm4tYmQuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2JuLWJkLmpzXCIsXG5cdFwiLi9ibi5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYm4uanNcIixcblx0XCIuL2JvXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9iby5qc1wiLFxuXHRcIi4vYm8uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2JvLmpzXCIsXG5cdFwiLi9iclwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYnIuanNcIixcblx0XCIuL2JyLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ici5qc1wiLFxuXHRcIi4vYnNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2JzLmpzXCIsXG5cdFwiLi9icy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvYnMuanNcIixcblx0XCIuL2NhXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9jYS5qc1wiLFxuXHRcIi4vY2EuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2NhLmpzXCIsXG5cdFwiLi9jc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvY3MuanNcIixcblx0XCIuL2NzLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9jcy5qc1wiLFxuXHRcIi4vY3ZcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2N2LmpzXCIsXG5cdFwiLi9jdi5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvY3YuanNcIixcblx0XCIuL2N5XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9jeS5qc1wiLFxuXHRcIi4vY3kuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2N5LmpzXCIsXG5cdFwiLi9kYVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZGEuanNcIixcblx0XCIuL2RhLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9kYS5qc1wiLFxuXHRcIi4vZGVcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2RlLmpzXCIsXG5cdFwiLi9kZS1hdFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZGUtYXQuanNcIixcblx0XCIuL2RlLWF0LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9kZS1hdC5qc1wiLFxuXHRcIi4vZGUtY2hcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2RlLWNoLmpzXCIsXG5cdFwiLi9kZS1jaC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZGUtY2guanNcIixcblx0XCIuL2RlLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9kZS5qc1wiLFxuXHRcIi4vZHZcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2R2LmpzXCIsXG5cdFwiLi9kdi5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZHYuanNcIixcblx0XCIuL2VsXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbC5qc1wiLFxuXHRcIi4vZWwuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VsLmpzXCIsXG5cdFwiLi9lbi1hdVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW4tYXUuanNcIixcblx0XCIuL2VuLWF1LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbi1hdS5qc1wiLFxuXHRcIi4vZW4tY2FcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VuLWNhLmpzXCIsXG5cdFwiLi9lbi1jYS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW4tY2EuanNcIixcblx0XCIuL2VuLWdiXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbi1nYi5qc1wiLFxuXHRcIi4vZW4tZ2IuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VuLWdiLmpzXCIsXG5cdFwiLi9lbi1pZVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW4taWUuanNcIixcblx0XCIuL2VuLWllLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbi1pZS5qc1wiLFxuXHRcIi4vZW4taWxcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VuLWlsLmpzXCIsXG5cdFwiLi9lbi1pbC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW4taWwuanNcIixcblx0XCIuL2VuLWluXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbi1pbi5qc1wiLFxuXHRcIi4vZW4taW4uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VuLWluLmpzXCIsXG5cdFwiLi9lbi1uelwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW4tbnouanNcIixcblx0XCIuL2VuLW56LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lbi1uei5qc1wiLFxuXHRcIi4vZW4tc2dcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VuLXNnLmpzXCIsXG5cdFwiLi9lbi1zZy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZW4tc2cuanNcIixcblx0XCIuL2VvXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lby5qc1wiLFxuXHRcIi4vZW8uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VvLmpzXCIsXG5cdFwiLi9lc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZXMuanNcIixcblx0XCIuL2VzLWRvXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lcy1kby5qc1wiLFxuXHRcIi4vZXMtZG8uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VzLWRvLmpzXCIsXG5cdFwiLi9lcy1teFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZXMtbXguanNcIixcblx0XCIuL2VzLW14LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lcy1teC5qc1wiLFxuXHRcIi4vZXMtdXNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2VzLXVzLmpzXCIsXG5cdFwiLi9lcy11cy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZXMtdXMuanNcIixcblx0XCIuL2VzLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9lcy5qc1wiLFxuXHRcIi4vZXRcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2V0LmpzXCIsXG5cdFwiLi9ldC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZXQuanNcIixcblx0XCIuL2V1XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ldS5qc1wiLFxuXHRcIi4vZXUuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2V1LmpzXCIsXG5cdFwiLi9mYVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZmEuanNcIixcblx0XCIuL2ZhLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9mYS5qc1wiLFxuXHRcIi4vZmlcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ZpLmpzXCIsXG5cdFwiLi9maS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZmkuanNcIixcblx0XCIuL2ZpbFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZmlsLmpzXCIsXG5cdFwiLi9maWwuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ZpbC5qc1wiLFxuXHRcIi4vZm9cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ZvLmpzXCIsXG5cdFwiLi9mby5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZm8uanNcIixcblx0XCIuL2ZyXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9mci5qc1wiLFxuXHRcIi4vZnItY2FcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ZyLWNhLmpzXCIsXG5cdFwiLi9mci1jYS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZnItY2EuanNcIixcblx0XCIuL2ZyLWNoXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9mci1jaC5qc1wiLFxuXHRcIi4vZnItY2guanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ZyLWNoLmpzXCIsXG5cdFwiLi9mci5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZnIuanNcIixcblx0XCIuL2Z5XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9meS5qc1wiLFxuXHRcIi4vZnkuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2Z5LmpzXCIsXG5cdFwiLi9nYVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZ2EuanNcIixcblx0XCIuL2dhLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9nYS5qc1wiLFxuXHRcIi4vZ2RcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2dkLmpzXCIsXG5cdFwiLi9nZC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZ2QuanNcIixcblx0XCIuL2dsXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9nbC5qc1wiLFxuXHRcIi4vZ2wuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2dsLmpzXCIsXG5cdFwiLi9nb20tZGV2YVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZ29tLWRldmEuanNcIixcblx0XCIuL2dvbS1kZXZhLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9nb20tZGV2YS5qc1wiLFxuXHRcIi4vZ29tLWxhdG5cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2dvbS1sYXRuLmpzXCIsXG5cdFwiLi9nb20tbGF0bi5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvZ29tLWxhdG4uanNcIixcblx0XCIuL2d1XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ndS5qc1wiLFxuXHRcIi4vZ3UuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2d1LmpzXCIsXG5cdFwiLi9oZVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaGUuanNcIixcblx0XCIuL2hlLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9oZS5qc1wiLFxuXHRcIi4vaGlcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2hpLmpzXCIsXG5cdFwiLi9oaS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaGkuanNcIixcblx0XCIuL2hyXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9oci5qc1wiLFxuXHRcIi4vaHIuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2hyLmpzXCIsXG5cdFwiLi9odVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaHUuanNcIixcblx0XCIuL2h1LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9odS5qc1wiLFxuXHRcIi4vaHktYW1cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2h5LWFtLmpzXCIsXG5cdFwiLi9oeS1hbS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaHktYW0uanNcIixcblx0XCIuL2lkXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9pZC5qc1wiLFxuXHRcIi4vaWQuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2lkLmpzXCIsXG5cdFwiLi9pc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaXMuanNcIixcblx0XCIuL2lzLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9pcy5qc1wiLFxuXHRcIi4vaXRcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2l0LmpzXCIsXG5cdFwiLi9pdC1jaFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvaXQtY2guanNcIixcblx0XCIuL2l0LWNoLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9pdC1jaC5qc1wiLFxuXHRcIi4vaXQuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2l0LmpzXCIsXG5cdFwiLi9qYVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvamEuanNcIixcblx0XCIuL2phLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9qYS5qc1wiLFxuXHRcIi4vanZcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2p2LmpzXCIsXG5cdFwiLi9qdi5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvanYuanNcIixcblx0XCIuL2thXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9rYS5qc1wiLFxuXHRcIi4va2EuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2thLmpzXCIsXG5cdFwiLi9ra1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUva2suanNcIixcblx0XCIuL2trLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ray5qc1wiLFxuXHRcIi4va21cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2ttLmpzXCIsXG5cdFwiLi9rbS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUva20uanNcIixcblx0XCIuL2tuXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9rbi5qc1wiLFxuXHRcIi4va24uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2tuLmpzXCIsXG5cdFwiLi9rb1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUva28uanNcIixcblx0XCIuL2tvLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9rby5qc1wiLFxuXHRcIi4va3VcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2t1LmpzXCIsXG5cdFwiLi9rdS1rbXJcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2t1LWttci5qc1wiLFxuXHRcIi4va3Uta21yLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9rdS1rbXIuanNcIixcblx0XCIuL2t1LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9rdS5qc1wiLFxuXHRcIi4va3lcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2t5LmpzXCIsXG5cdFwiLi9reS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUva3kuanNcIixcblx0XCIuL2xiXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9sYi5qc1wiLFxuXHRcIi4vbGIuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2xiLmpzXCIsXG5cdFwiLi9sb1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbG8uanNcIixcblx0XCIuL2xvLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9sby5qc1wiLFxuXHRcIi4vbHRcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2x0LmpzXCIsXG5cdFwiLi9sdC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbHQuanNcIixcblx0XCIuL2x2XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9sdi5qc1wiLFxuXHRcIi4vbHYuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL2x2LmpzXCIsXG5cdFwiLi9tZVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbWUuanNcIixcblx0XCIuL21lLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9tZS5qc1wiLFxuXHRcIi4vbWlcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL21pLmpzXCIsXG5cdFwiLi9taS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbWkuanNcIixcblx0XCIuL21rXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9tay5qc1wiLFxuXHRcIi4vbWsuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL21rLmpzXCIsXG5cdFwiLi9tbFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbWwuanNcIixcblx0XCIuL21sLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9tbC5qc1wiLFxuXHRcIi4vbW5cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL21uLmpzXCIsXG5cdFwiLi9tbi5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbW4uanNcIixcblx0XCIuL21yXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9tci5qc1wiLFxuXHRcIi4vbXIuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL21yLmpzXCIsXG5cdFwiLi9tc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbXMuanNcIixcblx0XCIuL21zLW15XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9tcy1teS5qc1wiLFxuXHRcIi4vbXMtbXkuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL21zLW15LmpzXCIsXG5cdFwiLi9tcy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbXMuanNcIixcblx0XCIuL210XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9tdC5qc1wiLFxuXHRcIi4vbXQuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL210LmpzXCIsXG5cdFwiLi9teVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbXkuanNcIixcblx0XCIuL215LmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9teS5qc1wiLFxuXHRcIi4vbmJcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL25iLmpzXCIsXG5cdFwiLi9uYi5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbmIuanNcIixcblx0XCIuL25lXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9uZS5qc1wiLFxuXHRcIi4vbmUuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL25lLmpzXCIsXG5cdFwiLi9ubFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbmwuanNcIixcblx0XCIuL25sLWJlXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ubC1iZS5qc1wiLFxuXHRcIi4vbmwtYmUuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL25sLWJlLmpzXCIsXG5cdFwiLi9ubC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvbmwuanNcIixcblx0XCIuL25uXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9ubi5qc1wiLFxuXHRcIi4vbm4uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL25uLmpzXCIsXG5cdFwiLi9vYy1sbmNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL29jLWxuYy5qc1wiLFxuXHRcIi4vb2MtbG5jLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9vYy1sbmMuanNcIixcblx0XCIuL3BhLWluXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9wYS1pbi5qc1wiLFxuXHRcIi4vcGEtaW4uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3BhLWluLmpzXCIsXG5cdFwiLi9wbFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvcGwuanNcIixcblx0XCIuL3BsLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9wbC5qc1wiLFxuXHRcIi4vcHRcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3B0LmpzXCIsXG5cdFwiLi9wdC1iclwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvcHQtYnIuanNcIixcblx0XCIuL3B0LWJyLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9wdC1ici5qc1wiLFxuXHRcIi4vcHQuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3B0LmpzXCIsXG5cdFwiLi9yb1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvcm8uanNcIixcblx0XCIuL3JvLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9yby5qc1wiLFxuXHRcIi4vcnVcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3J1LmpzXCIsXG5cdFwiLi9ydS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvcnUuanNcIixcblx0XCIuL3NkXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zZC5qc1wiLFxuXHRcIi4vc2QuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NkLmpzXCIsXG5cdFwiLi9zZVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc2UuanNcIixcblx0XCIuL3NlLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zZS5qc1wiLFxuXHRcIi4vc2lcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NpLmpzXCIsXG5cdFwiLi9zaS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc2kuanNcIixcblx0XCIuL3NrXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zay5qc1wiLFxuXHRcIi4vc2suanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NrLmpzXCIsXG5cdFwiLi9zbFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc2wuanNcIixcblx0XCIuL3NsLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zbC5qc1wiLFxuXHRcIi4vc3FcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NxLmpzXCIsXG5cdFwiLi9zcS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc3EuanNcIixcblx0XCIuL3NyXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zci5qc1wiLFxuXHRcIi4vc3ItY3lybFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc3ItY3lybC5qc1wiLFxuXHRcIi4vc3ItY3lybC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc3ItY3lybC5qc1wiLFxuXHRcIi4vc3IuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3NyLmpzXCIsXG5cdFwiLi9zc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc3MuanNcIixcblx0XCIuL3NzLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zcy5qc1wiLFxuXHRcIi4vc3ZcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3N2LmpzXCIsXG5cdFwiLi9zdi5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvc3YuanNcIixcblx0XCIuL3N3XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS9zdy5qc1wiLFxuXHRcIi4vc3cuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3N3LmpzXCIsXG5cdFwiLi90YVwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdGEuanNcIixcblx0XCIuL3RhLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90YS5qc1wiLFxuXHRcIi4vdGVcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RlLmpzXCIsXG5cdFwiLi90ZS5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdGUuanNcIixcblx0XCIuL3RldFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdGV0LmpzXCIsXG5cdFwiLi90ZXQuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RldC5qc1wiLFxuXHRcIi4vdGdcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RnLmpzXCIsXG5cdFwiLi90Zy5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdGcuanNcIixcblx0XCIuL3RoXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90aC5qc1wiLFxuXHRcIi4vdGguanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RoLmpzXCIsXG5cdFwiLi90a1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdGsuanNcIixcblx0XCIuL3RrLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90ay5qc1wiLFxuXHRcIi4vdGwtcGhcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RsLXBoLmpzXCIsXG5cdFwiLi90bC1waC5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdGwtcGguanNcIixcblx0XCIuL3RsaFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdGxoLmpzXCIsXG5cdFwiLi90bGguanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RsaC5qc1wiLFxuXHRcIi4vdHJcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3RyLmpzXCIsXG5cdFwiLi90ci5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdHIuanNcIixcblx0XCIuL3R6bFwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdHpsLmpzXCIsXG5cdFwiLi90emwuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3R6bC5qc1wiLFxuXHRcIi4vdHptXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90em0uanNcIixcblx0XCIuL3R6bS1sYXRuXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS90em0tbGF0bi5qc1wiLFxuXHRcIi4vdHptLWxhdG4uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3R6bS1sYXRuLmpzXCIsXG5cdFwiLi90em0uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3R6bS5qc1wiLFxuXHRcIi4vdWctY25cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3VnLWNuLmpzXCIsXG5cdFwiLi91Zy1jbi5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdWctY24uanNcIixcblx0XCIuL3VrXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS91ay5qc1wiLFxuXHRcIi4vdWsuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3VrLmpzXCIsXG5cdFwiLi91clwiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdXIuanNcIixcblx0XCIuL3VyLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS91ci5qc1wiLFxuXHRcIi4vdXpcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3V6LmpzXCIsXG5cdFwiLi91ei1sYXRuXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS91ei1sYXRuLmpzXCIsXG5cdFwiLi91ei1sYXRuLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS91ei1sYXRuLmpzXCIsXG5cdFwiLi91ei5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvdXouanNcIixcblx0XCIuL3ZpXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS92aS5qc1wiLFxuXHRcIi4vdmkuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3ZpLmpzXCIsXG5cdFwiLi94LXBzZXVkb1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUveC1wc2V1ZG8uanNcIixcblx0XCIuL3gtcHNldWRvLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS94LXBzZXVkby5qc1wiLFxuXHRcIi4veW9cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3lvLmpzXCIsXG5cdFwiLi95by5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUveW8uanNcIixcblx0XCIuL3poLWNuXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS96aC1jbi5qc1wiLFxuXHRcIi4vemgtY24uanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3poLWNuLmpzXCIsXG5cdFwiLi96aC1oa1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvemgtaGsuanNcIixcblx0XCIuL3poLWhrLmpzXCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS96aC1oay5qc1wiLFxuXHRcIi4vemgtbW9cIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3poLW1vLmpzXCIsXG5cdFwiLi96aC1tby5qc1wiOiBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUvemgtbW8uanNcIixcblx0XCIuL3poLXR3XCI6IFwiLi9ub2RlX21vZHVsZXMvbW9tZW50L2xvY2FsZS96aC10dy5qc1wiLFxuXHRcIi4vemgtdHcuanNcIjogXCIuL25vZGVfbW9kdWxlcy9tb21lbnQvbG9jYWxlL3poLXR3LmpzXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vbm9kZV9tb2R1bGVzL21vbWVudC9sb2NhbGUgc3luYyByZWN1cnNpdmUgXlxcXFwuXFxcXC8uKiRcIjsiXSwibmFtZXMiOlsicmVxdWlyZSIsInJ1bklucHV0bWFzayIsInRvYXN0ciIsImdsb2JhbCIsIndpbmRvdyIsIlB1c2hlciIsIm1vbWVudCIsImFkZEZvcm1Ub0NvbGxlY3Rpb24iLCJlIiwiZGF0YXNldCIsImN1cnJlbnRUYXJnZXQiLCJ0YXJnZXQiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJjb2xsZWN0aW9uSG9sZGVyIiwibGlzdFNlbGVjdG9yIiwid3JhcHBlciIsImNyZWF0ZUVsZW1lbnQiLCJyZW1vdmVUYXJnZXQiLCJzZXRBdHRyaWJ1dGUiLCJjb25jYXQiLCJpbmRleCIsImlkIiwic3Vic3RyaW5nIiwiaW5uZXJIVE1MIiwicHJvdG90eXBlIiwicmVwbGFjZSIsImFwcGVuZCIsIiQiLCJzZWxlY3QyIiwid2lkdGgiLCJvbiIsIl90eXBlb2YiLCJvYmoiLCJTeW1ib2wiLCJpdGVyYXRvciIsImNvbnN0cnVjdG9yIiwiZmFjdG9yeSIsImRlZmluZSIsImFtZCIsImV4cG9ydHMiLCJtb2R1bGUiLCJyb290IiwiZm4iLCJkYXRhVGFibGUiLCJqUXVlcnkiLCJ1bmRlZmluZWQiLCJEYXRhVGFibGUiLCJleHRlbmQiLCJkZWZhdWx0cyIsImRvbSIsInJlbmRlcmVyIiwiZXh0IiwiY2xhc3NlcyIsInNXcmFwcGVyIiwic0ZpbHRlcklucHV0Iiwic0xlbmd0aFNlbGVjdCIsInNQcm9jZXNzaW5nIiwic1BhZ2VCdXR0b24iLCJwYWdlQnV0dG9uIiwiYm9vdHN0cmFwIiwic2V0dGluZ3MiLCJob3N0IiwiaWR4IiwiYnV0dG9ucyIsInBhZ2UiLCJwYWdlcyIsImFwaSIsIkFwaSIsIm9DbGFzc2VzIiwibGFuZyIsIm9MYW5ndWFnZSIsIm9QYWdpbmF0ZSIsImFyaWEiLCJvQXJpYSIsInBhZ2luYXRlIiwiYnRuRGlzcGxheSIsImJ0bkNsYXNzIiwiY291bnRlciIsImF0dGFjaCIsImNvbnRhaW5lciIsImkiLCJpZW4iLCJub2RlIiwiYnV0dG9uIiwiY2xpY2tIYW5kbGVyIiwicHJldmVudERlZmF1bHQiLCJoYXNDbGFzcyIsImRhdGEiLCJhY3Rpb24iLCJkcmF3IiwibGVuZ3RoIiwiaXNBcnJheSIsInNGaXJzdCIsInNQcmV2aW91cyIsInNOZXh0Iiwic0xhc3QiLCJzVGFibGVJZCIsImlUYWJJbmRleCIsImh0bWwiLCJhcHBlbmRUbyIsIm9BcGkiLCJfZm5CaW5kQWN0aW9uIiwiYWN0aXZlRWwiLCJmaW5kIiwiYWN0aXZlRWxlbWVudCIsImVtcHR5IiwiY2hpbGRyZW4iLCJmb2N1cyIsImxhbmd1YWdlIiwicHJldmlvdXMiLCJuZXh0IiwidXJsIiwiYXV0b1dpZHRoIiwiZGVmZXJSZW5kZXIiLCJvcmRlciIsInBhZ2luZyIsInNlYXJjaGluZyIsInJldHJpZXZlIiwiJGZvcm1Kb3VybmFsQ2Fpc3NlIiwic3VibWl0IiwiJGRhdGEiLCJzZXJpYWxpemUiLCJ0YWIiLCJzcGxpdCIsInRhYjJfZGViIiwidGFiMl9maW4iLCJkZWJ1dCIsImZpbiIsImJEZXN0cm95IiwiYWpheCIsImRhdGFTcmMiLCJjb2x1bW5zIiwic0NsYXNzIiwiY3VzdG9taXplIiwid2luIiwiYm9keSIsImNzcyIsImFkZENsYXNzIiwibGF5b3V0IiwidG9wU3RhcnQiLCJjb2x1bW5EZWZzIiwidGFyZ2V0cyIsInJlbmRlciIsIm51bWJlciIsImRlbEZvcm1Ub0NvbGxlY3Rpb24iLCJyZW1vdmUiLCJyZWFkeSIsImNvbnNvbGUiLCJsb2ciLCJ0eXBlRXhwZW5zZSQiLCJjaGFuZ2UiLCJmb3JtJCIsImNsb3Nlc3QiLCJkYXRhJCIsImF0dHIiLCJ2YWwiLCJ0eXBlIiwibWV0aG9kIiwiY29tcGxldGUiLCJyZXBsYWNlV2l0aCIsInJlc3BvbnNlVGV4dCIsIklucHV0bWFzayIsIm51bWVyaWNJbnB1dCIsInJpZ2h0QWxpZ24iLCJhdXRvVW5tYXNrIiwicGxhY2Vob2xkZXIiLCJyZW1vdmVNYXNrT25TdWJtaXQiLCJncm91cFNlcGFyYXRvciIsImdyZWVkeSIsImRpZ2l0cyIsImFsaWFzIiwibWFzayIsImNhbGN1bGVCaWxsZXQiLCJNb250YW50QmlsbGV0cyIsImJpbGxldHMiLCJnZXRFbGVtZW50c0J5Q2xhc3NOYW1lIiwiZWFjaCIsIm11bHRpcGxpY2F0ZXVyIiwiTW9udGFudCIsIk51bWJlciIsIkludGwiLCJOdW1iZXJGb3JtYXQiLCJmb3JtYXQiLCJjYWxjdWxlTW9ubmFpZSIsIk1vbnRhbnRNb25uYWllIiwiTW9ubmFpZSIsIk1vbnRhbnQyIiwiY2FsY3VsZU1vbnRhbnQiLCJNb250YW50VG90YWwiLCJ2YWx1ZXMiLCJ0b3RhbCIsIm9yYmlzIiwiZWNhcnQiLCJNb250YW50MyIsImNhbGN1bGF0ZVByaWNlIiwicGFyZW50SWQiLCJwYXJlbnQiLCJxdGUiLCJwcmljZSIsImFtb3VudCIsImNhbGN1bGF0ZVRvdGFsQW1vdW50Iiwic3VtUHJpY2UiLCJzdW1BbW91bnQiLCJwdXNoIiwicmVkdWNlIiwicHJldmlvdXNWYWx1ZSIsImN1cnJlbnRWYWx1ZSIsImZ1bGxOYW1lIiwidG9Mb3dlckNhc2UiLCJ0cmltIiwicHJlZml4IiwibmFtZVBhcnRzIiwiZmlyc3ROYW1lIiwibGFzdE5hbWUiLCJmaXJzdE5hbWVQcmVmaXgiLCJ0b1VwcGVyQ2FzZSIsImNoYXJzZXQiLCJyYW5kb21TdHJpbmciLCJjaGFyQXQiLCJNYXRoIiwiZmxvb3IiLCJyYW5kb20iLCJ1c2VybmFtZSJdLCJzb3VyY2VSb290IjoiIn0=