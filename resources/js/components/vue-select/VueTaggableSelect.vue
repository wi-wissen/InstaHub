<template>
    <div :class="[classes.wrapper]" ref="taggable-select">
        <p class="border-2 mb-3 border-red-dark p-4 text-red bg-red-lightest text-bold rounded text-3xl required" v-show="errors.length">
            {{errors.join(' ')}}
        </p>
        
        <select multiple class="bordered hidden" :name="name">
            <option v-for="(option, idx) in selectedOptions" :key="idx" value="getOptionValue(option)">
                {{getOptionDescription(option)}}
            </option>
        </select>
        <div v-if="debug">
        {{selectedOptions}}
            <hr>
        </div>
        <div class="relative text-left" :class="[classes.searchWrapper]">
            <div class="rounded bordered border-grey hover:border-blue">
                <ul :class="[isRequired]"
                    class="overflow-x-scroll items-center flex flex-wrap list-reset pb-1 pr-1 m-0 text-black w-full">
                    <li v-for="(option, idx) in selectedOptions" :key="idx"
                        @click="seedSearchText"
                        class="mt-1 ml-1 mb-0 flex items-center"
                    >
                        <slot name="pill" v-bind="{option,idx}" :remove="removeOption">
                            <span :class="[classes.pill]">
                                <span class="text-sm" v-text="getOptionDescription(option)"></span>
                                <span class="pl-2 text-grey-darker mt-px" @click.stop="removeOption(idx)">
                                    <svg class="text-sm w-3 h-3 fill-current" aria-hidden="true" viewBox="0 0 512 512">
                                        <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                    </svg>
                                </span>
                            </span>
                        </slot>
                    </li>
                    <li class="flex mt-1 ml-1 mb-0 justify-between flex-1 items-center min-w-10">
                        <input type="text" ref="search"
                               class="box-size p-1  inline mr-1 w-full h-full outline-none border-none leading-tight"
                               :class="[classes.searchInput]"
                               @click="seedSearchText"
                               @keyup.enter="setPossibleOption($event)"
                               @keyup.down="movePointerDown"
                               @keydown.tab.stop="closeOut"
                               @keydown.esc.stop="searchText = null"
                               @keyup.up="movePointerUp"
                               @keyup.delete="popSelectedOption"
                               autocomplete="off"
                               :placeholder="placeholder"
                               :required="required"
                               v-model="searchText"
                        > 
                        <span v-if="taggable" class="cursor-pointer p-1 text-left flex"
                              @click="addOption($refs.search.value.trim())">
                            <svg class="w-4 h-4 fill-current" :class="searchText ? 'opacity-100' : 'opacity-25'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <path d="M26 0C11.664 0 0 11.663 0 26s11.664 26 26 26 26-11.663 26-26S40.336 0 26 0zm0 50C12.767 50 2 39.233 2 26S12.767 2 26 2s24 10.767 24 24-10.767 24-24 24z"/>
                                <path d="M38.5 25H27V14a1 1 0 1 0-2 0v11H13.5a1 1 0 1 0 0 2H25v12a1 1 0 1 0 2 0V27h11.5a1 1 0 1 0 0-2z"/>
                            </svg>
                        </span>
                        <span v-if="!taggable && forceIcons" @click.prevent="searchText = searchText !== null ? null : ''" :class="[classes.icons]" class="cursor-pointer  p-1 text-left flex text-grey-darkest">
                            <svg v-if="searchText === null" class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 448 512">
                                <path d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
                            </svg>
                            <svg v-else aria-hidden="true" viewBox="0 0 448 512" fill="green">
                                <path d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path>
                            </svg>
                        </span>
                    </li>
                </ul>
            </div>

            <ul tabindex="-1" ref="options" v-show="matchingOptions"
                :style="{'max-height': maxHeight}" style="z-index: 100;"
                :class=[classes.dropdown]
                class="absolute w-full overflow-auto appearance-none mt-px text-left list-reset"
            >
                <li tabindex="-1"
                    v-for="(option, idx) in matchingOptions" :key="idx"
                    :class="idx === pointer ? classes.active : ''"
                    class="cursor-pointer outline-none"
                    @blur="handleClickOutside($event)"
                    @mouseover="setPointerIdx(idx)"
                    @keyup.enter="setOption(option)"
                    @keyup.up="movePointerUp()"
                    @keyup.down="movePointerDown()"
                    @click.prevent="setOption(option)"
                >
                    <slot name="option" v-bind="{option,idx}">
                        {{ getOptionDescription(option) }}
                    </slot>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
