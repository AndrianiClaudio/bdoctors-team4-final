<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center mt-5">
                <h1 class="title-section">Le nostre <strong class="color-brand"> Specializzazioni </strong> </h1>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex">
                <div class="specs">
                    <ul class="list-group">
                        <li class="list-group-item"><h3> Cardiologia </h3></li>
                        <li class="list-group-item"><h3> Cardiologia </h3></li>
                        <li class="list-group-item"><h3> Cardiologia </h3></li>
                        <li class="list-group-item"><h3> Cardiologia </h3></li>
                        <li class="list-group-item"><h3> Cardiologia </h3></li>
                        <li class="list-group-item"><h3> Cardiologia </h3></li>
                        <li class="list-group-item"><h3> Cardiologia </h3></li>
                        <li class="list-group-item"><h3> Cardiologia </h3></li>
                    </ul>
                </div>
                <div class="pic">
                    <div class="img">Placeholder</div>
                </div>
                <div class="dpec-desc">
                    <h2> Cardiologia </h2> <!-- Specializzazione active in quel momento -->
                    <p>

                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Specializations',
    }
</script>

<style lang="scss" scoped>
    .container-fluid {
        height: 650px;
        .row {
            .col {
                .title-section {
                    .color-brand {
                        color: #3c4996;
                    }
                }
            }
        }
        .row {
            .col {
                .specs {
                    .list-group {
                        width: 200px;
                    }
                }
                .pic {
                    background-color: gray;
                    width: 250px;
                    height: 400px;
                }
            }
        }
    }
</style>