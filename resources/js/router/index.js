import Vue from "vue";
import Router from "vue-router";

import LoginPage from '@/components/pages/LoginPage.vue';

Vue.use(Router);

function configRoutes() {
  return [
    {
      path: "/",
      name: "Login",
      component: LoginPage,
    }
  ]
}

const router = new Router({
  mode: "history",
  linkExactActiveClass: "bg-gray-200",
  scrollBehavior: () => ({ y: 0 }),
  routes: configRoutes()
});

router.beforeEach((to, from, next) => {
  next();
});

export default router;
