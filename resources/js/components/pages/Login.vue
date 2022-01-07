<template>
  <div>
    <b-container>
      <b-form id="login-form"@>

        <b-form-group @keyup.enter.native="login" id="email" label="Email:" label-for="input-email">
          <b-form-input
            id="input-email"
            v-model="email"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group @keyup.enter.native="login" id="password" label="Password:" label-for="input-password">
          <b-form-input
            id="input-password"
            v-model="password" 
            type="password"
            required
          ></b-form-input>
        </b-form-group>

      </b-form>
      <b-button variant="info" id="login-btn" @click="login">Login</b-button>
      <b-button variant="danger" id="clear-btn" @click="emptyForm">Reset</b-button>
      <b-button variant="success" id="new-btn" @click="newAccount">New account</b-button>
    </b-container>
    <invalid-modal />
  </div>
</template>
<script type="application/javascript">

  import InvalidModal from './../items/InvalidModal.vue'


  export default {
    name: 'Login',
    components: {'invalid-modal':InvalidModal},
    data(){
      return{
        email: '',
        password: ''
      }
    },
    methods: {
      login(){
        if(this.email && this.password){

          var requestOptions = {
            method: 'POST',
            body: JSON.stringify({
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
          fetch('/api/login', requestOptions)
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
        this.email = ''
        this.password = ''
      },
      newAccount(){
        this.$router.push({name: 'signup'})
      }
    }
  }
</script>

<style lang="scss" scoped>
  #login-form{
    padding-top: 25% !important;
  }
</style>