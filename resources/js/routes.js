import Board from './components/pages/Board.vue'
import Login from './components/pages/Login.vue'
import SignUp from './components/pages/SignUp.vue'

const routes = [
  { path: '/', component: Board, name: 'board' },
  { path: '/login', component: Login, name: 'login' },
  { path: '/signup', component: SignUp, name: 'signup' }
]

export default routes
