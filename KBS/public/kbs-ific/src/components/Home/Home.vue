<template>

    <!--**********************************
              Slider and Table Part
     ***********************************-->
    <div class="g-slider-table-area py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xl-2 order-1 order-md-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm g-exrate-table">
                            <thead class="bg-primary">
                            <tr align="center">
                                <th colspan="3">
                                    Exchange Rate
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td><small>Currency</small></td>
                                <td><small>Buying</small></td>
                                <td><small>Selling</small></td>
                            </tr>
                            <tr v-for="item in exchangeRateList" :key="item.id">
                                <td><small>{{ item.currency_code }}</small></td>
                                <td><small>{{ item.buying_rate }}</small></td>
                                <td><small>{{ item.selling_rate }}</small></td>
                            </tr>
                            </tbody>


                            <tfoot class="bg-primary">
                            <tr align="center">
                                <th colspan="3">
                                    <a href="">Click for Details</a>
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-8">
                    <MainSlider :banner-list="bannerList"/>
                </div>
                <div class="col-lg-3 col-xl-2">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm g-interest-table">
                            <thead class="bg-primary">
                            <tr align="center">
                                <th colspan="2">
                                    Interest Rate
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr v-for="item in interestRateList" :key="item.id">
                                <td><small>{{ item.title }}</small></td>
                                <td><small>{{ item.rate }}</small></td>
                            </tr>
                            </tbody>


                            <tfoot class="bg-primary">
                            <tr align="center">
                                <th colspan="3">
                                    <a href="">Click for Details</a>
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    End Slider and Table Part-->


    <!--**********************************
                 Services Thumbnail
     ***********************************-->

    <div class="g-services-thumbnail-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 mb-4" v-for="item in articleList" :key="item.id">
                    <div class="g-services-thumb-single">
                        <img v-if="item.media[0]" class="img-fluid" :src="item.media[0].url" alt="">
                        <img v-else class="img-fluid" src="" alt="">
                        <div class="g-services-thumb-meta">
                            <p>{{ item.en_title }}</p>
                            <!-- <a href="/deposits">Click For More</a> -->
                            <router-link :to="{ name: 'content', params: { slug: item.slug }}" class="nav-link">
                                <u>Click For More</u> 
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   End Services Thumbnail-->


    <!-- Modal -->
    <div class="modal fade" id="g-admin-login" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import MainSlider from "../MainSlider.vue";
import {ApiCallMaker} from "../../api/ApiCallMaker";
import {defineComponent} from "vue";
//import {ref, computed} from 'vue';
import {ref, computed, onBeforeUpdate, onMounted} from "vue";

export default defineComponent({
    name: "Home",
    components: {
        MainSlider
    },
    setup() {
        const bannerList = ref([]);
        const articleList = ref([]);
        const interestRateList = ref([]);
        const exchangeRateList = ref([]);

        onMounted(() => {
            getBannerList();
            getArticleList();
            getInterestRateList();
            getExchangeRateList();
        });

        async function getBannerList() {
            const response = await ApiCallMaker('GET', 'home-banners', '', '', '');
            //  console.log('response',response);
            if (response && response.data.status_code == 200) {
                bannerList.value = response.data.banner_list;
            }
        }

        async function getArticleList() {
            const response = await ApiCallMaker('GET', 'article-list', '', '', '');
            if (response && response.data.status_code == 200) {
                articleList.value = response.data.article_list;
            }
        }

        async function getInterestRateList() {
            const response = await ApiCallMaker('GET', 'all-interest-rate', '', '', '');
            if (response && response.data.status_code == 200) {
                interestRateList.value = response.data.interest_rate_list;
            }
        }

        async function getExchangeRateList() {
            const response = await ApiCallMaker('GET', 'exchange-rate-list', '', '', '');
            if (response && response.data.status_code == 200) {
                exchangeRateList.value = response.data.exchange_rate_list;
            }
        }

        return {bannerList, articleList, interestRateList, exchangeRateList}
    },


});

</script>

<style scoped lang="scss">
.g-slider-table-area {
    background-color: #ffffff;
}


.table-bordered.g-exrate-table {
    tr > th {
        color: #ffffff;
    }

    tbody > tr:first-child > td {
        small {
            font-size: 13px;
            font-weight: bold;
        }

    }

    tbody > tr > td:first-child {
        background-color: #EAFAF2;
    }

    tfoot > tr > th > a {
        color: #ffffff;
    }
}

.g-interest-table {
    tr > th {
        color: #ffffff;
    }

    tbody > tr > td:first-child {
        background-color: #EAFAF2;
    }

    tfoot > tr > th > a {
        color: #ffffff;
    }
}


/*===============================
       Services Thumbnail Area
  ===============================*/
.g-services-thumbnail-area {
    margin-top: 50px;
    background-color: #ffffff;
    padding: 40px 0;
}

.g-services-thumb-single {
    border-radius: 10px;
    border: 1px solid #00793F;
    position: relative;
    height: 278px;
    width: 100%;
    overflow: hidden;
    transition: all 0.4s ease-in-out;
    cursor: pointer;
    @media all and (max-width: 768px) {
        height: 220px;
    }

    img {
        object-fit: cover;
        height: 100%;
        width: auto;
        @media all and (max-width: 768px) {
            height: 100%;
            width: auto;
            object-fit: cover;
            -o-object-fit: cover;
        }
    }

    &:hover {
        > .g-services-thumb-meta {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(0, 121, 63, 0.95);
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 278px;
            margin-bottom: 0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            color: #ffffff;
            font-weight: 600;
            font-size: 1.1rem;
            @media all and (max-width: 768px) {
                height: 220px;
            }

            a {
                display: initial;
                visibility: visible;
                opacity: 1;
                color: #ffffff;
            }
        }

    }

    .g-services-thumb-meta {
        transition: all 0.3s linear;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        height: 60px;
        background-color: rgba(255, 255, 255, 0.99);
        text-align: center;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        margin-bottom: 0;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        color: #00793F;
        font-weight: 600;
        font-size: 1.1rem;

        p {
            font-weight: 600;
            margin-bottom: 0;
        }

        a {
            transition: 0.6s ease-in-out;
            display: none;
            visibility: hidden;
            opacity: 0;
            font-size: 0.9rem;
        }
    }

}


</style>