//https://github.com/robrogers3/vue-taggable-select
 import pointerScroll from "./pointerScroll";
 export default {
     mixins: [pointerScroll],
     created() {
         this.mutableOptions = this.options;
     },
     mounted() {
         document.addEventListener("click", this.handleClickOutside);
         document.addEventListener("keyup", this.handleClickOutside);
         this.searchText = this.initial;
     },
     destroyed() {
         document.removeEventListener("keyup", this.handleClickOutside);
         document.removeEventListener("click", this.handleClickOutside);
     },
     data() {
         return {
             errors: [],
             mutableOptions: [],
             selectedOptions: [],
             searchText: null,
             dropdownOpen: false
         };
     },
     props: {
         value: {
             required: true
         },
         debug: {
             type: Boolean,
             required: false,
             default: () => false
         },
         //Make it taggable
         taggable: {
             type: Boolean,
             required: false,
             default: () => false
         },
         // Use classes to override the look and feel
         // Provide these 7 classes.
         classes: {
             type: Object,
             required: false,
             default: () => {
                 return {
                     icons: 'icons',
                     active: 'active',
                     wrapper: "taggable-select-wrapper",
                     searchWrapper: "search-wrapper",
                     searchInput: "search-input",
                     pill: "pill",
                     required: "required",
                     dropdown: "dropdown"
                 };
             }
         },
         // Give your input a name
         // Good for posting forms
         name: {
             type: String,
             required: false,
             default: () => ""
         },
         // Your list of things for the select   
         options: {
             type: Array,
             required: false,
             default: () => []
         },
         // Tells vue-taggable-select what key to use
         // for generating option labels
         optionLabel: {
             type: String,
             required: false,
             default: () => null
         },
         // Tells vue-taggable-select the value
         // you want populated in the select for the 
         // input
         optionKey: {
             type: String,
             required: false,
             default: () => null
         },
         // Give your input an html element id
         placeholder: {
             type: String,
             required: false,
             default: () => "Search Here"
         },
         //how tall should the dropdown be?
         maxHeight: {
             type: String,
             default: () => "220px",
             required: false
         },
         //Give the input an id
         inputId: {
             type: String,
             default: () => "multi-select",
             required: false
         },
         // Seed search text with initial value
         initial: {
             type: String,
             required: false,
             default: () => null
         },
         // Make it required
         required: {
             type: Boolean,
             required: false,
             default: () => false
         },
         // Max number of results to show.
         maxResults: {
             type: Number,
             required: false,
             default: () => 30
         },
         //Meh
         tabindex: {
             type: String,
             required: false,
             default: () => {
                 return "";
             }
         },
         // Remove previously selected options
         // via the delete key
         keyboardDelete: {
             type: Boolean,
             required: false,
             default: () => {
                 return true;
             }
         },
         forceIcons: {
             type: Boolean,
             required: false,
             default: () => {
                 return false;
             }
         },
         // Tell vue-single-select what to display
         // as the selected option
         getOptionDescription: {
             type: Function,
             required: false,
             default(option) {
                 if (this.optionKey && this.optionLabel) {
                     return option[this.optionKey] + " " + option[this.optionLabel];
                 }
                 if (this.optionLabel) {
                     return option[this.optionLabel];
                 }
                 if (this.optionKey) {
                     return option[this.optionKey];
                 }
                 
                 return option;
             }
         },
         // Use this to actually give vue-single-select
         // a value for doing a POST
         getOptionValue: {
             type: Function,
             required: false,
             default(option)  {
                 if (this.optionKey) {
                     return option[this.optionKey];
                 }

                 if (this.optionLabel) {
                     return option[this.optionLabel];
                 }
                 
                 return option;
             }
         },
         // Meh, Create an option for tagging
         createOption: {
             type: Function,
             required: false,
             default(option) {
                 if (!this.taggable) {
                     throw new Error("Tagging is not enabled");
                 }
                 let newOption = {};
                 
                 if (this.optionKey) {
                     newOption[this.optionKey] = this.createOptionKey(option);
                 }

                 if (this.optionLabel) {
                     newOption[this.optionLabel] = option;
                 }
                 
                 if (!Object.keys(newOption).length) {
                     newOption = option;
                 }

                 this.$emit('option-created', newOption);

                 return newOption;
             }
         },
         createOptionKey: {
             type: Function,
             required: false,
             default()  {
                 return Math.max(...this.mutableOptions.map(opt => opt[this.optionKey])) + 1
             }
         },
         findExistingOption: {
             type: Function,
             required: false,
             default(option, givenOptions) {
                 if (this.optionValue) {
                     return givenOptions.find(opt => opt[this.optionKey] === this.getOptionValue(option));
                 }

                 if (this.optionLabel) {
                     return givenOptions.find(opt => opt[this.optionLabel] === option[this.optionLabel]);
                 }

                 return givenOptions.find(opt => opt === option);
             }
         }
         
     },
     watch: {
         value(curr, prev) {
             if (curr === prev) {
                 return;
             }
         },
         searchText(curr, prev) {
             if (curr === prev) {
                 return;
             }
             
             this.pointer = -1;
         },
         selectedOptions(curr) {
             this.$emit("input", curr);
         },
         options(curr) {
             this.mutableOptions  = curr.slice(0);
         }
     },
     methods: {
         popSelectedOption() {
             if (!this.keyboardDelete) {
                 return;
             }
             
             if (this.searchText === null) {
                 this.selectedOptions.pop();
                 return;
             }
             
             if (this.searchText === "") {
                 this.searchText = null;
             }
         },
         seedSearchText() {
             if (this.searchText !== null) {
                 return;
             }

             this.searchText = "";
         },
         addOption(value) {
             if (value instanceof Event) {
                 value = value.target.value;
             }

             if (!value) {
                 return;
             }
             
             if (!value.length) {
                 return;
             }

             let opt = this.findExistingOption(value, this.mutableOptions.slice(0));

             if (typeof opt === 'undefined') {
                 
                 this.setOption(this.createOption(value));

                 return;
             }

             this.setOption(opt);
         },
         setPossibleOption(value){
             if (this.taggable && this.pointer === -1) {
                 this.addOption(value);
                 
                 return;
             }
             
             if (this.matchingOptions && this.matchingOptions.length) {
                 if (this.pointer === -1) {
                     this.pointer = 0;
                 }
                 
                 this.setOption(this.matchingOptions[this.pointer]);

             }

         },
         setOption(option) {
             if (typeof option === 'undefined') {
                 return;
             }

             if (this.findExistingOption(option, this.selectedOptions.slice(0))) {
                 return;
             }
             
             this.selectedOptions.push(option);
             
             this.searchText = null;

             this.$nextTick(() => {
                 this.$refs.search.focus();
             });
         },
         removeOption(idx) {
             this.selectedOptions.splice(idx, 1);

             this.$nextTick(() => {
                 this.$refs.search.focus();
             });
         },
         setPointerIdx(idx) {
             this.pointer = idx;
         },
         closeOut() {
             this.searchText = null;
         },
         movePointerDown() {
             if (!this.matchingOptions) {
                 return;
             }
             if (this.pointer >= this.matchingOptions.length - 1) {
                 return;
             }

             this.pointer++;
         },
         movePointerUp() {
             if (this.pointer > 0) {
                 this.pointer--;
             }
         },
         handleClickOutside(e) {
             if (this.$el.contains(e.target)) {
                 return;
             }

             this.closeOut();
         }
     },
     computed: {
         matchingOptions() {
             if (this.searchText === null) {
                 return null;
             }

             if (this.optionLabel && this.optionKey) {
                 return this.mutableOptions.filter(
                     option => this.selectedOptions.findIndex(selected => selected[this.optionKey] === option[this.optionKey]) < 0
                 ).filter(option => {
                     return (
                         option[this.optionLabel]
                             .toString()
                             .toLowerCase()
                             .includes(this.searchText.toString().toLowerCase()) ||
                         this.searchText
                             .toString()
                             .toLowerCase()
                             .includes(option[this.optionKey].toString().toLowerCase())
                     );
                 }).slice(0, this.maxResults);
             }

             if (this.optionLabel) {
                 return this.mutableOptions.filter(
                     option => this.selectedOptions.findIndex(selected => selected[this.optionLabel] === option[this.optionLabel]) < 0
                 ).filter(option =>
                     option[this.optionLabel]
                         .toString()
                         .toLowerCase()
                         .includes(this.searchText.toString().toLowerCase())
                 ).slice(0, this.maxResults);
             }

             if (this.optionKey) {
                 return this.mutableOptions.filter(
                     option => this.selectedOptions.findIndex(
                         selected => selected[this.optionKey] === option[this.optionKey]
                     ) < 0
                 ).filter(option =>
                     option[this.optionKey].toString().toLowerCase()
                                           .includes(this.searchText
                                                         .toString()
                                                         .toLowerCase())
                 ).slice(0, this.maxResults);
             }

             return this.mutableOptions.filter(
                 option => this.selectedOptions.findIndex(
                     selected => selected === option
                 ) < 0).filter(option =>
                     option
                         .toString()
                         .toLowerCase()
                         .includes(this.searchText.toString().toLowerCase())
                 ).slice(0, this.maxResults)
         },
         isRequired() {
             if (!this.required) {
                 return "";
             }

             if (this.selectedOptions.length) {
                 return "";
             }

             return 'required';
         }
     }
 };
