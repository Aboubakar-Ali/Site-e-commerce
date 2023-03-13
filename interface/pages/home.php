<?php

require("interface/comps/article_min.php")

?>

<div class="search">
    <div>
        <span><b>Recherche : </b></span>
        <input type="text" name="search" id="search" onkeyup="search(this.value);" style="padding:initial;">
    </div>
    <div>
        <span><b>Fourchette de prix : </b><span class="rangeValues"></span></span>
        <section class="range-slider">
            <input value="0" min="0" max="500" step="20" type="range">
            <input value="500" min="0" max="500" step="20" type="range">
        </section>
    </div>
    <div>
        <span><input type="checkbox" id="pntrChk" onchange="document.querySelector('#pntr').style.display = (this.checked) ? '' : 'none'; searchPntr(document.querySelector('#pntrChk').checked, 0);"><b>Pointure dispo : </b><span id="pntrVal"></span></span>
        <section>
            <input id="pntr" value="40" min="30" max="50" step="0.5" type="range" style="display:none;" oninput="searchPntr(document.querySelector('#pntrChk').checked, this.value); document.querySelector('#pntrVal').innerHTML = (this.value);">
        </section>
    </div>
</div>

<div id="grid" class="grid">
<?php array_map($card, $prdcts); ?>
</div>


<script>
    var grid = Array.from(document.querySelectorAll("#grid [card]"));
    var $cards = [];
    for (const card of grid) {
        var key = grid.indexOf(card);
        $cards[key] = [true, true, true];
    }

    function search(searchStr) {
    // Declare variables
    var filter, table, tr, td, i, txtValue;
    filter = searchStr.toUpperCase();
    table = document.getElementById("grid");
    cards = table.querySelectorAll("[card]");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < cards.length; i++) {
        fltr = false;
        for (const name of ["title","color"]) {
            const value = cards[i].getAttribute(name);
            if (value.toUpperCase().indexOf(filter) > -1) {
                fltr = true;
            }
        }
        if (fltr) {
            $cards[i][0] = true;
        } else {
            $cards[i][0] = false;
        }
    }

    updateGrid();
    }

    function searchPrice(price1,price2) {
    // Declare variables
    table = document.getElementById("grid");
    cards = table.querySelectorAll("[card]");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < cards.length; i++) {
        fltr = false;
        for (const name of ["price"]) {
            const value = cards[i].getAttribute(name);
            if (value >= price1 && value <= price2) {
                fltr = true;
            }
        }
        if (fltr) {
            $cards[i][1] = true;
        } else {
            $cards[i][1] = false;
        }
    }

    updateGrid();
    }

    function searchPntr(checked,pntr) {
    // Declare variables
    table = document.getElementById("grid");
    cards = table.querySelectorAll("[card]");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < cards.length; i++) {
        fltr = false;
        if(checked == true) {
            for (const name of ["pntr"]) {
                const value = cards[i].getAttribute(name);

                if ((value.split('|')).includes(pntr)) {
                    fltr = true;
                }
            }
        }else{
            fltr = true;
        }
        if (fltr) {
            $cards[i][2] = true;
        } else {
            $cards[i][2] = false;
        }
    }
    console.log($cards);

    updateGrid();
    }

    function updateGrid(){
        console.log($cards);
        for (i = 0; i < document.querySelectorAll("#grid [card]").length; i++) {
            if (JSON.stringify($cards[i]) == JSON.stringify([true, true, true])){
                document.querySelectorAll("#grid [card]")[i].style.display = "";
            }else{
                document.querySelectorAll("#grid [card]")[i].style.display = "none";
            }
        }
    }
</script>
<script>
    function getVals(){
    // Get slider values
    var parent = this.parentNode;
    var slides = parent.getElementsByTagName("input");
        var slide1 = parseFloat( slides[0].value );
        var slide2 = parseFloat( slides[1].value );
    // Neither slider will clip the other, so make sure we determine which is larger
    if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }
    
    var displayElement = document.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = slide1 + "$ - " + slide2 + "$";
        searchPrice(slide1, slide2);
    }

    window.onload = function(){
    // Initialize Sliders
    var sliderSections = document.getElementsByClassName("range-slider");
        for( var x = 0; x < sliderSections.length; x++ ){
            var sliders = sliderSections[x].getElementsByTagName("input");
            for( var y = 0; y < sliders.length; y++ ){
            if( sliders[y].type ==="range" ){
                sliders[y].oninput = getVals;
                // Manually trigger event first time to display values
                sliders[y].oninput();
            }
            }
        }
    }
</script>

<style>
    [card] img{
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }
    [card]{
        margin: 20px;
        border-radius: 12px;
        box-shadow: 0px 0px 30px -15px rgba(0, 0, 0, 0.8);;
    }
    [card] .foot{
        padding: 20px;
        color: white;
    }
    .foot .head{
        display:flex;
    }

    .title{
        font-weight: bold;
        width: 100%;
    }

    .search {
        background-color: rgba(0,0,0,0.1);
        padding: 40px;
        color: white;
        width: 100%;
    }

    .search>div {
        display: flex;
        align-items: center;
        height: 50px;
    }

    .search>div>span{
        padding-right: 30px;
        width: 100%;
    }
    
    .search>div>*:not(span), .search>div>* input:not([type="checkbox"]){
        width: 100%;
    }
</style>
<style>
    section.range-slider {
        position: relative;
        width: 200px;
        height: 35px;
        text-align: center;
    }

    section.range-slider input {
        pointer-events: none;
        position: absolute;
        overflow: hidden;
        left: 0;
        top: 15px;
        outline: none;
        height: 18px;
        margin: 0;
        padding: 0;
    }

    section.range-slider input::-webkit-slider-thumb {
        pointer-events: all;
        position: relative;
        z-index: 1;
        outline: 0;
    }

    section.range-slider input::-moz-range-thumb {
        pointer-events: all;
        position: relative;
        z-index: 10;
        -moz-appearance: none;
        width: 9px;
    }

    section.range-slider input::-moz-range-track {
        position: relative;
        z-index: -1;
        background-color: rgba(0, 0, 0, 1);
        border: 0;
    }
    section.range-slider input:last-of-type::-moz-range-track {
        -moz-appearance: none;
        background: none transparent;
        border: 0;
    }
    section.range-slider input[type=range]::-moz-focus-outer {
    border: 0;
    }
</style>