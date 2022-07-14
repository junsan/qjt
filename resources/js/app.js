import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import HelloWorld from './components/Welcome.vue';
import JobIndex from './components/jobs/Index.vue';

let app = createApp({})

app.component('hello-world', HelloWorld);
app.component('job-index', JobIndex);

app.mount("#app") 