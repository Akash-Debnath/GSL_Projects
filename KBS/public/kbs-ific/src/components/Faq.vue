<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="text-center jumbotron bg-primary mt-5">
                    <h2 class="display-5 text-white">FAQ</h2>
                </div>
                <el-collapse v-model="activeName" accordion>
                    <el-collapse-item name="1">
                        <template #title>
                            Consistency
                        </template>
                        <div>
                            Consistent with real life: in line with the process and logic of real
                            life, and comply with languages and habits that the users are used to;
                        </div>
                        <div>
                            Consistent within interface: all elements should be consistent, such
                            as: design style, icons and texts, position of elements, etc.
                        </div>
                    </el-collapse-item>
                    <el-collapse-item name="2">
                        <template #title>
                            Consistency
                        </template>
                        <div>
                            Operation feedback: enable the users to clearly perceive their
                            operations by style updates and interactive effects;
                        </div>
                        <div>
                            Visual feedback: reflect current state by updating or rearranging
                            elements of the page.
                        </div>
                    </el-collapse-item>
                    <el-collapse-item  name="3">
                        <template #title>
                            Efficiency
                        </template>
                        <div>
                            Simplify the process: keep operating process simple and intuitive;
                        </div>
                        <div>
                            Definite and clear: enunciate your intentions clearly so that the
                            users can quickly understand and make decisions;
                        </div>
                        <div>
                            Easy to identify: the interface should be straightforward, which helps
                            the users to identify and frees them from memorizing and recalling.
                        </div>
                    </el-collapse-item>
                    <el-collapse-item name="4">
                        <template #title>
                            Hello
                        </template>
                        <div>
                            Decision making: giving advices about operations is acceptable, but do
                            not make decisions for the users;
                        </div>
                        <div>
                            Controlled consequences: users should be granted the freedom to
                            operate, including canceling, aborting or terminating current
                            operation.
                        </div>
                    </el-collapse-item>
                    <el-collapse-item name="5">
                        <template #title>
                            Hello
                        </template>
                        <div>
                            Decision making: giving advices about operations is acceptable, but do
                            not make decisions for the users;
                        </div>
                        <div>
                            Controlled consequences: users should be granted the freedom to
                            operate, including canceling, aborting or terminating current
                            operation.
                        </div>
                    </el-collapse-item>
                </el-collapse>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue';
const activeName = ref('1')

</script>

<style lang="scss">
.el-collapse {
    --el-collapse-border-color: var(--el-border-color-lighter);
    --el-collapse-header-height: 48px;
    --el-collapse-header-bg-color: transparent;
    --el-collapse-header-text-color: var(--el-text-color-primary);
    --el-collapse-header-font-size: 1.2rem;
    --el-collapse-content-bg-color: transparent;
    --el-collapse-content-font-size: 1rem;
    --el-collapse-content-text-color: var(--el-text-color-primary);
    border-top: 1px solid var(--el-collapse-border-color);
    border-bottom: 1px solid var(--el-collapse-border-color);
}

.el-collapse-item__arrow {
    color: #00793f;
}
</style>
