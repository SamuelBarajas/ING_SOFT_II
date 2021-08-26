window.Vue = require('vue').default;
import VueRouter from 'vue-router';
import PostList from '../components/PostListComponent.vue';
import PostDetail from '../components/PostDetailComponent.vue';
import PostCategory from '../components/PostCategoryComponent.vue';
import Contact from '../components/ContactComponent.vue';
import CategoryListDefault from '../components/CategoryListDefaultComponent.vue';


Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/home', component: PostList, name: "list" },
        { path: '/home/categories', component: CategoryListDefault, name: "list-category" },
        { path: '/home/detail/:id', component: PostDetail, name: "detail" },
        { path: '/home/post-category/:category_id', component: PostCategory, name: "post-category" },
        { path: '/home/contact', component: Contact, name: "contact" },
      ] // short for `routes: routes`
  });
  