<template>
    <div>
        <div class="card text-white bg-dark mb-3" v-for="category in categories" :key="category.id">
            <router-link class="btn btn-success" :to="{name: 'post-category', params: {category_id: category.id}}">
            <img class="card-img-top" src='/images/categoryIcon.png'/>
            <div class="card-body">
                <h5 class="card-title text-center">{{category.title}}</h5>
            </div>
            </router-link>
        </div>
    </div>
</template>
<script>
export default {
    created() {
        this.getCategories();
    },
    methods:{
        getCategories: function(){
            fetch('/api/category/all').then(response => response.json())
            .then(json => this.categories = json.data);
        },
    },
      data: function () {
      return {
          categories: ""
      };
    },
};
</script>
