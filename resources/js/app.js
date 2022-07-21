import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import HelloWorld from './components/Welcome.vue';
import JobsSearch from './components/jobs/Search.vue';

let app = createApp({})

app.component('hello-world', HelloWorld);
app.component('jobs-search', JobsSearch);

app.mount("#app") 