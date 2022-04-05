<template>
    <div class="container-fluid p-0">
        <Navbar />
        <!-- <JumboT @filterSpec="filteredSpec($event)" /> -->
        <JumboT />
        <Overview />
        <Specializations />
        <!-- <DoctorOv />  ... commentato per rimuovere errori console, ma funziona [In teoria non serve piu' e si puo' eliminare (Meme)]-->
        <!-- TEST SLIDER -->
        <SliderPaginate />
        <OverallRev />
        <footer>
            <FooterTop />
            <FooterBot />
        </footer>
    </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import JumboT from "../components/Jumbo-top.vue";
import Overview from "../components/Overview.vue";
import Specializations from "../components/Specializations.vue";
// import DoctorOv from "../components/Doctor-ov.vue"; ... commentato per rimuovere errori console, ma funziona [In teoria non serve piu' e si puo' eliminare (Meme)]
import SliderPaginate from "../components/SliderPaginate.vue";
import OverallRev from "../components/Overall-rev.vue";
import FooterTop from "../components/Footer-top.vue";
import FooterBot from "../components/Footer-bot.vue";

export default {
    name: "Home",
    components: {
        Navbar,
        JumboT,
        Overview,
        Specializations,
        // DoctorOv, ... commentato per rimuovere errori console, ma funziona [In teoria non serve piu' e si puo' eliminare (Meme)]
        SliderPaginate,
        OverallRev,
        FooterTop,
        FooterBot,
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
