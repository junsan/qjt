<template>
    <div class="row" style="background-color: #f7f7f7; margin-bottom: 20px; padding: 40px 20px;">
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
            <date-picker v-model:value="experience.from" type="month" placeholder="From*" value-type="format" format="YYYY-MM-DD"></date-picker>
            </fieldset>
        </div>
        <div class="col-md-6 col-sm-12">
            <fieldset>
            <date-picker v-model:value="experience.to" type="month" placeholder="To*" value-type="format" format="YYYY-MM-DD"></date-picker>
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
            <button @click="close(experience)" type="button" class="btn btn-default mr-2">Cancel</button>
            <button @click="updateExperience()" type="button"  class="btn btn-primary">Save</button>
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
    props: ['experience'],
    components: {
        DatePicker
    },
    mounted() {
        console.log(this.experience.from);
    },
    methods: {
        updateExperience() {
        const headers = {
          "Content-Type": "text/json"
        };

        this.experience.user_id = 1;
        this.experience.edit = false;

        var d = new Date(this.experience.from);
        this.experience.from = $.datepicker.formatDate('yy-mm-dd', d);
        
        var x = new Date(this.experience.to);
        this.experience.to = $.datepicker.formatDate('yy-mm-dd', x);

        axios.put("api/experience/"+this.experience.id, this.experience, {
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