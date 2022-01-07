import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
	state: {
		activeCardId: 0,
		activeAsignee: 0,
		activeTask: null,
		activeColor: 'yellow',
		activeCategory: 1,
		modalTitle: 'Add Task',
		activeEndDate: null,
		isAuthenticated: false,
		userApiToken: null,
		users: {},
		cardsBuffer: [],
		cardsWorking: [],
		cardsDone: []
	},
	mutations: {
		updateModalTitle(state, titleText){
			state.modalTitle = titleText
		},
		updateActiveTask(state, taskText){
			state.activeTask = taskText
		},
		updateActiveCardId(state, cardId){
			state.activeCardId = cardId
		},
		updateActiveAsignee(state, asignee){
			state.activeAsignee = asignee
		},
		updateActiveCategory(state, category){
			state.activeCategory = category
		},
		updateActiveEndDate(state, endDate){
			state.activeEndDate = endDate
		},
		updateActiveColor(state, color){
			state.activeColor = color
		},
		cleanState(state){
			state.activeAsignee = 0
			state.activeTask = null
			state.activeColor = 'yellow'
			state.activeCategory = 1
			state.modalTitle = 'Add Task'
			state.activeEndDate = null
			state.isAuthenticated = false
			state.userApiToken = null
			state.users = {},
			state.cardsBuffer = [],
			state.cardsWorking = [],
			state.cardsDone = []
		},
		updateCards(state, payload){
			state.cardsBuffer = payload.buffer
			state.cardsWorking = payload.working
			state.cardsDone = payload.done
		},
		updateUsers(state, payload){
			state.users = payload
		},
		loginUser(state, apiKey){
			state.isAuthenticated = true
			state.userApiToken = apiKey
		}
	},
	actions: {
		postCard(context, payload){
			fetch('/api/cards/post', {
			    method: 'POST',
			    body: JSON.stringify({
					'id': context.state.activeCardId,
					'task': context.state.activeTask,
					'category_id': context.state.activeCategory,
					'user_id': context.state.activeAsignee,
					'end_date': context.state.activeEndDate,
					'color': context.state.activeColor,
				}), 
			    headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',			      
              'Authorization': 'Bearer ' + context.state.userApiToken
			    }
			  })
			.then((res) => {
				return res.json()
			})
			.then((resjson) => {
				context.commit('updateCards',resjson)
			})
		}
	} 

})

export default store