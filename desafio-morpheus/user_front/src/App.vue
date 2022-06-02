<template>
  <div class="app">
    <img alt="Vue logo" src="./assets/logo.png">
    <tr v-for="user in users" v-bind:key="user">
          <td>{{ user.name }}</td>
    </tr>
    <form v-on:submit.prevent="submitForm">
      <input type="text" v.model="form.name" >
      <button type="submit">Enviar</button>
    </form>
  </div>
</template>

<script>


export default {
  name: 'app',

  data() {
    return{
      users: [],
      name: '',
    }
  },

  methods:{
    submitForm(){
      this.axios.post('http://127.0.0.1:8000/users/', {name: this.name}).then((response) => {
        alert(response.data);
      }).catch(error => {
        console.log(this.name)
        console.log(error.response);
      });
    }
  },

  created() {
    this.axios.get('http://127.0.0.1:8000/users/').then((response)=>{
      this.users=response.data;
    });
  }
}
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
