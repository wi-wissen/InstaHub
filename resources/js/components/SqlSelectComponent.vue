
<template>
  <div style="background-color: transparent;">
    <vue-progress-bar></vue-progress-bar>
    <flash :timeout="5000" :display-icons="false" transition="fade"></flash>

    <label for="tables">{{ $t('Pick Tables') }}</label>
    <vue-taggable-select
        class="form-vue-select"
        id="tables"
        name="tables"
        placeholder=""
        v-model="sql.tables"
        :options="tablenames"
    ></vue-taggable-select>

    <div>
        <div class="custom-control custom-control-inline custom-checkbox" v-if="sql.tables.length" >
            <input v-model="settings.attributes" type="checkbox" class="custom-control-input" id="attributes" name="attributes">
            <label class="custom-control-label" for="attributes">{{ $t('Filter Attributes') }}</label>
        </div>
        <div class="custom-control custom-control-inline custom-checkbox" v-if="sql.tables.length" >
            <input v-model="settings.rows" type="checkbox" class="custom-control-input" id="rows" name="rows">
            <label class="custom-control-label" for="rows">{{ $t('Filter Rows') }}</label>
        </div>
        <div class="custom-control custom-control-inline custom-checkbox" v-if="sql.tables.length" >
            <input v-model="settings.expert" type="checkbox" class="custom-control-input" id="expert" name="expert">
            <label class="custom-control-label" for="expert">{{ $t('Expert') }}</label>
        </div>
        <div class="custom-control custom-control-inline custom-checkbox" v-if="sql.tables.length" >
            <input v-model="settings.showsql" type="checkbox" class="custom-control-input" id="showsql" name="showsql">
            <label class="custom-control-label" for="showsql">{{ $t('Show SQL') }}</label>
        </div>
    </div>
    <label v-if="sql.tables.length && settings.attributes" for="attr">{{ $t('Pick Attribute') }}</label>
    <vue-taggable-select
        class="form-vue-select"
        id="attr"
        v-if="sql.tables.length && settings.attributes"
        name="attributes"
        placeholder=""
        v-model="sql.attrs"
        :options="attr"
    ></vue-taggable-select>

    <label v-if="sql.tables.length && settings.rows" for="rules">{{ $t('Filter Entrys') }}</label>
    <vue-query-builder 
        v-if="sql.tables.length && settings.rows" 
        :rules="rules"
        v-model="sql.rules"
    ></vue-query-builder>

    <div class="custom-control custom-checkbox" v-if="sql.tables.length && settings.expert" >
        <input v-model="sql.distinct" type="checkbox" class="custom-control-input" id="distinct" name="distinct">
        <label class="custom-control-label" for="distinct">{{ $t('Distinct') }}</label>
    </div>

    <div class="row form-vue-select" v-if="sql.tables.length && settings.expert">
        <div class="col-auto">
            <label for="attr">{{ $t('Order By') }}</label>
        </div>
        <div class="col">
            <vue-single-select   
                v-model="sql.orderBy.attr" 
                :options="attr"
                name="orderByAttr"
                placeholder=""
            ></vue-single-select>
        </div>
        <div class="col">
            <vue-single-select     
                v-model="sql.orderBy.direction" 
                :options="[{title: $t('ascending'), id: 'ASC'}, {title: $t('descanding'), id: 'DESC'}]"
                option-label="title"
                name="orderByDirection"
                placeholder=""
            ></vue-single-select>
        </div>
    </div>

    <div class="row form-vue-select" v-if="sql.tables.length && settings.expert">
        <div class="col-auto">
            <label for="attr">{{ $t('Group By') }}</label>
        </div>
        <div class="col">
            <vue-single-select     
                class="form-vue-select" 
                v-model="sql.groupBy" 
                :options="attr"
                name="groupBy"
                placeholder=""
            ></vue-single-select> 
        </div>
    </div>

    <div v-if="!sql.valid" class="alert alert-danger" role="alert">
       {{ $t('Your Search is not valid!') }}
    </div>

    <pre v-if="sql.tables.length" v-bind:class="{ 'd-none': !settings.showsql }">{{query}}</pre>
  </div>
</template>

