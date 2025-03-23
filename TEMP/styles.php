<style>

    main {
        color-scheme: light dark;
        font: 100%/1.5, sans-serif;
        display: flex;
        place-content: center;
        background-color: rgb(39, 37, 46);
    }

    body {
    /*
        background-image: url("<?=$data["poster_url"]; ?>");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size:contain;
        background-color: #999;
    */
        display: grid;
        background-color:rgb(39, 37, 46);;
        color-scheme: light dark;
        font: 100%/1.5, sans-serif;
        display: flex;
        place-content: center;
    }

    main {
        display: grid;
        gap: 1rem;
        place-content: center;
        padding: 1rem;
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
</style>