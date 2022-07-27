import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import JobsSearch from './components/jobs/Search.vue';
import Job from './components/jobs/Job.vue';
import Resume from './components/resume/Resume.vue';
import Experiences from './components/resume/Experiences.vue';
import AddEducation from './components/resume/AddEducation.vue';

import VueSimpleContextMenu from 'vue-simple-context-menu';
import 'vue-simple-context-menu/dist/vue-simple-context-menu.css';

let app = createApp({})

app.component('vue-simple-context-menu', VueSimpleContextMenu);
app.component('jobs-search', JobsSearch);
app.component('job', Job);
app.component('resume', Resume);
app.component('experiences', Experiences);
app.component('add-education', AddEducation);


app.mount("#app") 