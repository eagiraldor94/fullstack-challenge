<template>
  <b-modal id="kanban-modal" hide-footer v-bind:title="modalTitle">
    <b-form id="task-form"@>
      <b-form-group
        id="task"
        label="Task description:"
        label-for="input-task"
        description="Please write the task to be assigned."
      >
        <b-form-textarea
          id="input-task"
          v-model="task"
          required
        ></b-form-textarea>
      </b-form-group>

      <b-form-group id="category" label="Category:" label-for="input-category">
        <b-form-select
          id="input-category"
          v-model="category"
          :options="categories"
          required
        ></b-form-select>
      </b-form-group>

      <b-form-group id="asignee" label="Asignee:" label-for="input-asignee">
        <b-form-select
          id="input-asignee"
          v-model="asignee"
          :options="users"
          required
        ></b-form-select>
      </b-form-group>

      <b-form-group id="date-end" label="Before:" label-for="input-date-end">
        <b-form-datepicker
          id="input-date-end"
          v-model="endDate"
          required
        ></b-form-datepicker>
      </b-form-group>

      <b-form-group id="color" label="Card color:" label-for="input-color">
      <b-form-input
        id="input-color"
        v-model="color"
        placeholder="Enter a valid color, text, hex code or RGB."
      ></b-form-input>
    </b-form-group>
    </b-form>
    <b-button variant="success" id="send-btn" @click="triggerApi">Update</b-button>
    <b-button variant="danger" id="close-btn" @click="$bvModal.hide('kanban-modal')">Close Modal</b-button>
  </b-modal>
</template>
<script type="application/javascript">
  import {mapState} from 'vuex'
  export default {
    name: 'BoardModal',
    data(){
      return{
        categories: [
          {text:"Buffer", value:1},
          {text:"Working", value:2},
          {text:"Done", value:3}          
        ]
      }
    },
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
      endDate: {
        get () {
          return this.$store.state.activeEndDate
        },
        set (value) {
          this.$store.commit('updateActiveEndDate', value)
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
      mapState(['users', 'userApiToken','activeTask','activeColor','activeAsignee','modalTitle','activeCategory','activeEndDate'])),
    methods: {
      triggerApi(){
        this.$store.dispatch('postCard')
        this.$bvModal.hide('kanban-modal')
       if (parseInt(this.$store.state.activeCategory) === 3) {
        this.$bvModal.show('done-modal')
       }
      }
    }
  }
</script>
<style lang="scss" scoped>
  .text-red{
    color: red !important;
  }
</style>