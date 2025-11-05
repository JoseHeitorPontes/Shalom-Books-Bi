import axios from "axios";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
