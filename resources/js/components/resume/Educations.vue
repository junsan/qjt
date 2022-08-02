<template>
    <div v-for="education in educations" :key="education.id" style="margin-bottom: 20px">
        <div style="float: left; margin-right: 15px;">
            <img src="/assets/images/education-default.png" style="">
        </div>
        
        <div v-if="!education.edit">
            <div style="float: right; cursor: pointer; margin-right: 15px;" @click.prevent.stop="handleClick($event, education)">
                <img src="/assets/images/dots-horizontal.png" style="">
            </div>
            <div style="padding-top: 15px; display: block; overflow: hidden; ">
                <h6>{{education.school}} <small>{{education.from}} {{education.to}}</small></h6>
                <span style="color: #999">{{education.degree}} {{education.course}}</span>
                <p style="margin-top: 10px;">{{education.description}}</p>
            </div>
        </div> 
        <edit-education v-else :education="education" @close="close"></edit-education>
    </div>

    <vue-simple-context-menu
        element-id="educationMenu"
        :options="optionsArray"
        ref="vueSimpleContextMenu"
        @option-clicked="optionClicked"
    />
</template>

<script>
import EditEducation from './EditEducation.vue';

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
        EditEducation
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
                axios.delete('api/education/'+event.item.id)
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
        var menu = document.getElementById('educationMenu');
        document.firstElementChild.appendChild(menu);
    },
    props: ['educations']
}
</script>