import { createRouter, createWebHistory } from 'vue-router'
import LoginPagev2 from '@/components/LoginPagev2.vue'
import Dashboard from '@/components/Dashboard.vue'

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: LoginPagev2
  },
  {
    path: '/',
    name: 'Dashboard',
    component: Dashboard,
    meta: { requiresAuth: true }
  }
  // Nanti bisa tambah route lain
  // {
  //   path: '/dashboard',
  //   name: 'Dashboard',
  //   component: () => import('@/components/Dashboard.vue')
  // }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('auth_token');
  
  if (to.meta.requiresAuth && !token) {
    // Jika route membutuhkan autentikasi dan tidak ada token, arahkan ke login
    next({ name: 'Login' });
  } else {
    next();  // Biarkan navigasi dilanjutkan
  }
});

export default router