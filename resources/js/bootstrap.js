import axios from 'axios';
import Toast from './toast.js';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.toast = new Toast();
