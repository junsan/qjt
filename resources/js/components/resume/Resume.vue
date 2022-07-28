<template>
    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us" style="margin-top: 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="contact-form" >
                          <div class="row">
                            <div class="col-md-12 col-sm-12 mb-4">
                                <h4>Personal Information</h4>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="First Name*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Last Name*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Email*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Phone Number*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12 mb-4">
                                <h4>Experience <span @click="toggleAddExperience()" style="cursor: pointer;"><img src="assets/images/add.png" style="float: right"></span></h4>
                            </div>

                            <add-experience v-if="showAddExperience"  @myEvent="getExperiences"></add-experience>
                            
                            <br><br>
                            <div class="col-md-12 col-sm-12 mb-5">
                              <experiences :experiences="experiences" @myEvent="getExperiences"></experiences>
                            </div>

                            <br><br><br><br>
                            
                            <div class="col-md-12 col-sm-12 mb-4">
                                <h4>Education <span @click="toggleAddEducation()" style="cursor: pointer;"><img src="assets/images/add.png" style="float: right"></span></h4>
                            </div>

                            
                            <add-education v-if="showAddEducation" @myEvent="getEducations"></add-education>

                            <br><br>
                            <div class="col-md-12 col-sm-12 mb-5">
                              <educations :educations="educations" @myEvent="getEducations"></educations>
                            </div>
                            <br><br><br><br>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="button" class="main-button orange-button">Submit</button>
                              </fieldset>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Educations from './Educations.vue';
import AddExperience from './AddExperience.vue';

export default {
    data() {
        return {
            educations: [],
            experiences: [],
            showAddEducation: false,
            showAddExperience: false
        }
    },
    components: {
    Educations,
    AddExperience
},
    methods: {
      toggleAddEducation() {
        this.showAddEducation = !this.showAddEducation;
      },
      toggleAddExperience() {
        this.showAddExperience = !this.showAddExperience
      },
      getEducations() {
        axios.get('api/education/'+1)
            .then(res => {
                this.educations = res.data.data
                console.log(res.data.data);
            }).catch(err => console.log(err)) 
      },
      getExperiences() {
          axios.get('api/experience/'+1)
              .then(res => {
                  this.experiences = res.data.data
                  console.log(res.data.data);
              }).catch(err => console.log(err)) 
      },   
    },
    mounted() {
      this.getEducations()
      this.getExperiences()
    }
}
</script>
