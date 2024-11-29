<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </form>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Todo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{ todos }}
                                    <td>kkk</td>
                                    <td>kkk</td>
                                    <td>kkk</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


    // App.vue
// export default {
//   name: 'App',
//   api:'localhost:8000/api/todos',
//   todos:[],
//   methods: {
//     getList() {
//       this.axios.get(api).then((response) => {
//         todos.value = response.data;
//       })

//     }
//   }
// }
import {ref, onMounted } from "vue";
const todos = ref([]);
const getTodos = () => {
    asios.get('localhost:8000/api/todos').then((res) => (posts.value = res.data))
}

onMounted(() => getTodos());
</script>
