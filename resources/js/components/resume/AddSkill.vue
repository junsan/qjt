<template>
    <div class="row" style="background-color: #f7f7f7; margin-bottom: 20px; padding: 40px 20px;">
        <div class="col-md-6 col-sm-6">
            <fieldset>
            <input v-model="skill.name" name="name" type="text" placeholder="Skill*" required="">
            </fieldset>
        </div>
        <div class="col-md-6 col-sm-6">
            <fieldset>
                <select v-model="skill.level">
                    <option value="0" selected>Select skill level...</option>
                    <option value="beginner">Beginner</option>
                    <option value="intermidiate">Intermidiate</option>
                    <option value="advanced">Advanced</option>
                </select>
            </fieldset>
        </div>
        <div class="col-md-12 col-sm-12">
            <fieldset>
            <button type="button" class="btn btn-default mr-2">Cancel</button>
            <button @click="storeSkill()" type="button"  class="btn btn-primary">Add</button>
            </fieldset>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            skill: {
                user_id: null,
                name: null,
                level: 0,
                edit: false
            }
        }
    },
    methods: {
      storeSkill() {
        const headers = {
          "Content-Type": "text/json"
        };

        this.skill.user_id = document.querySelector("meta[name='user-id']").getAttribute('content'); 

        axios.post("api/skill", this.skill, {
            headers: headers
        })
        .then(res => {
            this.$emit("myEvent")
            this.$emit("closeSkillEducation")
        }).catch(err => console.log(err)) 
      }
    }
}
</script>