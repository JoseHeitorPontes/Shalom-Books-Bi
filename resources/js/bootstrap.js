import axios from "axios";
import Chart from "chart.js/auto";

import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

window.axios = axios;
window.Chart = Chart;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
