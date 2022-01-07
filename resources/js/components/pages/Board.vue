<template>
  <div>
    <menu-kanban />
    <b-container>
      <board-table />
    </b-container>
    <board-modal />
    <done-modal />
  </div>
</template>
<script type="application/javascript">

  import MenuKanban from './../layouts/MenuKanban.vue'
  import BoardTable from './../items/BoardTable.vue'
  import BoardModal from './../items/BoardModal.vue'
  import DoneModal from './../items/DoneModal.vue'


  export default {
    name: 'Board',
    components: {'menu-kanban': MenuKanban,'board-table':BoardTable,'board-modal':BoardModal,'done-modal':DoneModal},
    created() { 
      // Initial load of users for form
        fetch('/api/users/get', {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer ' + this.$store.state.userApiToken
            }
          })
        .then((res) => {
          return res.json()
        }).then((resjson) => {
          this.$store.commit('updateUsers',resjson)
        })

        // Initial load of card
        fetch('/api/cards/get', {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer ' + this.$store.state.userApiToken
            }
          })
        .then((res) => {
          return res.json()
        }).then((resjson) => {
          this.$store.commit('updateCards', resjson)
        })

    }
  }
</script>