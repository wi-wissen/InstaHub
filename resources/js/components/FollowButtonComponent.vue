<template>
  <div style="background-color: transparent;">
    <vue-progress-bar></vue-progress-bar>
    <flash :timeout="5000" :display-icons="false" transition="fade"></flash>
    <button v-if="!isfollowing" v-on:click="follow()" :disabled="!!readonly" type="button" class="btn btn-success">{{ $t('Follow') }}</button>
    <button v-else v-on:click="unfollow()" :disabled="!!readonly" type="button" class="btn btn-outline-danger">{{ $t('Unfollow') }}</button>
  </div>
</template>

<script>
export default {
  props: [
    "username",
    "isfollowing"
  ],
  methods: {
    follow: function() {
      self = this;
      this.$Progress.start();
      axios
        .post("/api/me/follow/" + this.username, {})
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
        .delete("/api/me/follow/" + this.username, {})
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