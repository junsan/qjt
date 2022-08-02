<template>
    <div v-for="experience in experiences" :key="experience.id" style="margin-bottom: 20px">
        <div style="float: left; margin-right: 15px;">
            <img src="/assets/images/experience-default.png" style="">
        </div>
        
        <div v-if="!experience.edit">
            <div style="float: right; cursor: pointer; margin-right: 15px;" @click.prevent.stop="handleClick($event, experience)">
                <img src="/assets/images/dots-horizontal.png" style="">
            </div>
            <div style="padding-top: 15px; display: block; overflow: hidden; ">
                <h6>{{experience.title}} <small>{{experience.from}} {{experience.to}}</small></h6>
                <span style="color: #999">{{experience.company_name}}</span>
                <p style="margin-top: 10px;">{{experience.description}}</p>
            </div>     
        </div>   
        <edit-experience v-else :experience="experience" @close="close"></edit-experience>
    </div>

    <vue-simple-context-menu
        element-id="experienceMenu"
        :options="optionsArray"
        ref="vueSimpleContextMenu"
        @option-clicked="optionClicked"
    />
</template>

<script>
import EditExperience from './EditExperience.vue';

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
            EditExperience
        },
        props: ['experiences'],
        mounted() {
            var menu = document.getElementById('experienceMenu');
            document.firstElementChild.appendChild(menu);
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
                    axios.delete('api/experience/'+event.item.id)
                        .then(res => {
                            this.$emit("myEvent")
                        }).catch(err => console.log(err))
                }
            },
            close(item) {
                item.edit = false;
            }
        }
    }

</script>
