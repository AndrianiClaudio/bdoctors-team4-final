<template>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col p-0">
                <div class="all-product d-flex">
                    <div class="all-product-container w-90 d-flex">
                    <div
                        v-for="(counter, index) in counters"
                        :key="index"
                        class="all-product-box d-flex">
                        <img
                            :src="productArray[counter.counter].photo"
                            alt=""
                            />
                            <div class="filter">
                            <h5>select options / quick view</h5>
                            </div>
                            <h3>{{ productArray[counter.counter].firstname }}</h3>
                            <p>{{ productArray[counter.counter].lastname }}</p>
                            <div @click="prev()" class="left-arrow">
                            <i class="fas fa-chevron-left"></i>
                            </div>
                            <div @click="next()" class="right-arrow">
                            <i class="fas fa-chevron-right"></i>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Doctor-ov",
        data() {
            return {
                productArray:[],
                 counters: [
                    {
                    counter: 0,
                    },
                    {
                    counter: 1,
                    },
                    {
                    counter: 2,
                    },
                    {
                    counter: 3,
                    },
                ],
            }
        },
        methods: {
            prev(index) {
                this.counters.forEach((element, countIndex) => {
                    countIndex == index;
                    element.counter == countIndex;
                    element.counter--;

                    if (element.counter < 0) {
                    element.counter = this.productArray.length - 1;
                    }
                });
                },
                next(index) {
                this.counters.forEach((element, countIndex) => {
                    countIndex == index;
                    element.counter == countIndex;
                    element.counter++;

                    if (element.counter > this.productArray.length - 1) {
                    element.counter = 0;
                    }
                });
                },
        },
       created() {
           axios
                .get("api/doctors")
                .then((res) => {
                    this.productArray = res.data.results.doctors;
                    console.log(this.productArray);
                })
                .catch((err) => {
                    console.error(err);
                });
       },
    }
</script>

<style lang="scss" scoped>
   .all-product {
  margin-top: 12em;
  .heading {
    h5 {
      line-height: 2em;
    }
  }
  .all-product-container {
    margin: auto;
    gap: 1.5em;

    .all-product-box {
      flex-basis: calc(100% / 4);
      height: 500px;
      position: relative;
      text-align: center;
      flex-direction: column;
      justify-content: center;
      .filter {
        display: none;
        width: 100%;
        height: 82%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
      }
      &:nth-of-type(3),
      &:nth-of-type(4) {
        .left-arrow,
        .right-arrow {
          display: none;
        }
      }
      &:nth-of-type(2) {
        .right-arrow {
          display: none;
        }
      }
      &:nth-of-type(5) {
        .left-arrow {
          display: none;
        }
      }
      &:hover .filter {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.5);
        h5 {
          cursor: pointer;
          color: white;
        }
      }
      h3 {
        margin: 1em;
        font-size: 1.2em;
      }
      p {
        font-size: 1.2em;
      }
      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    }
  }
}
</style>