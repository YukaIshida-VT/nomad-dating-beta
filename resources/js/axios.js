import axios from "axios";
import Cookies from 'js-cookie';
import store from "./store";
import router from "./router";

const axiosClient = axios.create({
  baseURL: 'api',
})

axiosClient.interceptors.request.use(config => {
  const token = Cookies.get('PAToken');
  config.headers.Authorization = `Bearer ${token}`;
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

