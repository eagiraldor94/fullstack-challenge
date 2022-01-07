<template>
  <b-row class="text-center">
    <b-col>
      <table class="w-100">
        <tr>
          <td rowspan="2" class="kanban-header"><i class="fas fa-plus"></i></td>
          <td colspan="2" class="kanban-header">- Doing</td>
          <td rowspan="2" class="kanban-header">- Done</td>
        </tr>
        <tr>
          <td class="kanban-header">- Buffer</td>
          <td class="kanban-header">- Working</td>
        </tr>
        <tr>
          <td class="kanban-header"><div class="vertical-text">To do</div></td>
          <td>
            <div class="buffer-container" @drop="updateCategory($event,1)">
              <b-row class="board-row">
                <div class="board-actions">
                  <span @click="cleanAndOpen" class="add-task"><i class="fas fa-plus"></i> add task</span>
                </div>
              </b-row>
              <div class="cards-container" v-for="(c,i) in cardsBuffer" :key="i">
                <board-card v-bind:card="c"/>
              </div>
            </div>
          </td>
          <td>
            <div class="working-container" @drop="updateCategory($event,2)">
              <b-row class="board-row">
                <div class="board-actions">
                  <span @click="cleanAndOpen" class="add-task"><i class="fas fa-plus"></i> add task</span>
                </div>
              </b-row>
              <div class="cards-container" v-for="(c,i) in cardsWorking" :key="i">
                <board-card v-bind:card="c"/>
              </div>
            </div>
          </td>
          <td>
            <div class="done-container" @drop="updateCategory($event,3)">
              <b-row class="board-row">
                <div class="board-actions-done">
                  <span class="archived-tasks"><i class="fas fa-plus"></i> 30 archived tasks</span>
                  <span @click="cleanAndOpen" class="add-task"><i class="fas fa-plus"></i> add task</span>
                </div>
              </b-row>
              <div class="cards-container" v-for="(c,i) in cardsDone" :key="i">
                <board-card v-bind:card="c"/>
              </div>
            </div>
          </td>
        </tr>
      </table>
    </b-col>
  </b-row>
</template>
<script type="application/javascript">
  import BoardCard from './BoardCard.vue'
  import {mapState} from 'vuex'
  export default {
    name: 'BoardTable',
    components: {'board-card':BoardCard},
    computed: Object.assign({
      task: {
        get () {
          return this.$store.state.activeTask
        },
        set (value) {
          this.$store.commit('updateActiveTask', value)
        }
      },
      asignee: {
        get () {
          return this.$store.state.activeAsignee
        },
        set (value) {
          this.$store.commit('updateActiveAsignee', value)
        }
      },
      category: {
        get () {
          return this.$store.state.activeCategory
        },
        set (value) {
          this.$store.commit('updateActiveCategory', value)
        }
      },
      dateEnd: {
        get () {
          return this.$store.state.activeDateEnd
        },
        set (value) {
          this.$store.commit('updateActiveDateEnd', value)
        }
      },
      color: {
        get () {
          return this.$store.state.activeColor
        },
        set (value) {
          this.$store.commit('updateActiveColor', value)
        }
      }}, 
      mapState(['users', 'userApiToken','activeTask','activeColor','activeAsignee','modalTitle','activeCategory','activeDateEnd','cardsBuffer','cardsWorking','cardsDone'])),
    methods: {
      triggerApi(){
        this.$store.commit('triggerApiAndUpdate')
      },
      updateCategory($event,category){
       this.$store.commit('updateActiveCategory', card.category_id)
       this.triggerAPI()
       if (parseInt(category) === 3) {
        this.$bvModal.show('done-modal')
       }
      },
      cleanAndOpen($event,card){
       this.$store.commit('updateActiveCardId', "")
       this.$store.commit('updateActiveAsignee', 1)
       this.$store.commit('updateActiveColor', "yellow")
       this.$store.commit('updateActiveCategory', 1)
       this.$store.commit('updateActiveDateEnd', "")
       this.$store.commit('updateActiveTask', "")
       this.$store.commit('updateModalTitle', "Add Task")
       this.$bvModal.show('kanban-modal')
      },
    }
  }
</script>
<style lang="scss" scoped>
  table {
    border: 1px solid #000;
    border-collapse: separate;
    border-left: 0;
    border-top: 0;
    border-radius: 10px;
    border-spacing: 0px;
  }
  tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
  }
  td {
    padding: 5px 4px 6px 4px; 
    text-align: left;
    vertical-align: top;
    border-left: 1px solid #000; 
    border-top: 1px solid #000;    
  }
  tr:first-child td:first-child {
    border-radius: 10px 0 0 0;
  }
  tr:first-child td:last-child {
    border-radius: 0 10px 0 0;
  }
  tr:last-child td:first-child {
    border-radius: 0 0 0 10px;
  }
  .board-actions {
    font-size: 12px;
    color: green !important;
    align-self: flex-end !important;
    padding-left: 60% !important;
  }
  .board-actions-done {
    font-size: 12px;
    color: green !important;
    align-self: flex-end !important;
    padding-left: 20% !important;
  }
  .board-row {
    display: flex !important;
    align-items: flex-end !important;
  }
  .vertical-text {
     transform: rotate(-90deg);
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
  }
  td.kanban-header{
    background-color: #999 !important;
  }
</style>