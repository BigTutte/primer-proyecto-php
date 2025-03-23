<style>

    main {
        color-scheme: light dark;
        font: 100%/1.5, sans-serif;
        display: flex;
        place-content: center;
        background-color: rgb(39, 37, 46);
    }

    body {
        display: flex;
        background-color: rgba(32,36,41,255);
        color-scheme: light dark;
        font: 100%/1.5, sans-serif;

    }

    main {
        display: grid;  
        place-content: center;
    }

    img {
        margin-left: auto;
        margin-right: auto;
        justify-self: center;
        display: flex;
        align-items: center;
        border-radius: 5px;
    }

    hgroup {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        
    }
    

    .card-title {
        color: #ffffff;
        place-content: center;
    }

    #btn-back-to-top {
        position: fixed;
        bottom: 3px;
        right: 20px;
        display: none;
        background-color: darkslategray;
        box-shadow: black 0px 3px 3px;
        border-radius: 10px;
        justify-content: center;
    }

    * {
        box-sizing: border-box;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container-heroes {
        position: relative;
    }

    /* Hide the images by default */
    .pag-diapo {
        display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }
    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }
    .caption-container {
        text-align: center;
        background-color: #222;
        padding: 2px 16px;
        color: white;
    }
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    .demo {
        opacity: 0.6;
    }
    .active,
    .demo:hover {
        opacity: 1;
    }
    .column {
        float: left;
        width: 16.66%;
    }
</style>