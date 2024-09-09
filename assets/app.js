/* * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)


import './css/app.css';
require('datatables.net-bs4/css/dataTables.bootstrap4.css')
require('datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')
require('datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css')
require('datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')
import './js/dataTables.bootstrap';
import 'select2/dist/js/select2.min'
require('inputmask');
import './js/datatables-demo';
import './js/select2-demo';
import './css/custom.min.css';



require('./plugins/tagsinput/tagsinput.css');
import './js/datatables-config';
import './js/add-form-collection';
import './js/delete.form.collection'
import './js/fdb/form-expense'
import './js/page/billetage'
import './js/page/index'
import './js/page/userNameAuto'
import 'datatables.net-bs4/js/dataTables.bootstrap4.min'
import 'datatables.net-buttons/js/buttons.print'
import 'datatables.net-fixedheader-bs4/js/fixedHeader.bootstrap4.min'
import 'datatables.net-responsive-bs4/js/responsive.bootstrap4.min'

import { runInputmask } from "./js/input-mask";



const toastr = require('toastr/build/toastr.min');
global.toastr = toastr;

window.Pusher = require('pusher-js');

const moment = require('moment')
global.moment = moment;


import './js/page/fdb';

 runInputmask();
