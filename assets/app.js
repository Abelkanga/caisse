/* * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)


import './css/app.css';
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

import { runInputmask } from "./js/input-mask";





const toastr = require('toastr/build/toastr.min');
global.toastr = toastr;

window.Pusher = require('pusher-js');

const moment = require('moment')
global.moment = moment;


import './js/page/fdb';

 runInputmask();
