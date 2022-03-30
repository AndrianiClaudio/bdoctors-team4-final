<template>
    <div class="container-fluid p-0">
        <div class="overlay">
            <img src="../../../storage/app/public/images/jumbo-top.jpg" alt="">
            <div class="introduction-jumbo d-flex flex-column">
                <div class="text-jumbo">
                    
                </div>
                <form class="d-flex mt-4" action="">
                    <select name="" id="">
                        <option value="" disabled selected>Clicca per selezionare una specializzazione</option>
                        <option value="">valore 1</option>
                        <option value="">valore 2</option>
                        <option value="">valore 3</option>
                    </select>
                    <input type="submit" value="search">
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Jumbo-top',
    }
</script>

<style lang='scss' scoped>
    .container-fluid {
        .overlay {
            position: relative;
            width: 100%;
            height: 100%;
            background-color: rgba($color: #3C4996, $alpha: 0.75);;
            img {
                max-width: 100%;
                opacity: 0.45;
            }
            .introduction-jumbo {
                border: 1px solid black;
                border-radius: 20px;
                width: 481px;
                height: 323px;
                position: absolute;
                top: 24%;
                left: 8%;

                .text-jumbo {
                    border: 1px solid red;
                    border-radius: 20px;
                    width: 100%;
                    height: 80%;
                }

                form {
                    border: 1px solid yellow;
                    border-radius: 25px;
                    position: relative;
                    select {
                        width: 100%;
                        height: 2.5em;
                        border: 0;
                        border-radius: 25px;
                    }
                    input {
                        background-color: #7fff8c;
                        position: absolute;
                        top: 0;
                        right: 0;
                        width: 30%;
                        height: 2.5em;
                        border: 0;
                        border-radius: 25px;
                    }
                }
            }
        }
    }
</style>