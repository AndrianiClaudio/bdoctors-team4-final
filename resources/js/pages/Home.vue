<template>
    <div class="container-fluid p-0">
        <Navbar />
        <!-- <JumboT @filterSpec="filteredSpec($event)" /> -->
        <JumboT />
        <Overview />
        <Specializations />
        <!-- <DoctorOv />  ... commentato per rimuovere errori console, ma funziona-->
        <!-- TEST SLIDER -->
        <SliderPaginate />
    </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import JumboT from "../components/Jumbo-top.vue";
import Overview from "../components/Overview.vue";
import Specializations from "../components/Specializations.vue";
// import DoctorOv from "../components/Doctor-ov.vue"; ... commentato per rimuovere errori console, ma funziona
import SliderPaginate from "../components/SliderPaginate.vue";

export default {
    name: "Home",
    components: {
        Navbar,
        JumboT,
        Overview,
        Specializations,
        // DoctorOv, ... commentato per rimuovere errori console, ma funziona
        SliderPaginate,
    },
    data() {
        return {
            doctors: {
                type: Array,
            },
        };
    },

    methods: {
        getAllDoctors() {
            axios
                .get("api/doctors")
                .then((res) => {
                    this.doctors = res.data.results.doctors;
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
    created() {
        this.getAllDoctors();
    },
};
</script>

<style lang="scss" scoped></style>
