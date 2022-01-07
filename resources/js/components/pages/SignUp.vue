<template>
  <div>
    <b-container>
      <b-form id="signup-form"@>

        <b-form-group @keyup.enter.native="create" id="name" label="Name:" label-for="input-name">
          <b-form-input
            id="input-name"
            v-model="name"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group @keyup.enter.native="create" id="email" label="Email:" label-for="input-email">
          <b-form-input
            id="input-email"
            v-model="email"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group @keyup.enter.native="create" id="password" label="Password:" label-for="input-password">
          <b-form-input
            id="input-password"
            v-model="password" 
            type="password"
            required
          ></b-form-input>
        </b-form-group>

      </b-form>
      <b-button variant="info" id="create-btn" @click="create">Create</b-button>
      <b-button variant="danger" id="clear-btn" @click="emptyForm">Reset</b-button>
    </b-container>
    <invalid-modal />
  </div>
</template>
<script type="application/javascript">

  import InvalidModal from './../items/InvalidModal.vue'


  export default {
    name: 'SignUp',
    components: {'invalid-modal':InvalidModal},
    data(){
      return{
        name: '',
        email: '',
        password: ''
      }
    },
    methods: {
      create(){
        if(this.email && this.password){

          var requestOptions = {
            method: 'POST',
            body: JSON.stringify({
              'name': this.name,
              'email': this.email,
              'password': this.password,
              'device_name': 'default'
            }),
            redirect: 'follow', 
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json'
            }
          };
          console.log(requestOptions)
          fetch('/api/user/create', requestOptions)
                  .then((res) => {
                    return res.json()
                  }).then((resjson) => {
                    if(resjson.token){
                      this.$store.commit('loginUser',resjson.token)
                      this.$router.push({name: 'board'})
                    }else{
                      this.$bvModal.show('invalid-modal')
                    }
                  })
        }else{
          this.$bvModal.show('invalid-modal')
        }
      },
      emptyForm(){
        this.name = ''
        this.email = ''
        this.password = ''
      }
    }
  }
</script>

<style lang="scss" scoped>
  #signup-form{
    padding-top: 25% !important;
  }
</style>