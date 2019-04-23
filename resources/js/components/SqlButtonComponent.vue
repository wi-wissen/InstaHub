<template>
  <div style="background-color: transparent;">
    <flash :timeout="5000" :display-icons="false" transition="fade"></flash>
    <button 
        v-on:click="run()" 
        type="button" 
        v-bind:class="type" 
        class="btn">
        <div v-if="loading" class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <slot></slot>
    </button>
  </div>
</template>

<script>
export default {
  props: [
    "tables",
    "action",
    "hub",
    "type"
  ],
  data() {
    return {
      loading: false
    }
  },
  methods: {
    run: function() {
      self = this;
      this.loading = true;

      var table_a = this.tables.split(' ');

      axios
        .post('/api/hubs/' + this.hub + '/dba/table', {
            action: this.action,
            tables: table_a
        })
        .then(function(response) {
          self.loading = false;
          response.data.forEach(function(element) {
            flash(element, "success");
          }); 
        })
        .catch(function(error) {
          self.loading = false;
          flash(
              "Sorry, you can't " + self.action + " " + self.tables.toString() + " on " + self.hub + ".",
              "error"
           );
        }); 
    }
  }
};
</script>

<style scoped>
.spinner-border {
    width: 1rem;
    height: 1rem;
}
</style>