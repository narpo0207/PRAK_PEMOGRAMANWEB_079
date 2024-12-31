import { createRouter, createWebHistory } from "vue-router";

// Home View
import Home from "../views/home.vue";

// Projects Views
import ProjectsIndex from "../views/Projects/index.vue";
import ProjectsCreate from "../views/Projects/create.vue";
import ProjectsEdit from "../views/Projects/edit.vue";

// Orders Views
import OrdersIndex from "../views/Orders/index.vue";
import OrdersCreate from "../views/Orders/create.vue";
import OrdersEdit from "../views/Orders/edit.vue";

const routes = [
  { path: "/", name: "home", component: Home },
  // Project Routes
  { path: "/projects", name: "ProjectsIndex", component: ProjectsIndex },
  { path: "/projects/create", name: "ProjectsCreate", component: ProjectsCreate },
  { path: "/projects/:id/edit", name: "ProjectsEdit", component: ProjectsEdit },
  // Orders Routes
  { path: "/orders", name: "OrdersIndex", component: OrdersIndex },
  { path: "/orders/create", name: "OrdersCreate", component: OrdersCreate },
  { path: "/orders/:id/edit", name: "OrdersEdit", component: OrdersEdit },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
