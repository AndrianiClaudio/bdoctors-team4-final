<template>
    <div id="Overall-rev" class="container-fluid p-0 d-flex">
        <div class="overlay">
            <div class="row align-items-center m-0 p-0">
                <div class="col d-flex justify-content-center m-0 p-0">
                    <div class="card-rev">
                        
                    </div>
                </div>
                <div class="col d-flex justify-content-center m-0 p-0">
                    <div class="card-rev">

                    </div>
                </div>
                <div class="col d-flex justify-content-center m-0 p-0">
                    <div class="card-rev">

                    </div>
                </div>
                <div class="col d-flex justify-content-center m-0 p-0">
                    <div class="card-rev">

                    </div>
                </div>
            </div>
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
        position: relative;
        height: 450px;
        background: url('https://www.mediyos.com/assets/web/img/bg-special.png');
        background-repeat: no-repeat;
        background-size: cover;
        .overlay {
            background-color: rgba($color: #418ed6, $alpha: 0.75);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            .row {
                height: 450px;
                .col {
                    .card-rev {
                        background-color: #ffffff;
                        border-radius: 12px;
                        height: 200px;
                        width: 280px;
                    }
                }
            }
            
        }

    }
</style>