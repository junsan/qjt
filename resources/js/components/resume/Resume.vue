<template>
    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us" style="margin-top: 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-xs-2 mt-5" id="tabs">
                    <ul>
                      <li><a href='#tabs-1'  style="text-align: center;"><i class="fa fa-user"></i> Profile</a></li>
                      <li><a href='#tabs-2'  style="text-align: center;"><i class="fa fa-briefcase" style="margin-right: 0;"></i> Application</a></li>
                      <li><a href='#tabs-2'  style="text-align: center;"><i class="fa fa-heart" style="margin-right: 0;"></i> Saved</a></li>
                    </ul>
                </div>
                <div class="col-lg-10 col-md-10 col-xs-10">
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

                            <add-experience v-if="showAddExperience"  @myEvent="getExperiences" @closeAddExperience="toggleAddExperience"></add-experience>
                            
                            <br><br>
                            <div class="col-md-12 col-sm-12 mb-5">
                              <experiences :experiences="experiences" @myEvent="getExperiences"></experiences>
                            </div>

                            <br><br><br><br>
                            <div class="col-md-12 col-sm-12 mb-4">
                                <h4>Education <span @click="toggleAddEducation()" style="cursor: pointer;"><img src="assets/images/add.png" style="float: right"></span></h4>
                            </div>

                            
                            <add-education v-if="showAddEducation" @myEvent="getEducations" @closeAddEducation="toggleAddEducation"></add-education>

                            <br><br>
                            <div class="col-md-12 col-sm-12 mb-5">
                              <educations :educations="educations" @myEvent="getEducations"></educations>
                            </div>

                            <br><br><br><br>
                            <div class="col-md-12 col-sm-12 mb-4">
                                <h4>Skills <span @click="toggleAddSkill()" style="cursor: pointer;"><img src="assets/images/add.png" style="float: right"></span></h4>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 mb-4">
                              <add-skill v-if="showAddSkill" @myEvent="getEducations" @closeAddEducation="toggleAddEducation"></add-skill>
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
import AddSkill from './AddSkill.vue';

export default {
    data() {
        return {
            educations: [],
            experiences: [],
            showAddEducation: false,
            showAddExperience: false,
            showAddSkill: false,
            userId: null
        }
    },
    components: {
    Educations,
    AddSkill
},
    methods: {
      toggleAddEducation() {
        this.showAddEducation = !this.showAddEducation;
      },
      toggleAddExperience() {
        this.showAddExperience = !this.showAddExperience
      },
      toggleAddSkill() {
        this.showAddSkill = !this.showAddSkill
      },
      getEducations() {
        axios.get('api/education/'+this.userId)
            .then(res => {
                this.educations = res.data.data
            }).catch(err => console.log(err)) 
      },
      getExperiences() {
          axios.get('api/experience/'+this.userId)
              .then(res => {
                  this.experiences = res.data.data
              }).catch(err => console.log(err)) 
      },   
    },
    mounted() {
      this.userId = document.querySelector("meta[name='user-id']").getAttribute('content');
      this.getEducations()
      this.getExperiences()
    }
}
</script>
