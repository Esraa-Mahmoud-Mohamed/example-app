import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import '.enduser/js/cart'; // imports cart.js and registers window.cartPage

window.Alpine = Alpine;
window.Swal = Swal; // optional if you only use Swal inside cart.js

Alpine.start();