<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
<style>
    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: inherit;
    }

    /* html {
          font-size: 87.5%;
        } */

    body {
        background-color: #fffafa;
        box-sizing: border-box;
    }

    .custom-background {
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 20%, rgba(0, 0, 0, 0.7) 60%, rgba(0, 0, 0, 1) 95%),
            url('images/background-image.png');
        width: 100%;

    }
</style>

@stack('css')
