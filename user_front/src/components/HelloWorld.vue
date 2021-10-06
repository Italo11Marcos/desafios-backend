<template>
  <div class="app">
    <h1>{{ msg }}</h1>
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th>
            Nome
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" v-bind:key="user">
          <td>{{ user.name }}d</td>
        </tr>
      </tbody>
    </table>

  </div>
</template>

<script>
export default {
  name: 'App',
  components: {
    HelloWorld
  },
  data() {
    return{
      users: [],
    }
  },

  created() {
    this.axios.get('http://127.0.0.1:8000/users/').then((response)=>{
      this.users=response.data;
    });
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
