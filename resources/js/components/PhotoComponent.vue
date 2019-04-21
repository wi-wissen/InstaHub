<template>
  <div class="card">
    <vue-progress-bar></vue-progress-bar>
    <flash :timeout="5000" :display-icons="false" transition="fade"></flash>
    <div class="card-body">
      <h5 class="card-title">
          <img class="rounded-circle img-thumbnail" v-bind:src="'/'+photo.owner.avatar" v-bind:alt="'/'+photo.owner.avatar"> 
          <a v-bind:href="'/user/'+photo.owner.username">{{ photo.owner.username }}</a>
      </h5>

      <img v-bind:src="'../'+photo.url" class="img-fluid photo" />

      <div class="controls">
        <span v-if="!readonly && photo.comments" v-on:click.stop.prevent="showinput= !showinput" class="svgbutton">
            <img src="/clarity/chat-bubble-line.svg" alt="">
        </span>

        <span v-if="!readonly && photo.likes" v-on:click.stop.prevent="like()" class="svgbutton align-middle">
            <img v-if="photo.like" src="/clarity/heart-solid.svg" alt="">
            <img v-else src="/clarity/heart-line.svg" style="fill:red" alt="">
        </span>
        <span>
            {{photo.likes}} likes
        </span>

        <button v-if="admin" :disabled="!!readonly" class="btn btn-outline-danger btn-sm float-right">Delete</button>
      </div>

      <a v-if="ad" :href="ad.url">
        <img class="ad" :src="ad.img" :alt="ad.name"/>
      </a>

      <div class="comments">
        <p>
          <b><a :href="'/user/' + photo.owner.username">{{ photo.owner.username }}</a></b>: <b v-html="photo.description"></b>
        </p>
        <div v-if="photo.comments">
            <p v-for="(comment, index) in photo.comments" v-bind:key="'comment' + index">
            <b><a :href="'/user/'+ comment.owner.username">{{ comment.owner.username }}</a></b>: <span v-html="comment.text"></span>
            <a v-if="!readonly && admin" v-on:click.stop.prevent="deleteComment(index)" href="#" class="float-right" >
                <span>x</span>
            </a>
            </p>
        </div>
        
      </div>


      <div class="input-group" v-if='showinput' >
        <input type="text" class="form-control" v-model="comment" id="comment" placeholder="Add a Comment" aria-label="Comment" aria-describedby="basic-addon2" >
        <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" v-on:click.stop.prevent="postComment()">Comment</button>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  props: [
    "photo",
    "readonly",
    "ad",
    "admin"
  ],
  data: function() {
    return {
      comment: "",
      showinput: false
    };
  },
  computed: {},
  methods: {
    like: function() {
      self = this;
      this.$Progress.start();
      axios
        .post("/api/like/" + this.photo.id, {})
        .then(function(response) {
          self.photo.like = (response.data.like == 'true');
          if (response.data.like == 'true') {
              self.photo.likes = self.photo.likes+1
          }
          else {
              self.photo.likes = self.photo.likes-1
          }
          self.$Progress.finish();
        })
        .catch(function(error) {
          self.$Progress.fail();
          flash(
              Vue.prototype.$t("Sorry, we can't save your Like."),
              "error"
           );
        }); 
    },
    postComment: function() {
      self = this;
      this.$Progress.start();
      axios
        .post("/api/comment/" + this.photo.id, {
          comment: this.comment
        })
        .then(function(response) {
          self.photo.comments.push(response.data.data);
          self.$Progress.finish();
          self.comment='';
          self.showinput=false;
        })
        .catch(function(error) {
          self.$Progress.fail();
          flash(
              Vue.prototype.$t("Sorry, we can't save your Comment."),
              "error"
            );
        });
    },
    deleteComment: function(key) {
      self = this;
      this.$Progress.start();
      axios
        .delete("/api/comment/" + this.photo.comments[key].id, {})
        .then(function(response) {
          self.photo.comments.splice(key, 1);
          self.$Progress.finish();
        })
        .catch(function(error) {
          self.$Progress.fail();
          flash(
              Vue.prototype.$t("Sorry, we can't delete this Comment."),
              "error"
            );
        });
    }
  }
};
</script>

<style scoped>
.card-body{
    padding:1rem 0;
}

h5{
    padding-left:1rem
}

.card-title img {
    height:50px;
    width:50px;
}

.card-title a {
    color: #333
}

.photo{
    display: block;
    margin: 0 auto;
}
		
		
.svgbutton img{
    height:24px;
    width:24px;
}

.svgbutton:hover {
    cursor: pointer;
}
		
.ad{
    width:100%;
    margin-top: -5px;
    margin-bottom: 20px;
}

.comments p{
    margin-bottom: 0.3rem;
}

.controls {
    margin: 1rem;
}

.comments {
    margin: 0 1rem;
}

.input-group{
    padding: 1rem;
}
</style>