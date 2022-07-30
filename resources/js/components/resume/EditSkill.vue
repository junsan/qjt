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
                    <option v-for="(level, index) in levels" :key="index" :value="level">{{level}}</option>
                </select>
            </fieldset>
        </div>
        <div class="col-md-12 col-sm-12">
            <fieldset>
            <button @click="close(skill)" type="button" class="btn btn-default mr-2">Cancel</button>
            <button @click="updateSkill()" type="button"  class="btn btn-primary">Save</button>
            </fieldset>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            levels: [
                'Beginner',
                'Intermidiate',
                'Advanced'
            ]
        }
    },
    props: ['skill'],
    methods: {
        updateSkill() {
        const headers = {
          "Content-Type": "text/json"
        };

        this.skill.user_id = document.querySelector("meta[name='user-id']").getAttribute('content');
        this.skill.edit = false;

        axios.put("api/skill/"+this.skill.id, this.skill, {
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