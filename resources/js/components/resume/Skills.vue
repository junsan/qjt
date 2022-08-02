<template>
    <div v-for="skill in skills" :key="skill.id" style="margin-bottom: 20px">
        <div style="float: left; margin-right: 20px;">
            <img src="http://www.qatarjobs.today/assets/images/skills-logos.png" style="">
        </div>
        
        <div v-if="!skill.edit">
            <div style="float: right; cursor: pointer; margin-right: 15px;" @click.prevent.stop="handleClick($event, skill)">
                <img src="http://www.qatarjobs.today/assets/images/dots-horizontal.png" style="">
            </div>
            <div style="padding-top: 15px; display: block; overflow: hidden; ">
                <h6>{{skill.name}}</h6>
                <span style="color: #999">{{skill.level}}</span>
            </div>
        </div> 
        <edit-skill v-else :skill="skill" @close="close"></edit-skill>
        <div style="clear: both"></div>
    </div>
    
    <vue-simple-context-menu
        element-id="skillMenu"
        :options="optionsArray"
        ref="vueSimpleContextMenu"
        @option-clicked="optionClicked"
    />
</template>

<script>
import EditSkill from './EditSkill.vue';

export default {
    data() {
        return {
            optionsArray: [
                {
                name: 'Edit',
                slug: 'edit',
                },
                {
                name: 'Delete',
                slug: 'delete',
                },
            ],
        }
    },
    components: { 
        EditSkill
    },
    methods: {
        handleClick (event, item) {  
            this.$refs.vueSimpleContextMenu.showMenu(event, item)
        },
        optionClicked (event) {

            if(event.option.slug == 'edit') {
                event.item.edit = true;
            }

            if(event.option.slug == 'delete') {
                axios.delete('api/skill/'+event.item.id)
                    .then(res => {
                        this.$emit("myEvent")
                    }).catch(err => console.log(err))
            }
        },
        close(item) {
            item.edit = false;
        }
    },
    mounted() {
        var menu = document.getElementById('skillMenu');
        document.firstElementChild.appendChild(menu);
    },
    props: ['skills']
}
</script>