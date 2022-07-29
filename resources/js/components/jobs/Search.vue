<template>
    <div>
        <!-- ***** Call to Action Start ***** -->
        <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cta-content">
                            <br>
                            <br>
                            <h2>Our <em>Jobs</em></h2>
                            <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                        </div>
                        <div class="main-button">
                            <input v-model="query" @keyup.enter="searchJobs()" style="padding: 11px 20px; width: 500px;" name="query" type="text" id="query" placeholder="Enter job title, keyword or company">
                            <button @click="searchJobs()" type="button">Search Job</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Call to Action End ***** -->

        <!-- ***** Fleet Starts ***** -->
        <section class="section" id="trainers">
            <div class="container">
                <br>
                <br>

                <div class="row">
                    <div class="col-lg-2">
                        <form action="#">
                            <h5 style="margin-bottom: 15px">Employment</h5>

                            <div>
                                <label>
                                    <input type="checkbox"> <span>Full time</span>
                                </label>
                            </div>

                            <div>
                                <label>
                                    <input type="checkbox"> <span>Part Time</span>
                                </label>
                            </div>

                            <br>

                            <h5 style="margin-bottom: 15px">Category</h5>
                                <div v-for="category in categories" :key="category.id">
                                    <label>
                                        <input @change="searchJobs()" type="checkbox" v-model="selectedCategories" :id="category.id" :value="category.id"> <span>{{category.name}}</span>
                                    </label>
                                </div>
                            <br>

                            <h5 style="margin-bottom: 15px">Industry</h5>
                                <div v-for="industry in industries" :key="industry.id">
                                    <label>
                                        <input type="checkbox" @change="searchJobs()" v-model="selectedIndustries" :value="industry.id"> <span>{{industry.name}}</span>
                                    </label>
                                </div>
                            <br>
                            
                        </form>
                        
                        <br>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div v-if="show_job_container" class="col-md-12">
                                <content-loader
                                    viewBox="0 0 540 740"
                                    :speed="2"
                                    primaryColor="#e1dbdb"
                                    secondaryColor="#ecebeb"
                                >
                                    <rect x="12" y="20" rx="0" ry="0" width="250" height="250" /> 
                                    <rect x="300" y="20" rx="0" ry="0" width="250" height="250" /> 
                                    <rect x="12" y="322" rx="0" ry="0" width="250" height="250" /> 
                                    <rect x="300" y="322" rx="0" ry="0" width="250" height="250" />
                                </content-loader>
                            </div>
                            <div v-else v-for="job in jobs" :key="job.id" class="col-md-6">
                                <div class="trainer-item">
                                    <div class="down-content">
                                        <img src="https://www.gulftalent.com/gtimages/large/SE350-10405_logo-img-cloud-spaces-careers-jobs.jpg" >
                                        <span><a href="">{{job.company.name}}</a></span>

                                        <a href="" @click.prevent="showJob(job.id)"><h4>{{job.title}}</h4></a>

                                        <p>{{job.category.name}} &nbsp;/&nbsp; {{job.industry.name}}</p>

                                        <ul class="social-icons">
                                            <li><a href="" @click.prevent="showJob(job.id)">+ View More</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>                          
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div v-if="show_job">
                            <job :job="job"></job>
                        </div>
                        <div v-if="show_container">
                            <content-loader
                                viewBox="0 0 350 600"
                                :speed="2"
                                primaryColor="#e1dbdb"
                                secondaryColor="#ecebeb"
                            >
                                <rect x="10" y="56" rx="0" ry="0" width="139" height="36" /> 
                                <rect x="10" y="12" rx="0" ry="0" width="271" height="26" /> 
                                <rect x="10" y="128" rx="0" ry="0" width="271" height="19" /> 
                                <rect x="10" y="169" rx="0" ry="0" width="156" height="18" /> 
                                <rect x="10" y="203" rx="0" ry="0" width="271" height="19" /> 
                                <rect x="10" y="246" rx="0" ry="0" width="271" height="19" /> 
                                <rect x="10" y="286" rx="0" ry="0" width="271" height="19" /> 
                                <rect x="10" y="340" rx="0" ry="0" width="139" height="36" />
                            </content-loader>
                        </div>
                   </div>
                </div>

                <br>
            </div>
        </section>
    </div>
</template>

<script>
import { ContentLoader } from 'vue-content-loader'

export default {
    data() {
        return {
            jobs: [],
            job: [],
            categories: [],
            industries: [],
            query: '',
            selectedCategories: [],
            selectedIndustries: [],
            show_job: false,
            show_container: false,
            show_job_container: true
        }
    },
    components: {
        ContentLoader
    },
    created() {
        this.getJobs()
        this.getCategories()
        this.getIndustries()
    },
    methods: {
        getJobs() {
            axios.get('api/jobs')
            .then(res => {
                this.show_job_container = false;
                this.jobs = res.data.data
            }).catch(err => console.log(err)) 
        },
        getCategories() {
            axios.get('api/categories')
            .then(res => {
                this.categories = res.data
            }).catch(err => console.log(err)) 
        },
        getIndustries() {
            axios.get('api/industries')
            .then(res => {
                this.industries = res.data
            }).catch(err => console.log(err)) 
        },
        searchJobs() {
            this.show_job_container = true;
            let arrayCategories = [];
            let arrayIndustries = [];
            this.selectedCategories.forEach(category => arrayCategories.push(category))
            this.selectedIndustries.forEach(industry => arrayIndustries.push(industry))

            const options = {
            method: 'GET',
                url: 'api/search',
                params: {query: this.query, categories: arrayCategories, industries: arrayIndustries},
                
            };

            axios.request(options).then((response) => {
                this.jobs = response.data.data
                this.show_job_container = false;
            }).catch(function (error) {
                console.error(error)
            });
        },
        showJob(id) {
            this.show_container = true;
            this.show_job = false
            axios.get('api/job/'+id)
            .then(res => {
                this.job = res.data.data
                this.show_container = false
                this.show_job = true
            }).catch(err => console.log(err)) 
        }
    },
    watch: {
        selectedCategories() {
            console.log(this.selectedCategories)
        }
    }
}

</script>

<style scoped>

</style>
