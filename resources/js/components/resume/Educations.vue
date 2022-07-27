<template>
    <div v-for="education in educations" :key="education.id" style="margin-bottom: 20px">
        <div style="float: left; margin-right: 15px;">
            <img src="assets/images/experience-default.png" style="">
        </div>
        <div style="float: right; cursor: pointer; margin-right: 15px;" @click.prevent.stop="handleClick($event, experience)">
            <img src="assets/images/dots-horizontal.png" style="">
        </div>
        <div style="padding-top: 15px; display: block; overflow: hidden; ">
            <h6>{{education.school}} <small>{{education.from}} {{education.to}}</small></h6>
            <span style="color: #999">{{education.degree}} {{education.course}}</span>
            <p style="margin-top: 10px;">{{education.description}}</p>
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
    methods: {
        handleClick (event, item) {  
            this.$refs.vueSimpleContextMenu.showMenu(event, item)
            console.log('Click')
        },
        optionClicked (event) {
            window.alert(JSON.stringify(event))
        }
    },
    mounted() {
        var menu = document.getElementById('mySecondMenu');
        document.firstElementChild.appendChild(menu);
    },
    props: ['educations']
}
</script>