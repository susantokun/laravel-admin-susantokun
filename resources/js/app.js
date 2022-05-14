require("./bootstrap");
require("./sb-admin-2");
require("./custom");

const Swal = (window.Swal = require("sweetalert2"));
const Chart = (window.Chart = require("chart.js"));
const ClassicEditor = (window.ClassicEditor = require("@ckeditor/ckeditor5-build-classic"))
const colorpicker = (window.colorpicker = require("bootstrap-colorpicker"));

const Pickr = (window.Pickr = require("@simonwep/pickr"));

window.Vue = require('vue');
import LanguageSwitcher from './components/LanguageSwitcher.vue'
const app = Vue.createApp({});
app.component("language-switcher", LanguageSwitcher);
app.mount("#app");
