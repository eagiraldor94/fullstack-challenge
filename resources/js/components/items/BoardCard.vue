<template>
  <b-card v-bind:style="{backgroundColor: card.color}" v-bind:class="{'text-center':true, 'p-0':true, 'mx-2':true, 'mb-1':true, 'text-red':(0>0)}">
    <b-card-body draggable @dragstart="updateFormValues($event, card)" @click="updateFormValuesAndOpen($event,card)">
      {{card.task}}
    </b-card-body>
  </b-card>
</template>
<script type="application/javascript">

  export default {
    name: 'BoardCard',
    props: {
        card: {
            type: Object,
            required: true
        }
    },
    methods: {
      updateFormValues($event,card){
       this.$store.commit('updateActiveCardId', card.id)
       this.$store.commit('updateActiveAsignee', card.user_id)
       this.$store.commit('updateActiveColor', card.color)
       this.$store.commit('updateActiveCategory', card.category_id)
       this.$store.commit('updateActiveEndDate', card.end_date)
       this.$store.commit('updateActiveTask', card.task)
      },
      updateFormValuesAndOpen($event,card){
        this.updateFormValues($event,card)
        this.$store.commit('updateModalTitle', "Modify Task")
        this.$bvModal.show('kanban-modal')
      },
    }
  }
</script>
<style lang="scss" scoped>
  .text-red{
    color: red !important;
  }
</style>