<template>
    <div>
        <h2>{{ job.title }}</h2>
        <a href="/resume" class="btn btn-primary mt-5 mb-5">Apply Now</a>
        <br>
        <h5>Job Description</h5>
        <br>
        <p v-html="job.description"></p>
        <br>
        <h5>Requirements</h5>
        <br>
        <p v-html="job.requirements"></p>
        <a href="`/resume`" class="btn btn-primary mt-5 mb-5">Apply Now</a>
    </div>

    <vue-simple-context-menu
      element-id="mySecondMenu"
      :options="optionsArray2"
      ref="vueSimpleContextMenu2"
      @option-clicked="optionClicked2"
    >
    </vue-simple-context-menu>
</template>

<script>
export default {
    data() {
    
    },
    props: ['job'],
    mounted() {
        sessionStorage.setItem('job', this.job.id);  
    }
}
</script>