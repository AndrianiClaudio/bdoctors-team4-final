<template>
    <div class="container-fluid nope p-0">
        <JumboT />
        <Overview />
        <Specializations />
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
        SliderPaginate,
        OverallRev,
        FooterTop,
        FooterBot,
    },
};
</script>

<style lang="scss" scoped> </style>
