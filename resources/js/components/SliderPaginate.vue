<template>
    <!-- d-flex = massimo dello stile -->
    <div class="container-fluid p-0 d-flex">
        <div v-for="doctor in slider.doctors" :key="doctor.id">
            <img
                :src="`http://localhost:8000/storage/${doctor.photo}`"
                alt=""
            />
            <div class="filter">
                <h5
                    v-for="(specialization, index) in slider.specializations"
                    :key="index"
                >
                    {{ specialization.category }}
                </h5>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    {{ doctor.firstname }} {{ doctor.lastname }}
                </h5>
            </div>
        </div>

        <!-- al click su freccia: chiamata api ... aggiorna i medici di slider, in teoria -->
        <!-- <div @click="prev()" class="left-arrow"> -->
        <div v-if="slider.prev_page_url" class="left-arrow">
            <i
                class="fas fa-chevron-left"
                @click.prevent="getDoctors(slider.prev_page_url)"
            ></i>
            <!-- {{ slider.prev_page_url }} -->
        </div>
        <div v-if="slider.next_page_url" class="right-arrow">
            <!-- <div @click="next()" class="right-arrow"> -->
            <i
                class="fas fa-chevron-right"
                @click.prevent="getDoctors(slider.next_page_url)"
            ></i>
            <!-- {{ slider.next_page_url }} -->
        </div>
    </div>
</template>

<script>
export default {
    name: "SliderPaginate",
    data() {
        return {
            // TEST SLIDER
            slider: {
                doctors: [],
                next_page_url: null,
                prev_page_url: null,
            },
        };
    },
    methods: {
        // TEST SLIDER
        getDoctors(url) {
            axios
                .get(url)
                .then((res) => {
                    // console.log(res.data.results);
                    this.slider.doctors = res.data.results.pagination.data;
                    this.slider.prev_page_url =
                        res.data.results.pagination.prev_page_url;
                    this.slider.next_page_url =
                        res.data.results.pagination.next_page_url;
                    // console.log(
                    //     "slider-doctors ",
                    //     this.slider.doctors,
                    //     "slider-next ",
                    //     this.slider.next_page_url,
                    //     "slider-prev ",
                    //     this.slider.prev_page_url
                    // );
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
    created() {
        let start_url = "http://127.0.0.1:8000/api/doctors/paginate/testCla";
        this.getDoctors(start_url);
    },
};
</script>

<style></style>
