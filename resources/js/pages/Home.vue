<template>
    <div class="container-fluid p-0">
        <Navbar />
        <!-- <JumboT @filterSpec="filteredSpec($event)" /> -->
        <JumboT />
        <Overview />
        <Specializations />
        <DoctorOv />
    </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import JumboT from "../components/Jumbo-top.vue";
import Overview from "../components/Overview.vue";
import Specializations from "../components/Specializations.vue";
import DoctorOv from "../components/Doctor-ov.vue";

export default {
    name: "Home",
    components: {
        Navbar,
        JumboT,
        Overview,
        Specializations,
        DoctorOv,
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
