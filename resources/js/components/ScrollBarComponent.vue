<template>
    <div :id="'scrollbar-for-' + forId" class="fake-scrollbar">
        <div class="fake-scollbar-content"></div>
    </div>
</template>

<script>

export default {
    props:{
        forId: {
            type: String,
            required: true
        },
    },
    mounted() {
        //get elements
        var element = document.getElementById(this.forId);
        var scrollbar = document.getElementById('scrollbar-for-' + this.forId); 

        console.log(element);
        console.log(scrollbar);

        var running = false;
        scrollbar.onscroll= function() {
            if(running) {
                running = false;
                return;
            }
            running = true;
            element.scrollLeft= scrollbar.scrollLeft;
        };
        element.onscroll= function() {
            if(running) {
                running = false;
                return;
            }
            running = true;
            scrollbar.scrollLeft= element.scrollLeft;
        };

        function outputsize() {
            //change element to fit with of real element - https://stackoverflow.com/questions/3934271/horizontal-scrollbar-on-top-and-bottom-of-table
            scrollbar.firstChild.style.width= element.scrollWidth+'px';

            //if there is a scrollbar it detects at initial wrong width, so we set the detected width. Can't find a visual difference
            if(element.clientWidth < element.firstChild.clientWidth) element.firstChild.style.width = element.scrollWidth+'px';
            else element.firstChild.style.removeProperty('width');
        }
        outputsize(); //just to make sure to run on initial

        new ResizeObserver(outputsize).observe(element); //https://caniuse.com/#feat=resizeobserver
    }
}
</script>

<style scoped>
.fake-scrollbar{
    overflow: auto;
    overflow-y: hidden;
}

.fake-scollbar-content{
    padding-top: 1px
}

@media print { 
    .fake-scrollbar, .fake-scollbar-content{
        display: none;
    }
}
</style>