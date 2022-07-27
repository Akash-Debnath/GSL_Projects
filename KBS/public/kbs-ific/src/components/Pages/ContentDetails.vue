<template>
    <div class="g-common-page-layouts">
        <div class="g-common-banner">
            <div class="container-fluid ">
                <div class="g-common-banner-area py-5">
                    <img class="img-fluid" v-if="contentData.media" :src="contentData.media[0].url" alt="">
                </div>
            </div>
        </div>


        <div class="container-fluid mt-5">
            <div class="g-blogs-area">
                <div class="g-blogs-main">
                    <h4>{{ contentData.en_title }}</h4>
                    <div v-for="content in contentData.contents" :key="content.id">
                        <div v-html="content.en_body"></div>
                    </div>
                </div>
            </div>

            <!-- <el-tabs v-model="activeName" :tab-position="tabPosition" class="demo-tabs" @tab-click="handleClick">
                <el-tab-pane label="Amar Account" name="user">
                    <div class="g-blogs-area">

                        <h4>IFIC Shohoj Account</h4>
                        <p>IFIC Shohoj is a new product designed for the unbanked population of Bangladesh, in order
                            to
                            boost financial inclusion in the country. A minimum required opening balance combined
                            with
                            no paperwork hassle free and also attractive interest rates makes it the perfect account
                            banking solution for the masses. IFIC Shohoj can also be used as a link account for IFIC
                            Aamar Bhobishawt
                        </p>

                        <div class="g-list-item-area">

                            <h4>Features</h4>
                            <ul class="g-list-item">
                                <li>Minimum account opening balance of 10tk.</li>
                                <li>Slab wise interest-bearing deposit account.</li>
                                <li>Attractive Interest rate.</li>
                                <li>Deposit interest will be calculated on daily balance and paid monthly.</li>
                                <li>Source of fund not mandatory.</li>
                                <li>Zero account maintenance fee.</li>
                                <li>SMS Alerts on transactions.</li>
                                <li>Minor can open “IFIC Shohoj Account”</li>
                                <li>Cash withdrawal from all Bank's ATM throughout the country is free of charge.
                                </li>
                                <li>No Cheque book will be provided, instead a Counter slip (Available at branches)
                                    will
                                    be
                                    used for withdrawal.
                                </li>
                                <li>IFIC Shohoj Rin facility for IFIC Shohoj account holders.</li>
                                <li>Free enrolment in digital banking.</li>
                            </ul>

                        </div>


                        <div class="g-list-item-area">
                            <h4>Mandatory Documents:</h4>
                            <ul class="g-list-item">
                                <li>Minimum account opening balance of 10tk.</li>
                                <li>Slab wise interest-bearing deposit account.</li>
                                <li>Attractive Interest rate.</li>
                                <li>Deposit interest will be calculated on daily balance and paid monthly.</li>
                            </ul>
                        </div>
                    </div>
                </el-tab-pane>

                <el-tab-pane label="Sohoj Account">
                    <h4>Dummy Contents</h4>
                </el-tab-pane>
                <el-tab-pane label="Amar Account">
                    <h4>Dummy Contents</h4>
                </el-tab-pane>
                <el-tab-pane label="Amar Bhabishwat">
                    <h4>Dummy Content</h4>
                </el-tab-pane>
                <el-tab-pane label="Amar Bari">
                    <h4>Dummy Content</h4>
                </el-tab-pane>
                <el-tab-pane label="Frequently Used Workcode">
                    <h4>Frequently Used Misys Equation</h4>
                </el-tab-pane>
                <el-tab-pane label="Frequently Used Workcode">
                    <h4>Frequently Card Decline Reasons</h4>
                </el-tab-pane>
                <el-tab-pane label="Frequently Used Workcode">
                    <h4>Frequently Digital Channel Issue</h4>
                </el-tab-pane>

            </el-tabs> -->


        </div>
    </div>

</template>

<script setup>
import {ref, computed, onBeforeUpdate, onMounted} from "vue";
import {useRoute} from 'vue-router'

import {ApiCallMaker} from "../../api/ApiCallMaker";

const activeName = ref('user');
const tabPosition = ref('left');
const contentData = ref({});


onMounted(() => {
    const route = useRoute();
    console.log(route.params.slug)
    getContentDetails(route.params.slug);
});

async function getContentDetails(slug) {
    const response = await ApiCallMaker('GET', 'article-details/' + slug, '', '', '');
    if (response && response.data.status_code == 200) {
        contentData.value = response.data.article_info;
        //  console.log('sfsdf',contentData.value);
    }
}


</script>

<style scoped lang="scss">
.g-common-page-layouts {
    background-color: #ffffff;
    overflow: hidden;
}

.g-left-sidebar {
    background-color: #E9F2EE;
    padding: 1.5rem;

    h5 {
        color: rgba(0, 0, 0, 0.6);
        font-weight: 600;
    }

    ul {
        margin: 0;
        display: block;

        li {
            font-size: 1rem;
            line-height: 2em;
            display: list-item;
            margin: 1rem 0;
        }
    }
}

.g-blogs-area {
    padding: 3rem;
    background-color: #f4f4f4;
    border-radius: 0.5rem;
    margin-bottom: 2rem;
    overflow: hidden;
    @media (max-width: 768px) {
        padding: 1rem;
    }
}

.g-blogs-main {
    background-color: #ffffff;
    padding: 2rem;
    border-radius: 0.5rem;
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
    overflow: hidden;

    h1, h2, h3, h4, h5, h6 {
        color: #00783f;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        padding: 1rem;
    }
}

.g-list-item-area {
    margin: 2rem auto;

    ul.g-list-item {
        margin: 0;
        display: block;

        li {
            font-size: 1rem;
            line-height: 1.8em;
            display: list-item;
        }
    }
}

</style>

























