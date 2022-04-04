<template>
    <div class="container-fluid p-0">
        <div class="overlay">
            <!-- <img src="https://hatatpolyclinicoman.com/wp-content/uploads/2017/12/Doctors-banner.jpg" alt=""> -->
            <img src="https://www.mediyos.com/assets/web/img/bg-special.png" alt="">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Overall-rev",
    }
</script>

<style lang="scss" scoped>
    .container-fluid {
        height: 100%;
        // border: 1px solid green;
        .overlay {
            position: relative;
            width: 100%;
            height: 100%;
            background-color: rgba($color: #418ed6, $alpha: 0.75);
            img {
                max-width: 100%;
                opacity: 0.45;
            }
        }
    }
</style>