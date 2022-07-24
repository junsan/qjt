import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import JobsSearch from './components/jobs/Search.vue';

let app = createApp({})

app.component('jobs-search', JobsSearch);

app.mount("#app") 