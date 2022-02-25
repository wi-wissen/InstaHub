<template>
<div>
    <vue-bootstrap-typeahead
        v-model="query"
        :data="users"
        :serializer="item => item.username"
        :placeholder="$t('Search Users')"
        @hit="showUser"
    >

    <!-- Begin custom suggestion slot -->
    <template slot="suggestion" slot-scope="{ data, htmlText }">
    <div class="d-flex align-items-center">
        <img
        class="rounded-circle"
        :src="'/' + data.avatar"
        style="width: 40px; height: 40px;" />

        <!-- Note: the v-html binding is used, as htmlText contains
            the suggestion text highlighted with <strong> tags -->
        <span class="ml-4" v-html="htmlText"></span> 
    </div>
    </template>
    </vue-bootstrap-typeahead>
</div>
</template>

<script>
import VueBootstrapTypeahead from "vue-bootstrap-typeahead";
export default {
  components: {
    VueBootstrapTypeahead
  },
  data() {
    return {
      query: '',
      users: []
    }
  },
  methods: {
    searchUsers(newQuery) {
      axios.get(`/api/users/search/${newQuery}`)
        .then((res) => {
          this.users = res.data.data;
        })
    },
    showUser() {
        window.location.href = "/" + this.query;
    }
  },
  watch: {
    // When the query value changes, fetch new results from
    // the API - debounce the search to avoid hitting the API limits
    query: _.debounce(function(newQuery) { this.searchUsers(newQuery) }, 250)
  },
  filters: {
    stringify(value) {
      return JSON.stringify(value, null, 2)
    }
  },
};
</script>

<style scoped>

</style>