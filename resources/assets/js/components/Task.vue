<template>
    <tr>
        <td>{{ task.title }}</td>
        <td>{{ task.priority }}</td>
        <td><button @click="removeTask" class="btn btn-danger btn-sm">Remove</button></td>
    </tr>
</template>


<script>
    export default {
        data(){
            return {
                
            }
        },
        methods: {
            
            removeTask(){
                this.$emit('delete', this.task.id);
            }
            
        },
        props: ['task']
    }
</script>


<style>
    
</style>