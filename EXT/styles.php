<style>
    main {
        color-scheme: light dark;
        font: 100%/1.5, sans-serif;
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
</style>