<script>
import VueQueryBuilder from './vue-query-builder/VueQueryBuilder.vue';
import VueTaggableSelect from "./vue-select/VueTaggableSelect.vue";
import VueSingleSelect from "./vue-select/VueSingleSelect.vue";
export default {
  components: {
     VueQueryBuilder,
     VueTaggableSelect,
     VueSingleSelect
  },
  props: [
    "value"
  ],
  data() {
    return {
      tables: [],
      sql: {
          forceUpdate: Date.now(),
          tables: [],
          attrs: [],
          orderBy: {
              attr: '',
              direction: ''
          },
          groupBy: '',
          distinct: false,
          rules: {},
          valid: true
      },
      settings: {
          showsql: false,
          rows: false,
          entitys: false,
          expert: false
      }
    }
  },
  computed: {
      tablenames: function() {
          var arr = [];
          for (let key in this.tables) {
            arr.push(key);
          } 
          return arr;
      },
      attr: function() {
          var arr = [];
          if (this.sql.tables.length == 1) {
              //no need to prefix collumns
              for (let entry of this.tables[this.sql.tables[0]]) {
                arr.push(entry);
              }
          }
          else {
              //prefix collumn
              for (let t of this.sql.tables) {
                for (let entry of this.tables[t]) {
                  arr.push(t + '.' + entry);
                }
              }
          }

          return arr;
      },
      rules: function() {
          var arr = [];
          for (let a of this.attr) {
            arr.push({type: "text", id: a, label: a,})
          }
          return arr;
      },
      query: function() {
          var sql = "SELECT ";
          //DISTINCT
          if (this.sql.distinct) sql = sql + "DISTINCT ";

          //SELECT
          if (this.sql.attrs.length) {
              //only selected
              for (let attr of this.sql.attrs) {
                    if (this.sql.groupBy && this.sql.groupBy != attr) {
                        //count this attribute
                        sql = sql + "COUNT(" + attr + ") AS 'COUNT "+ attr +"', "
                    }
                    else {
                        sql = sql + attr + ", "
                    }
                }
                sql = sql.substring(0, sql.length-2);
          }
          else {
              //all
              sql = sql + "*";
          }
          sql = sql + "\n";

          //FROM
          sql = sql + "FROM ";
            for (let table of this.sql.tables) {
                sql = sql + table + ", "
            }
            sql = sql.substring(0, sql.length-2);
             sql = sql + "\n";


          //WHERE
          var where = ''
          if (this.sql.rules.hasOwnProperty('children')) where = parseQuery(this.sql.rules); //if rules are set

          function parseQuery(a) {
              let str = '';
              if (a.hasOwnProperty('children')) {
                  //group
                    for (let index = 0; index < a.children.length; ++index) {
                        if (a.children[index].query.hasOwnProperty("rule")) {
                            //it's a rule
                            if (!!a.children[index].query.value) { //valid rule
                                var operator = '';
                                switch(a.children[index].query.selectedOperator) {
                                    case Vue.prototype.$t('equals'):
                                        operator = '=';
                                        break;
                                    case Vue.prototype.$t('does not equal'):
                                        operator = '!=';
                                        break;
                                    case Vue.prototype.$t('contains'):
                                        operator = 'LIKE';
                                        break;
                                    case Vue.prototype.$t('does not contain'):
                                        operator = 'NOT LIKE';
                                        break;
                                    case Vue.prototype.$t('smaller'):
                                        operator = '<';
                                        break;
                                    case Vue.prototype.$t('bigger'):
                                        operator = '>';
                                        break;
                                    default:
                                        operator = '=';
                                }
                                var v = a.children[index].query.value

                                if (isNaN(parseFloat(v))) v = '"' + v + '"'; //not a number

                                str = str + a.children[index].query.selectedOperand + ' ' + operator + v + '\n';

                                if (index + 1 != a.children.length) {
                                    if (!!a.children[index + 1].query.value) {
                                        str = str + ((a.logicalOperator == Vue.prototype.$t('all')) ? 'AND ' : 'OR ');  
                                    }
                                }  
                            }
                        }
                        else {
                            //it's a new group
                            var group = parseQuery(a.children[index].query);
                            if (!!group) {
                                if(!str) {
                                    //first results
                                    str = group;
                                }
                                else {
                                    //add
                                    str = str + ((a.logicalOperator == 'all') ? 'AND \n' : 'OR \n') + "(" + group + ")";
                                }
                                
                            }                                
                        }
                    }
                }
                else {
                    //it's a rule
                    if (!!a.children[index].query.value) {
                        var operator = '';
                        switch(a.children[index].query.selectedOperator) {
                            case 'equals':
                                operator = '=';
                                break;
                            case 'does not equal':
                                operator = '!=';
                                break;
                            case 'contains':
                                operator = 'LIKE';
                                break;
                            case 'does not contain':
                                operator = 'NOT LIKE';
                                break;
                            case 'smaller':
                                operator = '<';
                                break;
                            case 'bigger':
                                operator = '>';
                                break;
                            default:
                                operator = '=';
                        }
                        var v = a.children[index].query.value

                        if (isNaN(parseFloat(v))) v = '"' + v + '"'; //not a number

                        str = str + a.children[index].query.selectedOperand + ' ' + operator + ' "' + v + '"\n';

                        if (index + 1 != a.children.length) {
                            if (!!a.children[index + 1].query.value) {
                                str = str + ((a.logicalOperator == 'all') ? 'AND ' : 'OR ');  
                            }
                        }
                    }
                }

                return str;
          }


          //JOIN
          var join = '';
          if (this.sql.tables.includes('users') && this.sql.tables.includes('photos')) join = join + 'AND users.id = photos.user_id\n';
          if (this.sql.tables.includes('users') && this.sql.tables.includes('follows')) join = join + 'AND users.id = follows.following_id\n';
          if (this.sql.tables.includes('users') && this.sql.tables.includes('likes')) join = join + 'AND users.id = likes.user_id\n';
          if (this.sql.tables.includes('users') && this.sql.tables.includes('comments')) join = join + 'AND users.id = comments.user_id\n';
          if (this.sql.tables.includes('tags') && this.sql.tables.includes('photos')) join = join + 'AND photos.id = tags.photo_id\n';
          if (this.sql.tables.includes('likes') && this.sql.tables.includes('photos')) join = join + 'AND photos.id = likes.photo_id\n';
          if (this.sql.tables.includes('comments') && this.sql.tables.includes('photos')) join = join + 'AND photos.id = comments.photo_id\n';
          if (this.sql.tables.includes('users') && this.sql.tables.includes('analytics')) join = join + 'AND users.id = analytics.user_id\n';
          if (this.sql.tables.includes('photos') && this.sql.tables.includes('analytics')) join = join + 'AND photos.id = analytics.photo_id\n';
          if (join.length>3) join = join.substr(4,join.length-4);
          console.log(join);

          //validate
          if (!join && this.sql.tables.length>1) {
               this.sql.valid=false;
          }
          else {
               this.sql.valid=true;
          }

          //WHERE, JOIN
          if(!where) {
              if (!!join) sql = sql + 'WHERE ' + join
          }
          else {
              if (!join) {
                  sql = sql + 'WHERE ' + where;
              }
              else {
                  sql = sql + 'WHERE (' + where + ') AND ' + join;
              }
          } 

          //GROUP BY
          if (this.sql.groupBy) {
              sql = sql + "GROUP BY " + this.sql.groupBy;
              sql = sql + "\n";
          }


          //ORDER BY
          if (this.sql.orderBy.attr) {
              sql = sql + "ORDER BY " + this.sql.orderBy.attr + " " + this.sql.orderBy.direction.id;
              sql = sql + "\n";
          }

        if(!this.sql.valid) sql='';

        this.$emit('input', sql); //sync
        return sql;
      }
  },
  created: function () {
      self = this;
      this.$Progress.start();
      axios
        .get("/api/sql/tables", {})
        .then(function(response) {
          self.tables = response.data; // can't be tracked
          self.forceUpdate = Date.now(),
          self.$Progress.finish();
        })
        .catch(function(error) {
          self.$Progress.fail();
          flash(
              Vue.prototype.$t("Sorry, we can't load the Database Model."),
              "error"
            );
        });
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
.form-vue-select {
    padding-bottom: 1em;
}

.custom-control {
    padding-bottom: 1em;
}
</style>