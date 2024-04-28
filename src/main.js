import { createApp } from 'vue'
import App from './App.vue';
import axios from 'axios';
import SubscriberList from './components/SubscriberList.vue';
import 'bootstrap/dist/css/bootstrap.css';


const app = createApp({
    // ...
    components: {
        SubscriberList,

    },
    // ...
  });
const baseUrl = '127.0.0.1:8000/api/';
axios.defaults.baseURL = baseUrl;
app.config.globalProperties.$http = axios;


createApp(App).mount('#app')
