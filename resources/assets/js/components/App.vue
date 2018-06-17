<template>
    <div class="app-component">
        <table class="table table-bordered table-hover">
            <thead>
                <th>Title</th>
                <th>Priority</th>
                <th>Action</th>
            </thead>
            <task v-for="task in tasks" :key="task.id" :task="task" @delete="deleteTask"></task>
            <tr>
                <td><input type="text" v-model="task.title" class="form-control"></td>
                <td>
                    <select name="priority" v-model="task.priority" class="form-control">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </td>
                <td><button @click="createTask" class="btn btn-info">Add</button></td>
            </tr>
        </table>
    </div>
</template>


<script>
    import Task from './Task.vue';
    
    export default {
        data(){
            return {
                tasks: [],
                task: { title: '', priority: '' },
                message: ''
            }
        },
        components: { Task },
        methods: {
            
            getAllTasks(){
                
                window.axios.get('/api/tasks')
                    .then(response => {
                    
                        response.data.map((task, index) => {
                            this.tasks.push(task);
                        });
                    
                    })
                    .catch(err => {
                        console.log(err);
                    });
                
            },
            
            createTask(){
                
                window.axios.post('/api/tasks', this.task)
                    .then(response => {
                        this.tasks.push(response.data);
                    })
                    .catch(err => {
                        console.log(err);
                    });
                
            },
            
            deleteTask(task_id){
                
                console.log(task_id);
                
                window.axios.delete(`/api/tasks/${task_id}`)
                    .then(response => {
                        let item =this.tasks.indexOf(response.data);
                        this.tasks.splice(item, 1);
                        
                        this.task.title ='';
                    
                    })
                    .catch(err => {
                        console.log(err);
                    });
                
            }
            
        },
        created(){
            this.getAllTasks();
        }
        
    }
    
</script>


<style>
    
</style>