<template>
    <div>
        <h2>Skills</h2>
        <div v-for="skill in skills" v-bind:key="skill.id">
            <h3>{{skill.skill_name}}</h3>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            skills: [],
            skill: {
                id: '',
                skill_name: ''
            },
            skill_id: '',
            pagination: {}
        }
    }
}
</script>
