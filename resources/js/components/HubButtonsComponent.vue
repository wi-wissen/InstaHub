<template>
  <div style="background-color: transparent;">
    <flash :timeout="5000" :display-icons="false" transition="fade"></flash>
        <button v-on:click="setActivate(true)" v-if="!hub.activated && !hub.readonly && hub.hasWorkingUser" class="btn btn-outline-dark"><div v-if="loading.activate" class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>Activate</button>
        <a v-bind:href="'/hubs/' + hub.id" v-if="!hub.readonly" class="btn btn-primary">DB Admin</a>
        <a v-bind:href="'/hubs/' + hub.id + '/dba/redirect'" target="_blank" v-if="hub.activated && hub.hasWorkingUser" class="btn btn-outline-dark">Login as DBA</a>
        <button v-if="!hub.hasWorkingUser || !hub.activated" class="btn btn-danger" disabled>Login as DBA</button>
        <sql-button v-if="!hub.readonly" type="btn-outline-dark" v-bind:hub="hub.name" tables="photos tags likes follows comments analytics ads" action="fill" style="display: inline-block;">Fill all Tables</sql-button>
        <button v-on:click="setReadonly(false)" v-if="hub.readonly" class="btn btn-outline-dark"><div v-if="loading.readonly" class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>Run</button>
        <button v-on:click="setReadonly(true)" v-if="!hub.readonly" class="btn btn-danger"><div v-if="loading.readonly" class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>Maintenance</button>
        <button v-on:click="setActivate(false)" v-if="hub.activated" class="btn btn-danger"><div v-if="loading.activate" class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>Deactivate</button>
  </div>
</template>

<script>
export default {
  props: [
    "hub"
  ],
  data() {
    return {
      loading: {
          activate: false,
          readonly: false
      }
    }
  },
  methods: {
    setActivate: function(yes) {
      self = this;
      this.loading.activate = true;

      axios
        .post('/api/hubs/' + this.hub.name + '/dba/activate', {
            id: this.hub.id,
            activate: yes
        })
        .then(function(response) {
          self.loading.activate = false;
          self.hub.activated = yes;
        })
        .catch(function(error) {
          self.loading.activate = false;
          flash(
              "Sorry, you can't (de)activate " + self.hub.name + ".",
              "error"
           );
        }); 
    },
    setReadonly: function(yes) {
      self = this;
      this.loading.readonly = true;

      axios
        .post('/api/hubs/' + this.hub.name + '/dba/readonly', {
            id: this.hub.id,
            readonly: yes
        })
        .then(function(response) {
          self.loading.readonly = false;
          self.hub.readonly = yes;
        })
        .catch(function(error) {
          self.loading.readonly = false;
          flash(
              "Sorry, you can't change DB-User privileges for " + self.hub.name + ".",
              "error"
           );
        }); 
    },
  }
};
</script>

<style scoped>
.spinner-border {
    width: 1rem;
    height: 1rem;
}
</style>