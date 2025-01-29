/* * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)


import './css/app.css';
import  'bootstrap'
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

import $ from 'jquery';

global.$ = global.jQuery = $;
require('datatables.net-bs4')
require('datatables.net-responsive-bs4')
require("datatables.net-buttons-bs4")
require('datatables.net-buttons/js/buttons.html5');
require('datatables.net-buttons/js/buttons.print');
require('datatables.net-buttons/js/buttons.colVis');
require('datatables.net-searchbuilder-bs4');



const toastr = require('toastr');
global.toastr = toastr;

window.Pusher = require('pusher-js');

const moment = require('moment')
global.moment = moment;


import './js/page/fdb';

 runInputmask();
