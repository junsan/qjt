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
                                        <input type="checkbox"> <span>{{industry.name}}</span>
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

                                        <h4>{{job.title}}</h4>

                                        <p>{{job.category.name}} &nbsp;/&nbsp; {{job.industry.name}}</p>

                                        <ul class="social-icons">
                                            <li><a href="job-details.html">+ View More</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h2>Senior Corporate & Finance Lawyer</h2>
                        <br>
                        <p>Our senses step into gear from the moment we wake up in the morning until we turn in for the night. The consumer grooming and cleaning regimen intersects with personal care, home care, fabric care, oral care, and active beauty products, with fragrance at the core of every experience. Givaudan Consumer Products (CP’s) are, more often than not, responsible for carrying you through the olfactive journey of your day.</p>
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
            categories: [],
            industries: [],
            query: '',
            selectedCategories: []
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
            this.selectedCategories.forEach(cat => arrayCategories.push(cat));

            const options = {
            method: 'GET',
                url: 'api/search',
                params: {query: this.query, categories: arrayCategories},
                
            };

            axios.request(options).then((response) => {
                this.jobs = response.data.data
            }).catch(function (error) {
                console.error(error)
            });
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
