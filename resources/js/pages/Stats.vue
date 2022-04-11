<template>
    <div id="graph-stats" class="d-flex" v-if="loading && maxi_media_query">
        <div class="col-6">
            <h2>Grafico Recensioni/Messaggi</h2>
            <Bar
                :chart-options="chartOptions"
                :chart-data="chartData"
                :chart-id="chartId"
                :dataset-id-key="datasetIdKey"
                :plugins="plugins"
                :css-classes="cssClasses"
                :styles="styles"
                :width="width"
                :height="height"
            />
        </div>
        <div class="col-6">
            <h2>Grafico Voti</h2>
            <Bar
                v-if="loadingVote"
                :chart-options="chartOptions"
                :chart-data="chartDataVote"
                :chart-id="chartId"
                :dataset-id-key="datasetIdKey"
                :plugins="plugins"
                :css-classes="cssClasses"
                :styles="styles"
                :width="width"
                :height="height"
            />
        </div>
    </div>
    <div
        id="graph-stats"
        class="d-flex flex-column"
        v-else-if="loading && !maxi_media_query"
    >
        <div class="col-12">
            <h2>Grafico Recensioni/Messaggi</h2>
            <Bar
                :chart-options="chartOptions"
                :chart-data="chartData"
                :chart-id="chartId"
                :dataset-id-key="datasetIdKey"
                :plugins="plugins"
                :css-classes="cssClasses"
                :styles="styles"
                :width="width"
                :height="height"
            />
            <h2>Grafico Voti</h2>
            <Bar
                v-if="loadingVote"
                :chart-options="chartOptions"
                :chart-data="chartDataVote"
                :chart-id="chartId"
                :dataset-id-key="datasetIdKey"
                :plugins="plugins"
                :css-classes="cssClasses"
                :styles="styles"
                :width="width"
                :height="height"
            />
        </div>
    </div>
    <div v-else>
        Attendi il caricamento delle tue statistiche relative ai voti delle
        recensioni...
    </div>
</template>

<script>
import { Bar } from "vue-chartjs/legacy";
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from "chart.js";
// import { param } from "jquery";

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);

export default {
    name: "Stats",
    components: { Bar },
    props: {
        chartId: {
            type: String,
            default: "bar-chart",
        },
        datasetIdKey: {
            type: String,
            default: "label",
        },
        width: {
            type: Number,
            default: 400,
        },
        height: {
            type: Number,
            default: 400,
        },
        cssClasses: {
            default: "",
            type: String,
        },
        styles: {
            type: Object,
            default: () => {},
        },
        plugins: {
            type: Array,
            default: () => [],
        },
    },
    data() {
        return {
            maxi_media_query: null,
            loading: false,
            loadingVote: false,
            user_id: null,

            // GRAPH
            chartData: {
                labels: [
                    "Gennaio",
                    "Febbraio",
                    "Marzo",
                    "Aprile",
                    "Maggio",
                    "Giugno",
                    "Luglio",
                    "Agosto",
                    "Settembre",
                    "Ottobre",
                    "Novembre",
                    "Dicembre",
                    "Totale",
                ],
                datasets: [
                    {
                        label: "Messaggi",
                        backgroundColor: "#4263d0",
                        data: [],
                    },
                    {
                        label: "Recensioni",
                        backgroundColor: "#294193",
                        data: [],
                    },
                ],
            },
            chartDataVote: {
                labels: [
                    "Gennaio",
                    "Febbraio",
                    "Marzo",
                    "Aprile",
                    "Maggio",
                    "Giugno",
                    "Luglio",
                    "Agosto",
                    "Settembre",
                    "Ottobre",
                    "Novembre",
                    "Dicembre",
                    "Totale",
                ],
                datasets: [
                    {
                        label: "1",
                        backgroundColor: "#4263D0",
                        data: [],
                    },
                    {
                        label: "2",
                        backgroundColor: "#7160C9",
                        data: [],
                    },
                    {
                        label: "3",
                        backgroundColor: "#8F5EBF",
                        data: [],
                    },
                    {
                        label: "4",
                        backgroundColor: "#A65DB5",
                        data: [],
                    },
                    {
                        label: "5",
                        backgroundColor: "#B75EAA",
                        data: [],
                    },
                ],
            },
            chartOptions: {
                responsive: true,
            },
        };
    },

    methods: {
        getMessagesMonthYear() {
            this.loading = false;
            axios
                .get(`/api/message/my?user_id=${this.user_id}`)
                .then((res) => {
                    this.chartData.datasets[0].data =
                        res.data.messageCountMonth;
                    this.chartData.datasets[0].data.push(res.data.count);
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    this.getReviewsMonthYear();
                });
        },
        getReviewsMonthYear() {
            axios
                .get(`/api/review/my?user_id=${this.user_id}`)
                .then((res) => {
                    this.chartData.datasets[1].data = res.data.reviewCountMonth;
                    this.chartData.datasets[1].data.push(res.data.count);
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    this.loading = true;
                    // this.div1 = document.getElementById("bar-chart-msg-rev");
                    // this.div2 = document.getElementById("bar-chart-msg-vote");
                    // console.log(this.div1, this.div2);
                });
        },
        getVoteMonthYear() {
            this.loadingVote = false;
            for (let vote = 1; vote <= 5; vote++) {
                axios
                    .get(
                        `/api/review/vote/my?user_id=${this.user_id}&vote=${vote}`
                    )
                    .then((res) => {
                        this.chartDataVote.datasets[vote - 1].data =
                            res.data.reviewCountMonth;
                        this.chartDataVote.datasets[vote - 1].data.push(
                            res.data.count
                        );
                    })
                    .catch((err) => {
                        console.error(err);
                    })
                    .then(() => {
                        this.loadingVote = true;
                        // this.div1 =
                        //     document.getElementById("bar-chart-msg-rev");
                        // this.div2 =
                        //     document.getElementById("bar-chart-msg-vote");
                        // console.log(this.div1, this.div2);
                    });
            }
        },

        mediaQueryCheck(scr) {
            // let div = document.getElementById("bar-chart-msg-rev");
            // console.log(div);
            if (scr.matches) {
                // If media query matches
                this.maxi_media_query = false;
                // console.log(this.div1, this.div2);
            } else {
                this.maxi_media_query = true;
                // console.log(this.div1, this.div2);
            }
        },
    },
    created() {
        let screen = window.matchMedia("(max-width: 1000px)");
        this.mediaQueryCheck(screen); // Call listener function at run time
        screen.addEventListener("change", () => {
            this.mediaQueryCheck(screen);
        });
    },
    mounted() {
        if (document.getElementById("fulvio")) {
            this.user_id = document.getElementById("fulvio").innerHTML;
            document.getElementById("fulvio").innerHTML = "";
        }
        this.getMessagesMonthYear();
        this.getVoteMonthYear();
    },
};
</script>

<style lang="scss" scoped>
#graph-stats {
    .bar-chart-vote,
    .bar-chart-rev-msg {
        min-height: 500px;
    }
    h2 {
        min-height: 5rem;
        @media screen and (max-width: 1000px) {
            min-height: 2.5rem;
        }
    }
    width: 100%;
    display: flex;
}
.velse {
    height: calc(100vh - 3rem);
}
</style>
