<template>
    <div v-for="experience in experiences" :key="experience.id" style="margin-bottom: 20px">
        <div style="float: left; margin-right: 15px;">
            <img src="assets/images/experience-default.png" style="">
        </div>
        <div style="float: right; cursor: pointer; margin-right: 15px;" @click.prevent.stop="handleClick($event, experience)">
            <img src="assets/images/dots-horizontal.png" style="">
        </div>
        <div style="padding-top: 15px; display: block; overflow: hidden; ">
            <h6>{{experience.title}} <small>{{experience.from}} {{experience.to}}</small></h6>
            <span style="color: #999">{{experience.company_name}}</span>
            <p style="margin-top: 10px;">{{experience.description}}</p>
        </div>        
    </div>

    <vue-simple-context-menu
        element-id="mySecondMenu"
        :options="optionsArray1"
        ref="vueSimpleContextMenu"
        @option-clicked="optionClicked"
    />
</template>

<script>

    export default {
        data() {
            return {
                experiences: [],
                optionsArray1: [
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
        mounted() {
            this.getExperiences()
            var menu = document.getElementById('mySecondMenu');
            document.firstElementChild.appendChild(menu);
        },
        methods: {
            getExperiences() {
                axios.get('api/experience/'+1)
                    .then(res => {
                        this.experiences = res.data.data
                        console.log(res.data.data);
                    }).catch(err => console.log(err)) 
            },      
            handleClick (event, item) {
                
                this.$refs.vueSimpleContextMenu.showMenu(event, item)
                console.log('Click')
            },
            optionClicked (event) {
                window.alert(JSON.stringify(event))
            }
        }
    }

</script>
