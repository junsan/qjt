<template>
    <div class="row" style="background-color: #f7f7f7; margin-bottom: 20px; padding: 40px 20px;">
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
            <date-picker v-model:value="education.from" type="month" placeholder="From*" value-type="format" format="YYYY-MM-DD"></date-picker>
            </fieldset>
        </div>
        <div class="col-md-6 col-sm-12">
            <fieldset>
            <date-picker v-model:value="education.to" type="month" placeholder="To*" value-type="format" format="YYYY-MM-DD"></date-picker>
            </fieldset>
        </div>
        <div class="col-md-12 col-sm-12">
            <fieldset>
            <button @click="close(education)" type="button" class="btn btn-default mr-2">Cancel</button>
            <button @click="updateEducation()" type="button"  class="btn btn-primary">Save</button>
            </fieldset>
        </div>
    </div>
</template>

<script>
import DatePicker from 'vue-datepicker-next';
import 'vue-datepicker-next/index.css';

export default {
    data() {
        return {

        }
    },
    components: {
      DatePicker
    },
    props: ['education'],
    methods: {
      updateEducation() {

        const headers = {
          "Content-Type": "text/json"
        };

        this.education.user_id = 1;
        this.education.edit = false;

        var d = new Date(this.education.from);
        this.education.from = $.datepicker.formatDate('yy-mm-dd', d);
        
        var x = new Date(this.education.to);
        this.education.to = $.datepicker.formatDate('yy-mm-dd', x);

        axios.put("api/education/"+this.education.id, this.education, {
            headers: headers
        })
        .then(res => {
            this.$emit("myEvent")
        }).catch(err => console.log(err)) 
      },
      close(item) {
        this.$emit("close", item)
      }
    }
}
</script>