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
                                <h4>Experience</h4>
                            </div>

                            <div class="col-md-12 col-sm-12 mb-5">
                              <experiences></experiences>
                            </div>

                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input v-model="experience.title" name="name" type="text" id="name" placeholder="Title*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input v-model="experience.company_name" name="name" type="text" id="name" placeholder="Company Name*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input v-model="experience.location" name="name" type="text" id="name" placeholder="Offcie location*" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea v-model="experience.description" name="message" rows="6" id="message" placeholder="Description" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <date-picker v-model:value="experience.from" type="month" placeholder="From*"></date-picker>
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <date-picker v-model:value="experience.to" type="month" placeholder="To*"></date-picker>
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input v-model="experience.is_currently" style="width: 15px; margin-right: 10px; -webkit-appearance: checkbox; height: 15px" type="checkbox" id="vehicle1" name="vehicle1">
                                <label for="vehicle1"> I currenty working</label>
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <button type="button" class="btn btn-default mr-2">Cancel</button>
                                <button @click="storeExperience()" type="button"  class="btn btn-primary">Save</button>
                              </fieldset>
                            </div>
                            <br><br><br><br>
                            
                            <add-education></add-education>
                            
                            <br><br><br><br>
                            <div class="col-md-12 col-sm-12 mb-5">
                              <educations :educations="educations"></educations>
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
import DatePicker from 'vue-datepicker-next';
import 'vue-datepicker-next/index.css';
import Educations from './Educations.vue';

export default {
    data() {
        return {
            experience: {
              user_id: 1,
              title: null,
              company_id: null,
              location: null,
              description: null,
              from: null,
              to: null,
              is_currently: false
            },
            educations: []
        }
    },
    components: {
    DatePicker,
    Educations
},
    methods: {
      storeExperience() {
        const headers = {
          "Content-Type": "text/json"
        };

        var d = new Date(this.experience.from);
        this.experience.from = $.datepicker.formatDate('yy-mm-dd', d);
        
        var x = new Date(this.experience.to);
        this.experience.to = $.datepicker.formatDate('yy-mm-dd', x);

        axios.post("api/experience", this.experience, {
            headers: headers
        })
        .then(res => {
            console.log(res) 
            this.getEducations()
        }).catch(err => console.log(err)) 
      },
      getEducations() {
        axios.get('api/education/'+1)
            .then(res => {
                this.educations = res.data.data
                console.log(res.data.data);
            }).catch(err => console.log(err)) 
      }
    },
    mounted() {
      this.getEducations()
    }
}
</script>
