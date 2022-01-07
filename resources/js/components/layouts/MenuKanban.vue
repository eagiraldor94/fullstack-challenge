<template>
  <div>
    <b-navbar toggleable="lg" type="light" variant="default">
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item-dropdown text="KanbanBoard" right>
            <b-dropdown-item href="#">KanbanBoard</b-dropdown-item>
          </b-nav-item-dropdown>
          <b-nav-item href="#"><i class="fas fa-braille"></i> Board</b-nav-item>
          <b-nav-item href="#"><i class="fas fa-signal"></i> Analytics</b-nav-item>
          <b-nav-item href="#"><i class="fas fa-archive"></i> Archive</b-nav-item>
          <b-nav-item href="#"><i class="fas fa-cog"></i> Settings</b-nav-item>
          <b-nav-item @click="logout" href="#"><i class="fas fa-sign-out-alt"></i> Exit</b-nav-item>
          <b-nav-item href="#" disabled><small>feedback | tools<i class="fas fa-caret-down"></i></small></b-nav-item>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-form>
            <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
            <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
          </b-nav-form>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
  export default {
    name: 'MenuKanban',
    methods: {
      logout(){
        this.$store.commit('cleanState')
        this.$router.push({name: 'login'})
      }
    }
  }
</script>