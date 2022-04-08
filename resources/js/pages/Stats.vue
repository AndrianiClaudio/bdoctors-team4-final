<template>
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
import { param } from "jquery";

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
            user_id: null,
            messageCountMonthYear: null,
            messageCountMonth: [],
            // reviewCountMonth: [],
            // voteCountMonth: [],
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
                ],
                datasets: [{ data: [1, 1, 1, 12, 0, 0, 0, 0, 0, 0, 0, 0] }],
            },
            chartOptions: {
                responsive: true,
            },
        };
    },

    methods: {
        getMessagesMonthYear() {
            axios
                .get(`/api/message/my?user_id=${this.user_id}`)
                .then((res) => {
                    // console.log(res.data.messageCountMonth);
                    this.messageCountMonthYear = res.data.messageCountMonth;
                    // this.subscriptions = res.data.results.subscriptions;
                    //console.log(this.subscriptions);
                    // console.log(this.messageCountMonthYear);
                    // this.txt;
                    for (const key in this.messageCountMonthYear) {
                        if (
                            Object.hasOwnProperty.call(
                                this.messageCountMonthYear,
                                key
                            )
                        ) {
                            this.messageCountMonth.push(
                                this.messageCountMonthYear[key]
                            );
                        }
                    }
                    console.log(this.messageCountMonth);
                })
                .catch((err) => {
                    console.error(err);
                });
            // axios
            //     .get(`/api/message/my?user_id=${this.user_id}`)
            //     .then((res) => {
            //         console.log(res.data);
            //         this.messageCountMonth = res.data.messageCountMonth;
            //     })
            //     .catch((err) => {
            //         console.error(err);
            //     });
        },
        // getReviewsMonthYear(){

        // },
        // getVoteMonthYear() {

        // }
    },
    created() {
        if (document.getElementById("fulvio")) {
            this.user_id = document.getElementById("fulvio").innerHTML;
            document.getElementById("fulvio").innerHTML = "";
        }
        console.log(this.user_id);
        // numero di messaggi e recensioni ricevute per mese/anno
        this.getMessagesMonthYear();
        // this.getReviewsMonthYear();

        // grafico a barre fasce di voto ricevuti per mese/anno
        // this.getVoteMonthYear();
    },
};
</script>
