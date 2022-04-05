<template>
    <div class="container-fluid m-0 p-0">
        <div class="row justify-content-center align-items-center m-0 p-0">
            <div class="col d-flex justify-content-center align-items-center m-0 p-0">
                <p>Copyright &copy; 2022 | Tutti i diritti riservati al <a class="text-decoration-none" href=""> team 4 </a></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Footer-bot",
    }
</script>

<style lang="scss" scoped>
    .container-fluid {
        .row {
            .col {
                p {
                    a {
                        &:active {
                            text-decoration: none;
                        }
                    }
                }
            }
        }
    }
</style>