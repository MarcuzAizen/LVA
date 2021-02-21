<template>
    <div class="card card-danger card-outline">
        <div class="card-body">
            <progress-bar :step="step" :width="width" />

            <ValidationObserver v-slot="{ handleSubmit }">
                <form @submit.prevent="handleSubmit(submit)">
                    <step-1 v-if="isFirst()" />
                    <step-2 v-if="isSecond()" />
                    <step-3 v-if="isThird()" />
                    <step-4 v-if="isFourth()" />
                    <step-5 v-if="isFifth()" />
                    <step-6 v-if="isSixth()" />

                    <div class="float-right">
                        <button
                            type="button" 
                            class="btn btn-primary"
                            v-show="!isFirst()"
                            @click="previous()"
                        >
                            Previous
                        </button>
                        <button
                            type="submit"
                            class="btn btn-primary"
                            v-show="!isSixth()"
                            :disabled="lrnExists && isFirst()"
                        >
                            Next
                        </button>
                        <button
                            type="submit"
                            class="btn btn-success"
                            v-show="isSixth()"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>
import ProgressBar from './../progressBar.vue';
import Step1 from './step1.vue';
import Step2 from './step2.vue';
import Step3 from './step3.vue';
import Step4 from './step4.vue';
import Step5 from './step5.vue';
import Step6 from './step6.vue';

export default {
    name: 'EnrollNewStudent',

    components: {
        ProgressBar,
        Step1,
        Step2,
        Step3,
        Step4,
        Step5,
        Step6
    },

    data() {
        return {
            step: 1,
            width: 18,          
        }
    },

    computed: {
        lrnExists: {
            get() {
                return this.$store.state.student.lrnExists;
            },

            set(value) {
                this.$store.commit('student/setLrnExists', value)
            }
        },
    },

    methods: {
        next() {
            this.step++;
            this.width += 18;
        },
        
        previous() {
            this.step--;
            this.width -= 18;
        },

        isFirst() {
            return this.step === 1;
        },

        isSecond() {
            return this.step === 2;
        },

        isThird() {
            return this.step === 3;
        },

        isFourth() {
            return this.step === 4;
        },

        isFifth() {
            return this.step === 5;
        },

        isSixth() {
            return this.step === 6;
        },

        submit() {
            if (!this.isSixth()) {
                this.next();
            }
        }
    }
}
</script>
