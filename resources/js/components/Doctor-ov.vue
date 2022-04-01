<template>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col p-5">
                <div class="all-product d-flex">
                    <div class="all-product-container w-90 d-flex">
                        <div
                            v-for="(counter, index) in counters"
                            :key="index"
                            class="all-product-box d-flex card">
                            <img
                                :src="productArray[counter.counter].photo"
                                alt=""
                                />
                                <div class="filter">
                                    <h5 v-for="(specialization,index) in productArray[counter.counter].specializations"
                                    :key="index">
                                    {{specialization.category}}
                                    
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ productArray[counter.counter].firstname }}</h5>
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

.left-arrow,
.right-arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  padding: 2em 1em;
  background-color: purple;
  color: white;
  opacity: 0.5;

  &:hover {
    opacity: 1;
    cursor: pointer;
  }
}

.left-arrow {
  left: 0;
  z-index: 5;
}
.right-arrow {
  right: 0;
  z-index: 5;
}

   .all-product {

  .all-product-container {
    width: 100%;
    gap: 1.5em;

    .all-product-box {
      flex-basis: calc(100% / 4);
      text-align: center;
      justify-content: center;
      .filter {
        display: none;
        width: 100%;
        height: 84.5%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
      }
      &:nth-of-type(2),
      &:nth-of-type(3) {
        .left-arrow,
        .right-arrow {
          display: none;
        }
      }
      &:nth-of-type(1) {
        .right-arrow {
          display: none;
        }
      }
      &:nth-of-type(4) {
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
    }
  }
}
</style>