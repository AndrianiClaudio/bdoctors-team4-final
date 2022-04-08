<template>
    <div class="container-fluid mx-0 my-0 pt-5 pb-5">
        <div class="row m-0 p-0">
            <!-- Colonna 1 -->
            <div class="col d-flex flex-column align-items-center m-0 p-0">
                <div class="row m-0 p-0 mb-4">
                    <div class="col m-0 p-0">
                        <img src="../../../storage/app/public/images/BDoctors-txt-v2.svg" alt="">
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col m-0 p-0">
                        <p>La tua salute &egrave; la nostra priorit&agrave;</p>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col m-0 p-0">
                        <p>
                            <ul class="list-unstyled">
                                <li class="list-inline-item">
                                    <a href="#twitter" class="nav-link rounded-circle"><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#instagram" class="nav-link rounded-circle"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#facebook" class="nav-link rounded-circle"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#youtube" class="nav-link rounded-circle"><i class="fa-brands fa-youtube"></i></a>
                                </li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Colonna 2 -->
            <div class="col d-flex flex-column align-items-center m-0 p-0">
                <div class="row m-0 p-0">
                    <div class="col m-0 p-0">
                        <h4 class="fw-bold">Specializzazioni</h4>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col m-0 p-0">
                        <ul>
                            <li>Allergologia</li>
                            <li>Cardiologia</li>
                            <li>Dermatologia</li>
                            <li>Ecografia</li>
                            <li>Medicina dello Sport</li>
                            <li>Immunologia</li>
                            <li>Neurologia</li>
                            <li>Oculistica</li>
                            <li>Pediatria</li>
                            <li>Psicologia</li>
                            <li>Radiologia e Risonanza</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Colonna 3 -->
            <div class="col d-flex flex-column align-items-center m-0 p-0">
                <div class="row m-0 p-0">
                    <div class="col m-0 p-0">
                        <h4 class="fw-bold">Naviga la pagina</h4>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col m-0 p-0">
                        <li><a href="#Jumbo-top">Ricerca</a></li>
                        <li><a href="#Overview">Panormaica sito</a></li>
                        <li><a href="#Specializations">Panoramica Specializzazioni</a></li>
                        <li><a href="#SliderPaginate">Panoramica Dottori</a></li>
                        <li><a href="#Overall-rev">Le nostre recensioni</a></li>
                    </div>
                </div>
            </div>

            <!-- Colonna 4 -->
            <div class="col d-flex flex-column align-items-center m-0 p-0">
                <div class="row m-0 p-0">
                    <div class="col m-0 p-0">
                        <h4 class="fw-bold">Hai domande? Contattaci</h4>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col m-0 p-0">
                        <ul class="list-unstyled">
                            <li> <span class="me-1"> <i class="fa-solid fa-location-dot"></i> </span> Piazzale Giovanni delle Bande Nere, 9, 20146 MI</li>
                            <li> <span class="me-1"> <i class="fa-solid fa-phone"></i> </span>  02 4003 1288</li>
                            <li> <span class="me-1"> <i class="fa-solid fa-envelopes-bulk"></i> </span> ciao@boolean.careers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Footer-top",
    }
</script>

<style lang="scss" scoped>
    .container-fluid {
        .row {

            .col {
                .row {
                    .col {

                        p {
                            ul {
                                li {
                                    a {
                                        background-color: #5b6dd4;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        width: 35px;
                                        height: 35px;
                                        text-decoration: none;
                                        i {
                                            color: #ffffff;
                                            font-size: 1.2em;
                                        }
                                    }
                                }
                            }
                        }
                        ul {
                            li {
                                span {
                                    i {
                                        color: #313131;
                                        font-size: 1.1em;
                                    }
                                }
                            }
                        }
                    }

                }

            }


        }

    }

      
</style>