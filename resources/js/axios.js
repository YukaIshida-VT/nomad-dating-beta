import axios from "axios";
import store from "./store";
import router from "./router";

const axiosClient = axios.create({
  baseURL: 'api',
})

axiosClient.interceptors.request.use(config => {
  config.headers.Authorization = `Bearer ${sessionStorage.getItem("TOKEN")}`
  return config;
})

axiosClient.interceptors.response.use(response => {
  return response;
}, error => {
  if (error.response.status === 401) {
    // router.push({name: 'Login'})
  } else if (error.response.status === 404) {
    // router.push({name: 'NotFound'})
  }
  throw error;
})

export default axiosClient;

