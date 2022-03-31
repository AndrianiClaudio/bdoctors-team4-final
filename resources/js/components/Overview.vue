<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center mt-5">
                <h1 class="text-white">Come lavoriamo?</h1>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-center text-center mt-5">
                <p class="w-50 text-white">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Libero est provident amet deleniti explicabo, accusantium
                    sint odit nulla quas, numquam impedit quam ipsam doloremque
                    fuga unde reiciendis molestias placeat nam.
                </p>
            </div>
        </div>

        <div class="row mt-5 pb-5">
            <div
                class="col d-flex flex-column justify-content-center align-items-center"
            >
                <div
                    class="mask-decoration d-flex flex-column justify-content-center align-items-center rounded-circle mb-5"
                >
                    <div class="mask-img rounded-circle"></div>
                </div>
                <h2 class="text-center mb-2 text-white">Scegli il medico</h2>
                <p class="text-center text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Hic exercitationem, rem tempora assumenda.
                </p>
            </div>
            <div
                class="col d-flex flex-column justify-content-center align-items-center"
            >
                <div
                    class="mask-decoration d-flex flex-column justify-content-center align-items-center rounded-circle mb-5"
                >
                    <div class="mask-img rounded-circle"></div>
                </div>
                <h2 class="text-center mb-2 text-white">
                    Richiedi un appuntamento
                </h2>
                <p class="text-center text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Hic exercitationem, rem tempora assumenda.
                </p>
            </div>
            <div
                class="col d-flex flex-column justify-content-center align-items-center"
            >
                <div
                    class="mask-decoration d-flex flex-column justify-content-center align-items-center rounded-circle mb-5"
                >
                    <div class="mask-img rounded-circle"></div>
                </div>
                <h2 class="text-center mb-2 text-white">
                    Vai all'appuntamento
                </h2>
                <p class="text-center text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Hic exercitationem, rem tempora assumenda.
                </p>
            </div>
            <!-- <div class="col d-flex flex-column justify-content-center align-items-center">
                <div class="mask-decoration d-flex flex-column justify-content-center align-items-center rounded-circle mb-5">
                    <div class="mask-img rounded-circle"> </div>
                </div>
                <h2 class="text-center mb-2">Appointment</h2>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic exercitationem, rem tempora assumenda.</p>
            </div> -->
        </div>
    </div>
</template>

<script>
export default {
    name: "Overview",
};
</script>

<style lang="scss" scoped>
.container-fluid {
    // height: 650px;
    background-color: #37417e;

    .row {
        .col {
            .mask-decoration {
                border: 1px dashed rgba(255, 255, 255, 0.6);
                width: 250px;
                height: 250px;

                .mask-img {
                    background-image: url("../../../storage/app/public/images/doctor1.jpg");
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                    width: 200px;
                    height: 200px;
                }
            }
        }
    }
}
</style>
