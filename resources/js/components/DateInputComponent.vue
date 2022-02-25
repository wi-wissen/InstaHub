<template>
    <input v-if="isGoodBrowser"
      v-bind:value="value"
      v-bind:id="id"
      v-bind:name="name"
      v-on:input="$emit('input', $event.target.value)"
      class="form-control"
      type="date"
    >
    <div v-else>
        <datepicker
            :value="value"
            :language="lang"
            :format="format"
            :bootstrap-styling="true"
            :clear-button="true"
            v-on:input="formatedEmit($event)"
        ></datepicker>

        <input type="hidden" :id="id" :name="name" :value="formatedValue">
    </div>
    
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import {de, en} from 'vuejs-datepicker/dist/locale'

    export default {
        components: {
            Datepicker
        },
        props: ['value', 'id', 'name'],
        data: function () {
            return {
                window: window,
                en: en,
                de: de,
                formatedValue: ''
            }
        },
        computed: {
            isGoodBrowser: function() {
                var datefield = document.createElement("input")
                datefield.setAttribute("type", "date")
                if (datefield.type!="date"){ //if browser doesn't support input type="date"
                    return false;
                }
                else {
                    return true;
                }
            },
            lang: function() {
                if (this.window.navigator.language.substring(0, 2) == 'de') {
                    return this.de;
                }
                else {
                    return this.en;
                }
            },
            format: function() {
                if (this.window.navigator.language.substring(0, 2) == 'de') {
                    return "d. MMMM yyyy";
                }
                else {
                    return "dsu MMMM yyyy";
                }
            },
        },
        methods: {
            formatedEmit: function(date) {
                if(date) {
                    var _date = new Date(date);
                    _date = _date.toISOString().split('T')[0];
                    this.formatedValue = _date;
                    this.$emit('input', _date);
                }
                else {
                    this.formatedValue = "";
                    this.$emit('input', "");
                }
            }
        }
    }
</script>

<style>
.vdp-datepicker > .input-group > .form-control[readonly] {
    background: none !important;
}

.vdp-datepicker__calendar .cell.selected {
    background: #3490dc !important;
    color: white;
}

.vdp-datepicker__calendar .cell.selected:hover {
    background: #3490dc !important;
    color: white;
}

.vdp-datepicker__calendar .cell:not(.blank):not(.disabled).day:hover, .vdp-datepicker__calendar .cell:not(.blank):not(.disabled).month:hover, .vdp-datepicker__calendar .cell:not(.blank):not(.disabled).year:hover {
    border: 1px solid #3490dc !important;
}
</style>
