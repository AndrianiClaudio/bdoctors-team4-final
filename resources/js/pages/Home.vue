<template>
    <div class="container-fluid p-0">
        <!-- <Navbar /> -->
        <JumboT @filterSelected="filterSelected($event)" />
        <!-- <JumboT /> -->
        <Overview />
        <Specializations />
        <SliderPaginate />
        <OverallRev />
    </div>
</template>

<script>
// import Navbar from "../components/Navbar.vue";
import JumboT from "../components/Jumbo-top.vue";
import Overview from "../components/Overview.vue";
import Specializations from "../components/Specializations.vue";
import SliderPaginate from "../components/SliderPaginate.vue";
import OverallRev from "../components/Overall-rev.vue";

export default {
    name: "Home",
    components: {
        // Navbar,
        JumboT,
        Overview,
        Specializations,
        SliderPaginate,
        OverallRev,
    },
    data() {
        return {
            specialization: "",
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
        filterSelected(e) {
            alert(e);
            this.specialization = e;
            console.log(this.specialization);
        },
    },
    created() {
        this.getAllDoctors();
    },
};
</script>

<style lang="scss" scoped></style>
