<template>
  <div>
    <div class="row row-cols-1 row-cols-md-4 g-4" v-if="doctor">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ doctor.firstname }}</h5>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import Axios from "axios";

  export default {
    name: 'Doctor',
    props: ['id'],
    data() {
      return {
        doctor: []
      }
    },
    created() {
      const url = 'http://127.0.0.1:8000/api/doctors/' + this.id;
      this.getProduct(url);
    },
    methods: {
      getProduct(url){
          Axios.get(url).then(
            (result) => {
              console.log(result);
              this.doctor = result.data.doctors;
            });
      }
    }
  }
</script>

<style lang="scss">

</style>