</script>
<style scoped>
 .list-reset {
     list-style: none;
     padding: 0;
 }
 .overflow-auto {
     overflow: auto;
 }
 .appearance-none {
     -webkit-appearance: none;
     -moz-appearance: none;
     appearance: none;
 }
 .text-black{
     color: #22292f;
 }
 .text-grey-darkest {
     color: #3d4852;
 }
 .text-grey-darker {
     color: #606f7b;
 }
 .text-xs {
     font-size: .75em;
 }
 .tracking-tight {
     letter-spacing: -0.05em;
 }
 .leading-tight {
     line-height: 1.25;
 }
 .text-sm {
     font-size: .875em;
 }
 .w-full {
     width: 100%;
 }
 .inline {
     display: inline;
 }
 .inline-block {
     display: inline-block;
 }
 .block {
     display: block;
 }
 .flex {
     display: flex;
 }
 .flex-1 {
     flex: 1;
 }
 .flex-wrap {
     flex-wrap: wrap;
 }
 .justify-between {
     justify-content: space-between;
 }
 .content-center {
     align-content: center;
 }
 .bordered {
     border-width: 1px;
     border-style: solid;
 }
 .border-none {
     border: none;
 }
 .hover\:border-blue:hover {
     border-color: #3490dc;
 }
 .border-grey {
     border-color: #b8c2cc;
 }
 .border-grey-lighter {
     border-color: #ced4da;
 }
 .border-grey-light {
     border-color: #dae1e7;
 }
 .bg-grey-lighter {
     background-color: #f1f5f8;
 }

 .bg-white {
     background-color: #fff;
 }
 .pin-r {
     right: 0;
 }
 .pin-y {
     top: 0;
     bottom: 0;
 }
 .absolute {
     position: absolute;
 }
 .relative {
     position: relative;
 }
 .items-center {
     align-items: center;
 }
 .p-0 {
     padding: 0;
 }
 .p-1 {
     padding: 0.25em;
 }
 .pt-1 {
     padding-top: 1px;
 }
 .pl-1 {
     padding-left: 0.25em;
 }
 .pb-1 {
     padding-bottom: 0.25em;
 }
 .pl-2 {
     padding-left: 0.5em;
 }
 .pr-1 {
     padding-right: 0.25em;
 }
 .px-1 {
     padding-left: 0.25em;
     padding-right: 0.25em;
 }
 .py-2 {
     padding-top: 0.25em;
     padding-bottom: 0.25em;
 }
 .p-2 {
     padding: 0.5em;
 }
 .py-px {
     padding-top: 1px;
     padding-bottom: 1px;
 }
 .py-1 {
     padding-top: 0.25em;
     padding-bottom: 0.25em;
 }
 .py-2 {
     padding-top: 0.5em;
     padding-bottom: 0.5em;
 }
 .px-2 {
     padding-left: 0.5em;
     padding-right: 0.5em;
 }
 .m-0 {
     margin: 0;
     margin-bottom: 0 !important;
 }
 .m-1 {
     margin: 0.25em !important;
 }
 .mx-1 {
     margin-left: 0.25em;
     margin-right: 0.25em;
 }
 .mt-1 {
     margin-top: 0.25em !important;
 }
 .mr-1 {
     margin-right: 0.25em !important;
 }
 .ml-1 {
     margin-left: 0.25em;
 }
 .mb-1 {
     margin-bottom: 0.25em;
 }
 .m-px2 {
     margin: 2px;
 }
 .mt-px {
     margin-top: 1px;
 }
 .mb-0 {
     margin-bottom: 0;
 }
 .leading-tight {
     line-height: 1.25;
 }
 .leading-normal {
     line-height: 1.5;
 }
 .text-left {
     text-align: left;
 }
 .w-full {
     width: 100%;
 }
 .shadow {
     -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .1);
     box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
 }
 .w-1 {
     width: 0.25em;
 }
 .w-2 {
     width: 0.5em;
 }
 .w-3 {
     width: 0.75em;
 }
 .w-4 {
     width: 1em;
 }
 .min-w-10 {
     min-width: 10em;
 }
 .h-4 {
     height: 1em;
 }
 .h-1 {
     height: 0.25em;
 }
 .h-2 {
     height: 0.5em;
 }
 .h-3 {
     height: 0.75em;
 }
 .opacity-100 {
     opacity: 1;
 }
 .opacity-25 {
     opacity: .25;
 }
 .fill-current {
     fill: currentColor;
 }
 .hover\:no-underline:hover {
     text-decoration: none;
 }
 .outline-none {
     outline: 0;
 }
 .hover\:outline-none {
     outline: 0;
 }
 .hover\:bg-grey-lighter:hover {
     background-color: #dae1e7;
 }
 .shadow-md {
     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.12), 0 2px 4px 0 rgba(0, 0, 0, 0.08);
 }
 .focus\:shadow-outline:focus {
     -webkit-box-shadow: 0 0 0 3px rgba(52, 144, 220, .5);
     box-shadow: 0 0 0 3px rgba(52, 144, 220, .5);
 }
 .rounded {
     border-radius: 0.25em;
 }
 .overflow-x-scroll {
     overflow-x: auto;
 }
 .search-input {
 }
 .icons {
     color: #3d4852;
 }
 .icons svg {
     width: 0.75em;
     height: 0.75em;
     fill: currentColor;
 }
 .taggable-select-wrapper {
 }
 .required {
     _color: #721c24;
     _background-color: #f8d7da;
     border-color: #f5c6cb;
 }
 .cursor-pointer {
     cursor: pointer;
 }
 .dropdown {
     -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.12),
     0 2px 4px 0 rgba(0, 0, 0, 0.08);
     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.12), 0 2px 4px 0 rgba(0, 0, 0, 0.08);
     background-color: #fff;
     color: #606f7b;
     border-radius: 0.25em;
     line-height: 1.25;
     text-align: left;
     display: inline;
     width: 99.8%;
 }
 .dropdown > li {
     padding: 0.5em 0.75em;
 }
 .active {
     background-color: #dae1e7;
 }
 .hidden {
     display: none;
 }
 .appearance-none {
     appearance: none;
 }
 input {
     overflow: visible;
 }
 .search-input {
     font-size: 100%;
     margin: 0;
 }
 .select-wrapper,
 .box-size
 {
     box-sizing: border-box;
 }
 .pill {
     border-width: 1px;
     border-style: solid;
     border-color: #b8c2cc;
     background-color: #f1f5f8;
     cursor: pointer;
     border-radius: 0.25em;
     line-height: 1.5;
     padding: 0.15em 0.5em;
     letter-spacing: -0.05em;
 }
 .pill:hover {
     background-color: #f1f5f8;
 }

</style>
