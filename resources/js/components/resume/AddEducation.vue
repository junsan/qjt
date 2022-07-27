<template>
    <div class="col-md-12 col-sm-12">
        <fieldset>
        <input v-model="education.school" name="school" type="text" placeholder="School*" required="">
        </fieldset>
    </div>
    <div class="col-md-6 col-sm-12">
        <fieldset>
        <input v-model="education.course" name="course" type="text" placeholder="Course*" required="">
        </fieldset>
    </div>
    <div class="col-md-6 col-sm-12">
        <fieldset>
        <input v-model="education.degree" name="degree" type="text" placeholder="Degree*" required="">
        </fieldset>
    </div>
    <div class="col-md-12 col-sm-12">
        <fieldset>
        <input v-model="education.location" name="location" type="text" placeholder="School location*" required="">
        </fieldset>
    </div>
    <div class="col-lg-12">
        <fieldset>
        <textarea v-model="education.description" name="description" rows="6" id="message" placeholder="Description" required=""></textarea>
        </fieldset>
    </div>
    <div class="col-md-6 col-sm-12">
        <fieldset>
        <date-picker v-model:value="education.from" type="month" placeholder="From*"></date-picker>
        </fieldset>
    </div>
    <div class="col-md-6 col-sm-12">
        <fieldset>
        <date-picker v-model:value="education.to" type="month" placeholder="To*"></date-picker>
        </fieldset>
    </div>
    <div class="col-md-12 col-sm-12">
        <fieldset>
        <button type="button" class="btn btn-default mr-2">Cancel</button>
        <button @click="storeEducation()" type="button"  class="btn btn-primary">Save</button>
        </fieldset>
    </div>
</template>

<script>
import DatePicker from 'vue-datepicker-next';
import 'vue-datepicker-next/index.css';

export default {
    data() {
        return {
            education: {
                user_id: 1,
                school: null,
                location: null,
                degree: null,
                course: null,
                from: null,
                to: null,
                description: null
            }
        }
    },
    components: {
      DatePicker
    },
    methods: {
      storeEducation() {

        const headers = {
          "Content-Type": "text/json"
        };

        var d = new Date(this.education.from);
        this.education.from = $.datepicker.formatDate('yy-mm-dd', d);
        
        var x = new Date(this.education.to);
        this.education.to = $.datepicker.formatDate('yy-mm-dd', x);

        axios.post("api/education", this.education, {
            headers: headers
        })
        .then(res => {
            console.log(res) 
        }).catch(err => console.log(err)) 
      }
    }
}
</script>