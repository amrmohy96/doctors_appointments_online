<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-3">
                <h1 class="my-2">shop</h1>
                <div class="list-group">
                    <a class="list-group-item" href="" v-for="category in categories">{{category.name}}</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row mt-5">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <form @submit.prevent="createCategory" class="form-row">
                            <div class="form-group">
                                <input class="form-control" type="text" v-model="name">
                                <span v-if="error" class="text-danger">{{error}}</span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                name: '',
                categories: [],
                error: ''
            }
        }, created() {
            this.getCategories();
        },

        methods: {
            createCategory() {
                axios.post('/api/categories', {
                    name: this.name
                }).then((res) => {
                    this.categories.push(this.name);
                    this.getCategories();
                    this.name = ''
                }).catch(err => {
                    console.log(err)
                })
            },
            getCategories() {
                axios.get('/api/categories')
                    .then(res => {
                        this.categories = res.data.data;
                    });
            },
        }
    }
</script>

<style scoped>

</style>
