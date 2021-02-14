<template>
    <div class="card card-danger card-outline">
        <div class="card-body">
            <progress-bar :step="step" :width="width" />

            <step-1 v-show="isFirst()" />
            <step-2 v-show="isSecond()" />
            <step-3 v-show="isThird()" />
            <step-4 v-show="isFourth()" />
            <step-5 v-show="isFifth()" />
            <step-6 v-show="isSixth()" />

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
                    type="button"
                    class="btn btn-primary"
                    v-show="!isSixth()"
                    @click="next()"
                >
                    Next
                </button>
                <button
                    type="button"
                    class="btn btn-success"
                    v-show="isSixth()"
                >
                    Submit
                </button>
            </div>
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
            width: 18
        }
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
    }
}
</script>
