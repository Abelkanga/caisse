/* * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)

import $ from 'jquery';

import 'bootstrap';
import './css/app.css';
import './js/dataTables.bootstrap';
import 'select2/dist/js/select2.min'
require('./plugins/tagsinput/tagsinput.css');
require('inputmask');
global.$ = global.jQuery = $;
import './js/datatables-config';
import './js/select2-demo';
import './js/add-form-collection';
import './js/delete.form.collection'
import './css/custom.min.css';
import './js/fdb/form-expense'
import './js/page/billetage'
import './js/page/index'


import 'datatables.net';

// import './plugins/datatables-buttons/js/dataTables.buttons.min';
// import './plugins/datatables-buttons/js/buttons.print.min';
// import './plugins/datatables-buttons/js/buttons.html5.min';
// import './plugins/datatables-bs4/js/dataTables.bootstrap4.min';
// import './plugins/datatables-rowgroup/js/dataTables.rowGroup.min';
// import './plugins/datatables-select/js/dataTables.select.min';

import JSZip from 'jszip';
import pdfmake from 'pdfmake';
window.JSZip = JSZip;
window.pdfMake = pdfmake;



import {runInputmask} from "./js/inputMark";

require("datatables.net")
require("datatables.net-responsive")
require('datatables.net-buttons')
require('datatables.net-buttons-bs4')
require("datatables.net-rowgroup");
require("datatables.net-fixedheader");

const toastr = require('toastr/build/toastr.min');
global.toastr = toastr;

window.Pusher = require('pusher-js');

const moment = require('moment')
global.moment = moment;

const slimscroll = require('jquery-slimscroll');
global.slimscroll = slimscroll;

require('./plugins/tagsinput/tagsinput');
import './js/page/fdb';

runInputmask();