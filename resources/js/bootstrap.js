import axios from 'axios';
import Toast from './toast.js';
import {addToCart, buyNow, decreaseQty, getQty, increaseQty} from "./cart.js";

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.toast = new Toast();

window.addToCart = addToCart;
window.buyNow = buyNow;
window.getQty = getQty;
window.increaseQty = increaseQty;
window.decreaseQty = decreaseQty;
