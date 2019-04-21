<template>
  <div style="background-color: transparent;">
    <vue-progress-bar></vue-progress-bar>
    <flash :timeout="5000" :display-icons="false" transition="fade"></flash>
    <button v-if="!isfollowing" v-on:click="follow()" type="button" class="btn btn-success">Follow</button>
    <button v-else v-on:click="unfollow()" type="button" class="btn btn-outline-danger">Unfollow</button>
  </div>
</template>

<script>
export default {
  props: [
    "id",
    "isfollowing"
  ],
  methods: {
    follow: function() {
      self = this;
      this.$Progress.start();
      axios
        .post("/api/user/follow/" + this.id, {})
        .then(function(response) {
          self.isfollowing = true;
          self.$Progress.finish();
        })
        .catch(function(error) {
          self.$Progress.fail();
          flash(
              Vue.prototype.$t("Sorry, you can't follow this User."),
              "error"
           );
        }); 
    },
    unfollow: function() {
      self = this;
      this.$Progress.start();
      axios
        .delete("/api/user/follow/" + this.id, {})
        .then(function(response) {
          self.isfollowing = false;
          self.$Progress.finish();
        })
        .catch(function(error) {
          self.$Progress.fail();
          flash(
              Vue.prototype.$t("Sorry, you can't follow this User."),
              "error"
           );
        }); 
    }
  }
};
</script>

<style scoped>

</style>