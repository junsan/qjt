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
                            <div v-for="job in jobs" :key="job.id" class="col-md-6">
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
                            <h2>{{ job.title }}</h2>
                            <br>
                            <h5>Job Description</h5>
                            <br>
                            <p v-html="job.description"></p>
                            <br>
                            <h5>Requirements</h5>
                            <br>
                            <p v-html="job.requirements"></p>
                        </div>
                   </div>
                </div>

                <br>
            </div>
        </section>
    </div>
</template>

<script>

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
            show_job: false
        }
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
            }).catch(function (error) {
                console.error(error)
            });
        },
        showJob(id) {
            this.show_job = false
            axios.get('api/job/'+id)
            .then(res => {
                this.job = res.data.data
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
